<?php

namespace Usama\Tap;

use App\Http\Controllers\Controller;
use App\Mail\OrderComplete;
use App\Mail\TransactionComplete;
use App\Models\Ad;
use App\Models\Setting;
use App\Models\Deal;
use App\Models\Order;
use App\Models\OrderAttribute;
use App\Models\Plan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Mail;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 6:04 PM
 */
class TapPaymentController extends Controller
{
    public function getGateWay()
    {
        return ["Name" => config('tap.gatewayDefault')];
    }

    public function getMerchant($totalPrice)
    {
        return [
            "AutoReturn" => config('tap.autoReturn'),
            "ErrorURL" => config('tap.errorUrl'),
            "HashString" => $this->getHashString($totalPrice),
            "LangCode" => config('tap.langCode'),
            "MerchantID" => config('tap.merchantId'),
            "Password" => config('tap.password'),
            "PostURL" => config('tap.postUrl'),
            "ReferenceID" => '',
            "ReturnURL" => config('tap.returnUrl'),
            "UserName" => config('tap.userName')
        ];
    }

    public function setHashString($totalPrice)
    {
        return $toBeHashedString = 'X_MerchantID' . config('tap.merchantId') .
            'X_UserName' . config('tap.userName') .
            'X_ReferenceID' . '45870225000' .
            'X_Mobile' . '1234567' .
            'X_CurrencyCode' . config('tap.currencyCode') .
            'X_Total' . $totalPrice;
    }

    public function getHashString($totalPrice)
    {
        return hash_hmac('sha256', $this->setHashString($totalPrice), config('tap.apiKey'));
    }

    public function makePayment(Request $request)
    {
        $className = config('tap.order');
        $class = new $className();
        $element = $class->whereId($request->id)->first();
        $user = auth()->user();
        $finalArray = [
            'CustomerDC' => [
                "Email" => $user->email,
                "Floor" => $element->floor ? $element->floor : "0",
                "Gender" => $element->gender ? $element->gender : "0",
                "ID" => $user ? $user->id : "0",
                "Mobile" => $element->mobile,
                "Name" => $user->name,
                "Nationality" => "KWT",
                "Street" => $user->address,
                "Area" => $user->address,
                "CivilID" => $user->mobile,
                "Building" => $user->address_ar,
                "Apartment" => $user->address_en,
                "DOB" => $user->created_at
            ],
            'lstProductDC' => $this->getProducts($element),
            'lstGateWayDC' => [$this->getGateWay()],
            'MerMastDC' => $this->getMerchant($element->price),
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('tap.paymentUrl'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($finalArray, JSON_UNESCAPED_SLASHES),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = (\GuzzleHttp\json_decode($response));
            if (!$response->ResponseCode) {
                /* response how it looks
                * {#966 ▼
                    +"PaymentURL": "http://live.gotapnow.com/webpay.aspx?ref=210092017100407130&sess=kEh3R7REOFWP0b3BFM6Kkm2O7AQck8Jg"
                    +"ReferenceID": "210092017100407130"
                    +"ResponseCode": "0"
                    +"ResponseMessage": "Success"
                    +"TapPayURL": "http://live.gotapnow.com/webpay.aspx"
                }
             * store the payment and update it with the refrence
                * */
                // create the order here
                $user->transactions()->create(
                    [
                        'payment_plan_id' => $element->id,
                        'reference_id' => $response->ReferenceID,
                        'actual_amount' => $element->price
                    ]
                );
//                $order->update(['reference_id' => $response->ReferenceID]);
                return redirect()->to($response->PaymentURL);
            }

            return redirect()->back()->with('error', trans('message.payment_url_error'));
//            return response()->json($response->ResponseMessage);
        }
    }

    public function result(Request $request)
    {
        // once the result is success .. get the deal from refrence then delete all other free deals related to such ad.
        $transaction = Transaction::where(['reference_id' => $request->ref])->with('user','payment_plan')->first();
        $transaction->update(['is_complete' => true]);
        $contactus = Setting::first();
        Mail::to($transaction->user->email)->cc($contactus->info_email)->cc($contactus->sales_email)->send(new TransactionComplete($transaction, $transaction->user));
        $this->clearCart();
        $markdown = new Markdown(view(), config('mail.markdown'));
        return $markdown->render('emails.transaction-complete', ['element' => $transaction, 'user' => $transaction->user]);
    }

    public function error(Request $request)
    {
        $transaction = Transaction::where(['reference_id' => $request->ref])->first();
        $transaction->update(['is_complete' => false]);
        return abort('404', 'Your payment process is unsuccessful .. your deal is not created please try again or contact us.');
    }

    public function getProducts($element)
    {
        $productsList = [];
        array_push($productsList, [
            'CurrencyCode' => env('TAP_CURRENCY_CODE'),
            'ImgUrl' => asset(env('LARGE')) . $element->image,
            'Quantity' => 1,
            'TotalPrice' => $element->price,
            'UnitID' => $element->id,
            'UnitName' => $element->name .'-'. $element->slug,
            'UnitPrice' => $element->price,
            'UnitDesc' => $element->description,
            'VndID' => '',
        ]);
        return $productsList;
    }

    public function clearCart()
    {
        session()->forget('cart');
    }
}

