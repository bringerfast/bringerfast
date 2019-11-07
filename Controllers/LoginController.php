<?php



namespace Controllers;


use Models\Role;
use Models\User;
use Request\Request;

class LoginController
{
    /**
     * @param Request $request
     */
    public function adminLoginForm(Request $request){
        if ($request->getSession('SuperAdmin')!=false || $request->getSession('Admin')!=false){
            redirect('/dashboard');
        } else {
            export('backend/authentication/adminLogin','');
        }
    }

    public function adminRegisterForm(Request $request){
        export('backend/authentication/adminRegister','');
    }

    public function adminRegister(Request $request){
        $formData = $request->getBody();
        # validations
        $ExistUser = User::multSelect(['mobile'],['mobile'=>$formData['mobile']]);
        if (count($ExistUser)){
            return 'Sorry Given mobile number Already Exist';
        }
        $ExistUser = User::multSelect(['email'],['email'=>$formData['email']]);
        if (count($ExistUser)){
            return 'Sorry Given Email Already Exist';
        }
        # validation end
        $role = Role::multSelect(['role_id','role_name'],['role_name'=>'customer']);
        $formData['r_role_id'] = $role[0]['role_id'];
        $formData['status'] = 1;
        $formData['email_verified_at'] = NULL;
        User::insert($formData);
        return 'User Registered Successfully';
    }

    /**
     * @param Request $request
     */
    public function adminLogin(Request $request)
    {
        $formData = $request->getBody();
        $user = User::adminAuth($formData['userName'], $formData['userPassword']);
        if ($user!=""){
            $request->setSession("CurrentUserData",$user) ;
            if($user['role_name']=="SuperAdmin"){
                $request->setSession("SuperAdmin",$user) ;
                redirect('/dashboard');
            }elseif ($user['role_name']=="Admin"){
                $request->setSession("Admin",$user) ;
                redirect('/dashboard');
            } else {
                export('backend/authentication/adminLogin',['message'=>'Authentication Error!']);
            }
        } else {
            export('backend/authentication/adminLogin',['message'=>'Authentication Error!']);
        }
    }

    /**
     * @param Request $request
     */
    public function logout(Request $request){
        if ($request->getSession('SuperAdmin')!=false || $request->getSession('Admin')!=false) {
            $url = '/admin';
        } else {
            $url = '/';
        }
        $request->sessionTruncate();
        redirect($url);
    }

    /**
     * @param Request $request
     */
    public function sendResetEmail(Request $request)
    {
        $formData = $request->getBody();
        $to = $formData['userEmail'];
        $from = 'bringerfast@gmail.com';
        $fromName = 'BringerFast';

        $subject = "Send Test Email in PHP by BringerFast";

        $htmlContent = '<h1>Test Html Content</h1>';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n";
        $headers .= 'Cc: welcome@example.com' . "\r\n";
        $headers .= 'Bcc: welcome2@example.com' . "\r\n";

        if(mail($to, $subject, $htmlContent, $headers)){
            echo 'Email has sent successfully.';
        }else{
            echo 'Email sending failed.';
        }
    }
}