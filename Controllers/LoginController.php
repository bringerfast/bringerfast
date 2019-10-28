<?php


namespace Controllers;


use Models\User;
use Request\Request;

class LoginController
{

    public function index(Request $request){
        if ($request->getSession('SuperAdminData')!=false){
            export('backend/dashboard/dashboard',$request->getSession('SuperAdminData'));
        } else {
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
        $to = $formData['userEmail'];
        $from = 'bringerfast@gmail.com';
        $fromName = 'BringerFast';

        $subject = "Send Test Email in PHP by BringerFast";

        $htmlContent = 'Test Html Content';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n";
//        $headers .= 'Cc: welcome@example.com' . "\r\n";
//        $headers .= 'Bcc: welcome2@example.com' . "\r\n";
        echo $htmlContent;
        // Send email
        if(mail($to, $subject, $htmlContent, $headers)){
            echo 'Email has sent successfully.';
        }else{
            echo 'Email sending failed.';
        }
    }
}