<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class LoginController extends Controller {
	
	public function login(Request $request)
	{
		$view = '/login';
		$model = array();
	
        return view( $view, $model );
	}


    public function logout()
    {
        Auth::logout();
        return Redirect::to( '/' )->with('message', '您已登出');
    }

    public function toLogin( Request $request )
    {
        $email = $request->input( 'email' );
        $password =  $request->input( 'password' );
        
        $parameters = request()->only('email', 'password');
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Please Enter E-mail',
            'password.required' => 'Please Enter Password',
        ]; 
        
        $result = Validator::make($parameters, $rules, $messages);
 
        if ($result->fails()) {
            return Redirect::back()->withErrors( $result );
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 已登入成功！！！
           

            // 取得之前紀錄的網址，登入成功後，導頁到該網址
            $prev_url = '/';
            if( Session::get( 'redirect' ) !== null ){
                $prev_url = Session::get( 'redirect' );
                Session::forget('redirect');
            }
           
            return redirect()->intended( $prev_url )->with('message', '您已登入');
        }

        return Redirect::to( '/' )->with('message', '登入失敗，請確定帳密是否正確');
    } 	
}
