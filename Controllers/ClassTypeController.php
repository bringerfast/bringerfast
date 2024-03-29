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
    /**
     * ClassTypeController constructor.
     */
    public function __construct()
    {
        auth(['SuperAdmin']);
    }

    public function classTypeIndex(){
        try {
            $classTypes = ClassType::all();
            export('backend/class_types/view_all',$classTypes->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    /**
     *
     */
    public function classTypeForm(){
        try {
            export('backend/class_types/create_form','');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    /**
     * @param Request $request
     */
    public function classTypeStore(Request $request){
        try {
            $formData = $request->getBody();
            ClassType::insert($formData);
            redirect('/classTypeIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    /**
     * @param Request $request
     */
    public function classTypeShow(Request $request){
        try {
            $formData = $request->getBody();
            $classType = ClassType::find($formData['class_type_id']);
            export('backend/class_types/show',$classType);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    /**
     * @param Request $request
     */
    public function classTypeEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $classType = ClassType::find($formData['class_type_id']);
            export('backend/class_types/edit_form',$classType);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    /**
     * @param Request $request
     */
    public function classTypeUpdate(Request $request){
        try {
            $formData = $request->getBody();
            ClassType::update($formData);
            redirect('/classTypeIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    /**
     * @param Request $request
     */
    public function classTypeDelete(Request $request){
        try {
            $formData = $request->getBody();
            ClassType::findDelete($formData['class_type_id']);
            redirect('/classTypeIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}