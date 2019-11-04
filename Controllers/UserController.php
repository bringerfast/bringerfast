<?php
namespace Controllers;

use Models\Role;
use Models\User;
use Request\Request;
use Throwable;

class UserController
{
    public function __construct() {
        auth('SuperAdmin');
    }

    public function userIndex(){
        try {
            $users = User::all()->toArray();
            export('backend/users/view_all',$users);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userForm(){
        try {
            $roles = Role::all();
            export('backend/users/create_form',$roles);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userStore(Request $request){
        try {
            $formData = $request->getBody();
            $user = new User();
            $user->r_role_id = $formData['userRole'];
            $user->name = $formData['userName'];
            $user->email = $formData['userEmail'];
            $user->password = base64_encode($formData['userPassword']);
            $user->mobile = $formData['userMobile'];
            $user->status = $formData['userStatus'];
            $user->save();
            redirect('/userIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userShow(Request $request){
        try {
            $formData = $request->getBody();
            $user = User::find($formData['user_id'])->toArray();
            export('backend/users/show',$user);
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $user = User::find($formData['user_id'])->toArray();
            $roles = Role::all();
            export('backend/users/edit_form',[$user,$roles]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userUpdate(Request $request){
        try {
            $formData = $request->getBody();
            $user = User::find($formData['userId']);
            $user->r_role_id = $formData['userRole'];
            $user->name = $formData['userName'];
            $user->email = $formData['userEmail'];
            $user->password = base64_encode($formData['userPassword']);
            $user->mobile = $formData['userMobile'];
            $user->status = $formData['userStatus'];
            $user->save();
            redirect('/userIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userDelete(Request $request){
        try {
            $formData = $request->getBody();
            User::findDelete($formData['user_id']);
            redirect('/userIndex');
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}