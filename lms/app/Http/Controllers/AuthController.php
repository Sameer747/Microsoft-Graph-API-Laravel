<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class AuthController extends Controller
{
    
    //signin function
    public function signin(){
        //get access and redirect to login
        $access = Socialite::driver('azure')
        ->scopes(["openid profile offline_access user.read mailboxsettings.read calendars.readwrite"])
        ->redirect();

        //=>return to the login
        return $access;
    }
    
    //callback function
    public function callback(Request $request){
        //=>get user details via socialite
        $user = Socialite::driver('azure')->user();
 
        //=>new graph client
        $graph = new Graph();
        
        //=>set access token
        $graph->setAccessToken($user->token);
        
        //=>get all user details via graph request
        $userDetails = $graph->createRequest('GET', '/me?$select=displayName,mail,mailboxSettings,userPrincipalName')
          ->setReturnType(Model\User::class)
          ->execute();
        
        //=>put user to session.
        $putSession = $request->session()->put('microsoftUser',$userDetails);
        
        //=>return the view and place the userdetails
        return view('welcome',compact('userDetails'));
    }

    //signout
    public function signout(Request $request)
    {
    //get user session.
    $getSession = $request->session()->get('microsoftUser');
    // dd($getSession);

    // Clear the user session
    $request->session()->forget('microsoftUser');

    // Redirect to the sign-in page or any other appropriate page
    return view('welcome'); 
    }

}

