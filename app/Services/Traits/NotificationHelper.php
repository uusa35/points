<?php

namespace App\Services\Traits;
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 9/27/18
 * Time: 1:18 PM
 */
trait NotificationHelper
{
    function notify($message, $ids, $data = [])
    {
        $ids = [$ids];
        $content = array(
            "en" => $message,
            'ar' => $message
        );
        $fields = array(
            'app_id' => env('ONE_SIGNAL_APP_ID'),
            'include_player_ids' => $ids,
            'data' => $data,
            'contents' => $content,
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
//        $return["allresponses"] = $response;z
//        $return = json_encode($return);

        /*   'include_player_ids' =>
       [
           '4bf50ee0-ebfe-44d1-905f-d405a5a0cef1',
           '8da3a34c-0b8e-4a47-a842-d733a2cbb9f5', // mine
           'aa9daa1e-6975-468c-87de-3d8cda34e111',
           '217ef814-7f73-4b64-aa0f-60d16bd55074',
       ],
        */
    }
}