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
use Throwable;

class RoleController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function roleIndex(){
        try {
            $roles = Role::all();
            export('backend/roles/view_all',$roles);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function roleForm(){
        try {
            export('backend/roles/create_form','');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function roleStore(Request $request){
       try {
           $formData = $request->getBody();
           Role::insert($formData);
           redirect('/roleIndex');
       } catch (Throwable $e) {
           dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
       }
    }

    public function roleShow(Request $request){
        try {
            $formData = $request->getBody();
            $role = Role::select($formData['role_id']);
            export('backend/roles/show',$role);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function roleEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $role = Role::select($formData['role_id']);
            export('backend/roles/edit_form',$role);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function roleUpdate(Request $request){
       try {
           $formData = $request->getBody();
           Role::update($formData);
           redirect('/roleIndex');
       } catch (Throwable $e) {
           dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
       }
    }

    public function roleDelete(Request $request){
        try {
            $formData = $request->getBody();
            Role::delete($formData['role_id']);
            redirect('/roleIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}