<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 31/10/19
 * Time: 3:05 AM
 */

namespace Controllers;


use Models\Show;
use Request\Request;
use Throwable;

class ShowController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function showIndex(){
        try {
            $shows = Show::all();
            export('backend/shows/view_all',$shows);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function showForm(){
        try {
            export('backend/shows/create_form','');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function showStore(Request $request){
        try {
            $formData = $request->getBody();
            Show::insert($formData);
            redirect('/showIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function showShow(Request $request){
        try {
            $formData = $request->getBody();
            $show = Show::select($formData['show_id']);
            export('backend/shows/show',$show);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function showEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $show = Show::select($formData['show_id']);
            export('backend/shows/edit_form',$show);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function showUpdate(Request $request){
        try {
            $formData = $request->getBody();
            Show::update($formData);
            redirect('/showIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function showDelete(Request $request){
        try {
            $formData = $request->getBody();
            Show::delete($formData['show_id']);
            redirect('/showIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}