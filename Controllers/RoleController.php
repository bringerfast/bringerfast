<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 24/10/19
 * Time: 1:03 AM
 */

namespace Controllers;


use Models\Role;
use Request\Request;

class RoleController
{
    public function roleIndex(){
        $roles = Role::all();
        export('backend/roles/view_all',$roles);
    }

    public function roleForm(){
        export('backend/roles/create_form','');
    }

    public function roleStore(Request $request){
        $formData = $request->getBody();
        Role::insert($formData);
        redirect('/roleIndex');
    }

    public function roleShow(Request $request){
        $formData = $request->getBody();
        $role = Role::select($formData['role_id']);
        export('backend/roles/show',$role);
    }

    public function roleEditForm(Request $request){
        $formData = $request->getBody();
        $role = Role::select($formData['role_id']);
        export('backend/roles/edit_form',$role);
    }

    public function roleUpdate(Request $request){
       $formData = $request->getBody();
       Role::update($formData);
       redirect('/roleIndex');
    }

    public function roleDelete(Request $request){
        $formData = $request->getBody();
        Role::delete($formData['role_id']);
        redirect('/roleIndex');
    }
}