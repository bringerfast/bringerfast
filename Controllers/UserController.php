<?php
namespace Controllers;

use Models\Role;
use Models\User;
use Request\Request;
class UserController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function userIndex(){
        $users = User::all();
        export('backend/users/view_all',$users);
    }

    public function userForm(){
        $roles = Role::all();
        export('backend/users/create_form',$roles);
    }

    public function userStore(Request $request){
        $formData = $request->getBody();
        User::insert($formData);
        redirect('/userIndex');
    }

    public function userShow(Request $request){
        $formData = $request->getBody();
        $user = User::select($formData['user_id']);
        export('backend/users/show',$user);
    }

    public function userEditForm(Request $request){
        $formData = $request->getBody();
        $user = User::select($formData['user_id']);
        export('backend/users/edit_form',$user);
    }

    public function userUpdate(Request $request){
        $formData = $request->getBody();
        User::update($formData);
        redirect('/userIndex');
    }

    public function userDelete(Request $request){
        $formData = $request->getBody();
        User::delete($formData['user_id']);
        redirect('/userIndex');
    }
}