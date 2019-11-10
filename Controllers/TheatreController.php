<?php
/**
 * Created by PhpStorm.
 * Theatre: banu
 * Date: 31/10/19
 * Time: 3:38 AM
 */

namespace Controllers;

use Models\Role;
use Models\Theatre;
use Models\User;
use Request\Request;
use Throwable;

class TheatreController
{
    public function __construct()
    {
        auth(['SuperAdmin','Admin']);
    }

    public function theatreIndex(){
        try {
            $theatres = Theatre::all();
            export('backend/theatres/view_all',$theatres->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreForm(Request $request){
        try {
            $user = User::find($request->getSession('CurrentUserData')['user_id']);
            $role = Role::multSelect(['*'],['role_name'=>'Admin']);
            $users = User::multSelect(['*'],['r_role_id' => $role[0]['role_id']]);
            export('backend/theatres/create_form',[$user,$users]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreStore(Request $request){
        try {
            $formData = $request->getBody();
            Theatre::insert($formData);
            redirect('/theatreIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreShow(Request $request){
        try {
            $formData = $request->getBody();
            $theatre = Theatre::find($formData['theatre_id']);
            export('backend/theatres/show',$theatre);
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $theatre = Theatre::find($formData['theatre_id']);
            $user = User::find($request->getSession('CurrentUserData')['user_id']);
            $role = Role::multSelect(['*'],['role_name'=>'Admin']);
            $users = User::multSelect(['*'],['r_role_id' => $role[0]['role_id']]);
            export('backend/theatres/edit_form',[$theatre,$user,$users]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreUpdate(Request $request){
        try {
            $formData = $request->getBody();
            Theatre::update($formData);
            redirect('/theatreIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreDelete(Request $request){
        try {
            $formData = $request->getBody();
            Theatre::findDelete($formData['theatre_id']);
            redirect('/theatreIndex');
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}