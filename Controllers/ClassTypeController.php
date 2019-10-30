<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 31/10/19
 * Time: 2:07 AM
 */

namespace Controllers;

use Models\ClassType;
use Request\Request;
use Throwable;
class ClassTypeController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function classTypeIndex(){
        try {
            $classTypes = ClassType::all();
            export('backend/class_types/view_all',$classTypes);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function classTypeForm(){
        try {
            export('backend/class_types/create_form','');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function classTypeStore(Request $request){
        try {
            $formData = $request->getBody();
            ClassType::insert($formData);
            redirect('/classTypeIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function classTypeShow(Request $request){
        try {
            $formData = $request->getBody();
            $classType = ClassType::select($formData['class_type_id']);
            export('backend/class_types/show',$classType);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function classTypeEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $classType = ClassType::select($formData['class_type_id']);
            export('backend/class_types/edit_form',$classType);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function classTypeUpdate(Request $request){
        try {
            $formData = $request->getBody();
            ClassType::update($formData);
            redirect('/classTypeIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function classTypeDelete(Request $request){
        try {
            $formData = $request->getBody();
            ClassType::delete($formData['class_type_id']);
            redirect('/classTypeIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}