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
        auth(['SuperAdmin','Admin']);
    }

    public function screenIndex(){
        try {
            $screens = Screen::allWithRelation();
            export('backend/screens/view_all',$screens->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenForm(){
        try {
            $theatres = Theatre::all();
            $classTypes = ClassType::all();
            export('backend/screens/create_form',[$theatres->objects,$classTypes->objects]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenStore(Request $request){
        try {
            $formData = $request->getBody();
            $classTypes = ClassType::all();
            $allClasses = $classTypes->objects;
            $Array = [];
            foreach ($allClasses as $allClass){
                array_push($Array, [str_replace(' ','_',$allClass->class_type_name)=>$formData[str_replace(' ','_',$allClass->class_type_name)]]);
                unset($formData[str_replace(' ','_',$allClass->class_type_name)]);
            }
            $formData['classes_seats'] = json_encode($Array);
            Screen::insert($formData);
            redirect('/screenIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenShow(Request $request){
        try {
            $formData = $request->getBody();
            $screen = Screen::selectWithRelation($formData['screen_id']);
            export('backend/screens/show',$screen);
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $screen = Screen::selectWithRelation($formData['screen_id']);
            $theatres = Theatre::all();
            $classTypes = ClassType::all();
            export('backend/screens/edit_form',[$screen,$theatres->objects,$classTypes->objects]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenUpdate(Request $request){
        try {
            $formData = $request->getBody();
            $classTypes = ClassType::all();
            $allClasses = $classTypes->objects;
            $Array = [];
            foreach ($allClasses as $allClass){
                array_push($Array, [str_replace(' ','_',$allClass->class_type_name)=>$formData[str_replace(' ','_',$allClass->class_type_name)]]);
                unset($formData[str_replace(' ','_',$allClass->class_type_name)]);
            }
            $formData['classes_seats'] = json_encode($Array);
            Screen::update($formData);
            redirect('/screenIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function screenDelete(Request $request){
        try {
            $formData = $request->getBody();
            Screen::findDelete($formData['screen_id']);
            redirect('/screenIndex');
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function getScreenOfTheatre(Request $request){
        $formData = $request->getBody();
        $screens = Screen::multSelect(['screen_id','screen_name'],['r_theatre_id'=>$formData['r_theatre_id']]);
        return json_encode($screens);
    }
}