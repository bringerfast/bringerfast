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
            } else {
                throwError('Role SuperAdmin Not found in your t_roles table of your database<br>
                                     Please add Role SuperAdmin manualy in t_role table of your database');
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
        $otp = rand(111111,999999);
        $content = "Your One Time Password is:$otp";
        exec('echo -e "Subject: Froget Password\r\n\r\n'.$content.'" |msmtp --debug --from=default -t '.$formData['userEmail']);
    }
}