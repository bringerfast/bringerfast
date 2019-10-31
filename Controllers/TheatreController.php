<?php
/**
 * Created by PhpStorm.
 * Theatre: raja
 * Date: 31/10/19
 * Time: 3:38 AM
 */

namespace Controllers;

use Models\Theatre;
use Models\User;
use Request\Request;
use Throwable;

class TheatreController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function theatreIndex(){
        try {
            $theatres = Theatre::all();
            export('backend/theatres/view_all',$theatres);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreForm(){
        try {
            $users = User::all();
            export('backend/theatres/create_form',$users);
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
            $theatre = Theatre::select($formData['theatre_id']);
            export('backend/theatres/show',$theatre);
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function theatreEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $theatre = Theatre::select($formData['theatre_id']);
            $users = User::all();
            export('backend/theatres/edit_form',[$theatre,$users]);
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
            Theatre::delete($formData['theatre_id']);
            redirect('/theatreIndex');
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}