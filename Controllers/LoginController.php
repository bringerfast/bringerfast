<?php


namespace Controllers;


use Models\User;
use Request\Request;

class LoginController
{

    public function superAdminLoginForm(Request $request){
        if ($request->getSession('SuperAdmin')!=false){
            redirect('/dashboard');
        } else {
            export('backend/authentication/superAdminLogin','');
        }
    }

    public function superAdminLogin(Request $request)
    {
        $formData = $request->getBody();
        $user = User::adminAuth($formData['userName'], $formData['userPassword']);
        if ($user!=""){
            if($user['role_name']=="SuperAdmin"){
                $request->setSession("SuperAdmin",$user) ;
                $request->setSession("CurrentUserData",$user) ;
                redirect('/dashboard');
            } else {
                export('backend/authentication/superAdminLogin',['message'=>'Authentication Error!']);
            }
        } else {
            export('backend/authentication/superAdminLogin',['message'=>'Authentication Error!']);
        }
    }

    public function adminLoginForm(Request $request){
        if ($request->getSession('Admin')!=false){
            redirect('/dashboard');
        } else {
            export('backend/authentication/adminLogin','');
        }
    }

    public function adminLogin(Request $request)
    {
        $formData = $request->getBody();
        $user = User::adminAuth($formData['userName'], $formData['userPassword']);
        if ($user!=""){
            if($user['role_name']=="Admin"){
                $request->setSession("Admin",$user) ;
                $request->setSession("CurrentUserData",$user) ;
                redirect('/dashboard');
            } else {
                export('backend/authentication/adminLogin',['message'=>'Authentication Error!']);
            }
        } else {
            export('backend/authentication/adminLogin',['message'=>'Authentication Error!']);
        }
    }

    public function logout(Request $request){
        if ($request->getSession('SuperAdmin')!=false) {
            $url = '/superAdmin';
        } elseif ($request->getSession('Admin')!=false) {
            $url = '/admin';
        } else {
            $url = '/';
        }
        $request->sessionTruncate();
        redirect($url);
    }

    public function sendResetEmail(Request $request)
    {
        $formData = $request->getBody();
        $to = $formData['userEmail'];
        $from = 'bringerfast@gmail.com';
        $fromName = 'BringerFast';

        $subject = "Send Test Email in PHP by BringerFast";

        $htmlContent = '<h1>Test Html Content</h1>';

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