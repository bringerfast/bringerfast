<?php
/**
 * Created by PhpStorm.
 * Screen: banu
 * Date: 31/10/19
 * Time: 3:54 PM
 */

namespace Controllers;

use Models\ClassType;
use Models\Screen;
use Models\Theatre;
use Request\Request;
use Throwable;
class ScreenController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function screenIndex(){
        try {
            $screens = Screen::all();
            export('backend/screens/view_all',$screens);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenForm(){
        try {
            $theatres = Theatre::all();
            $classTypes = ClassType::all();
            export('backend/screens/create_form',[$theatres,$classTypes]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenStore(Request $request){
        try {
            $formData = $request->getBody();
            Screen::insert($formData);
            redirect('/screenIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenShow(Request $request){
        try {
            $formData = $request->getBody();
            $screen = Screen::select($formData['screen_id']);
            export('backend/screens/show',$screen);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $screen = Screen::select($formData['screen_id']);
            $theatres = Theatre::all();
            $classTypes = ClassType::all();
            export('backend/screens/edit_form',[$screen,$theatres,$classTypes]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenUpdate(Request $request){
        try {
            $formData = $request->getBody();
            Screen::update($formData);
            redirect('/screenIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenDelete(Request $request){
        try {
            $formData = $request->getBody();
            Screen::delete($formData['screen_id']);
            redirect('/screenIndex');
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}