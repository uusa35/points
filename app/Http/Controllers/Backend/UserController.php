<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Models\User;
use App\Services\Traits\ImageHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use ImageHelpers;

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = User::whereId($id)->with('role')->first();
        return view('backend.modules.user.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = User::whereId($id)->first();
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
        $updated = $element->update($request->except(['logo', 'gallery', 'governate_id', 'area_id', 'user_id']));
        if ($updated) {
            if ($request->hasFile('logo')) {
                $this->saveMimes($element, $request, ['logo'], ['250', '250'], false);
            }
            if ($request->hasFile('bg')) {
                $this->saveMimes($element, $request, ['bg'], ['750', '1334'], false);
            }
            return redirect()->route('backend.user.show',$element->id)->with('success', 'saved success');
        }
        return redirect()->back()->with('error', 'failure');
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
            return redirect()->route('backend.user.show', $user->id)->with('success', 'password changed');
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
            return redirect()->back()-withErrors($validator)->withInputs();
        }
        $this->notify(request('title'),request('message'),request('ids'));
    }
}
