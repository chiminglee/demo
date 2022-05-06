<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view = 'user.create';

        return View($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $name = $request->input('name');

        $user = new User();

        $user->email = $email;
        $user->password = $password;
        $user->name = $name;

        $user->save();

        $message = '註冊成功!';
        return Redirect::to('/')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $view = 'user.edit';
        $user = User::find($id);

        $model["user"] = $user;

        return View($view, $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $email = $request->input('email');
        $password = ($request->input('password') != '') ? Hash::make($request->input('password')) : null;
        $name = $request->input('name');

        $user = User::find($id);

        $user->email = $email;
        if( $password != null) {
            $user->password = $password;
        }
        
        $user->name = $name;

        $user->save();

        $message = '修改成功!';
        return Redirect::to('/')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
