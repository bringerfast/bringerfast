<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 25/10/19
 * Time: 2:27 AM
 */

namespace Controllers;


use Models\MovieCategory;
use Request\Request;
use Throwable;

class MovieCategoryController
{
    public function __construct()
    {
        auth(['SuperAdmin']);
    }

    public function movieCategoryIndex(){
        try {
            $movieCategories = MovieCategory::all();
            export('backend/movie_categories/view_all',$movieCategories->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieCategoryForm(){
        try {
            export('backend/movie_categories/create_form','');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieCategoryStore(Request $request){
       try {
           $formData = $request->getBody();
           MovieCategory::insert($formData);
           redirect('/movieCategoryIndex');
       } catch (Throwable $e) {
           throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
       }
    }

    public function movieCategoryShow(Request $request){
        try {
            $formData = $request->getBody();
            $movieCategory = MovieCategory::find($formData['movie_category_id']);
            export('backend/movie_categories/show',$movieCategory);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieCategoryEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $movieCategory = MovieCategory::find($formData['movie_category_id']);
            export('backend/movie_categories/edit_form',$movieCategory);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieCategoryUpdate(Request $request){
        try {
            $formData = $request->getBody();
            $moveCategory = MovieCategory::find($formData['movie_category_id']);
            $moveCategory->movie_category_name = $formData['movie_category_name'];
            $moveCategory->save();
            redirect('/movieCategoryIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieCategoryDelete(Request $request){
        try {
            $formData = $request->getBody();
            MovieCategory::delete($formData['movie_category_id']);
            redirect('/movieCategoryIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}