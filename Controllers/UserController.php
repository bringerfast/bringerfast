<?php
namespace Controllers;

use Models\Role;
use Models\User;
use Request\Request;
use Throwable;

class UserController
{
    public function __construct() {
        auth(['SuperAdmin','Admin']);
    }

    public function userIndex(){
        try {
            $users = User::all();
            export('backend/users/view_all',$users->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userForm(){
        try {
            $roles = Role::all();
            export('backend/users/create_form',$roles->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userStore(Request $request){
        try {
            $formData = $request->getBody();
            $formData['email_verified_at'] = NULL;
            User::insert($formData);
            redirect('/userIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userShow(Request $request){
        try {
            $formData = $request->getBody();
            $user = User::find($formData['user_id']);
            export('backend/users/show',$user);
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $user = User::find($formData['user_id']);
            $roles = Role::all();
            export('backend/users/edit_form',[$user,$roles->objects]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function userUpdate(Request $request){
        try {
            $formData = $request->getBody();
            User::update($formData);
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