<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 13/11/19
 * Time: 6:46 AM
 */

namespace Controllers;


use Models\User;
use Request\Request;

class ResetController
{
    public function sendOTP(Request $request){
        $formData = $request->getBody();
        if (!count(User::multSelect(['user_id'],['email'=>$formData['email']]))){
            export('backend/authentication/adminLogin',['message'=>'Given Email is not Exist!']);
            exit;
        }
        $request->setSession('resetableEmail',$formData['email']);
        $request->setSession('resetableOTP','123456');
        export('/backend/authentication/resetPassword','');
    }

    public function resetAdmin(Request $request){
        $formData = $request->getBody();
        if ($formData['password']!=$formData['cpassword']){
            export('/backend/authentication/resetPassword',['message'=>'passowrd and confirm password not matched']);
            exit;
        }

        if ($formData['otp']!=$request->getSession('resetableOTP')){
            export('/backend/authentication/resetPassword',['message'=>'otp not matched']);
            exit;
        }
        $user = User::multSelect(['user_id'],['email'=>$request->getSession('resetableEmail')]);
        $userID = $user[0]['user_id'];
        $user = User::find($userID);
        $user->password = $formData['password'];
        $user->save();
        export('backend/authentication/adminLogin',['message'=>'<span style="color: green">password reseted successfully</span>']);

    }
}