<?php


namespace Controllers;


use Models\User;
use Request\Request;

class LoginController
{
    public function index(Request $request){
        if ($request->getSession('SuperAdminData')!=false){
            export('backend/dashboard/dashboard',$request->getSession('SuperAdminData'));
        } else{
            export('backend/authentication/login','');
        }
    }

    public function adminLogin(Request $request)
    {
        $formData = $request->getBody();
        $user = User::adminAuth($formData['userName'], $formData['userPassword']);
        if ($user!=""){
            if($user['role_name']=="SuperAdmin"){
                $request->setSession("SuperAdminData",$user) ;
                export('backend/dashboard/dashboard',$user);
            }
        } else {
            export('backend/authentication/login',['message'=>'Authentication Error!']);
        }
    }

    public function adminLogout(Request $request){
        $request->sessionTruncate();
        redirect('/admin');
    }

    public function sendResetEmail(Request $request)
    {
        $formData = $request->getBody();
        exec('echo -e "Subject: Test Mail\r\n\r\nThis is my first test email." |msmtp --debug --from=default -t '.$formData['userEmail']);
    }
}