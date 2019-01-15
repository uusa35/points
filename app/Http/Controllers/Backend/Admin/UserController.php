<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\UserStore;
use App\Http\Requests\Backend\UserUpdate;
use App\Models\User;
use App\Services\Traits\ImageHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use ImageHelpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('user.view', auth()->user());
        if (request()->has('role_id')) {
            $elements = User::where('role_id', request('role_id'))->with('role', 'balance')->paginate(self::PAGINATE);
        } else {
            $elements = User::with('role', 'balance')->paginate(self::PAGINATE);
        }

        return view('backend.modules.user.index', compact('elements'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        $element = User::create($request->except('password_confirmation'));

        if ($request->hasFile('logo')) {
            $this->saveMimes($element, $request, ['logo'], ['250', '250'], false);
        }

        if ($element) {
            return redirect()->route('backend.admin.user.index', ['role_id' => $request->role_id])->with('success', 'user saved');
        }
        return redirect()->route('backend.admin.user.index', ['role_id' => $request->role_id])->with('error', 'error failure');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = User::active()->whereId($id)->with('role', 'projects')->first();
        $this->authorize('user.view', $element);
        return response()->json($element, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = User::whereId($id)->with('balance')->first();
        $this->authorize('user.view', $element);
        return view('backend.modules.user.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $element = User::whereId($id)->first();
        $updated = $element->update($request->except(['logo', 'bg', 'balance','user_id']));
        if ($updated) {
            $element->balance()->update(['points' => $request->balance]);
            if ($request->hasFile('logo')) {
                $this->saveMimes($element, $request, ['logo'], ['250', '250'], false);
            }
            if ($request->hasFile('bg')) {
                $this->saveMimes($element, $request, ['bg'], ['750', '1334'], false);
            }
            auth()->user()->isSuper ? $element->update(['balance' => request('balance')]) : null;
            return redirect()->route('backend.admin.user.index', ['role_id' => $element->role_id])->with('success', 'saved success');
        }
        return redirect()->back()->with('error', 'failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = User::whereId($id)->with('projects')->first();
        $roleId = $element->role_id;
        if (!$element->projects->isEmpoty()) {
            $element->softDelete();
            return route('backend.admin.user.index', ['role_id' => $roleId]);
        }
        return redirect()->back()->with('error', trans('message.user_is_not_deleted'));
    }

    public function getResetPassword(Request $request)
    {
        $validator = validator(request()->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $email = $request->email;
        return view('auth.passwords.reset', compact('email'));

    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postResetPassword(Request $request)
    {
        $validator = validator(request()->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInputs()->withErrors($validator);;
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = bcrypt(request()->password);
            $user->save();
            return redirect()->route('backend.admin.user.index', ['role_id' => $user->role_id])->with('success', 'password changed');
        }
        return redirect()->back()->with('error', 'error occurred')->withInputs();
    }

    public function sendNotification(Request $request)
    {
        $validator = validator(request()->all(), [
            'title' => 'required',
            'message' => 'required',
            'include_player_ids' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back() - withErrors($validator)->withInputs();
        }
        $this->notify(request('title'), request('message'), request('ids'));
    }
}
