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

class MovieCategoryController
{
    public function __construct()
    {
        auth('SuperAdminData');
    }

    public function movieCategoryIndex(){
        $movieCategories = MovieCategory::all();
        export('backend/movie_categories/view_all',$movieCategories);
    }

    public function movieCategoryForm(){
        export('backend/movie_categories/create_form','');
    }

    public function movieCategoryStore(Request $request){
        $formData = $request->getBody();
        MovieCategory::insert($formData);
        redirect('/movieCategoryIndex');
    }

    public function movieCategoryShow(Request $request){
        $formData = $request->getBody();
        $movieCategory = MovieCategory::select($formData['movie_category_id']);
        export('backend/movie_categories/show',$movieCategory);
    }

    public function movieCategoryEditForm(Request $request){
        $formData = $request->getBody();
        $movieCategory = MovieCategory::select($formData['movie_category_id']);
        export('backend/movie_categories/edit_form',$movieCategory);
    }

    public function movieCategoryUpdate(Request $request){
        $formData = $request->getBody();
        MovieCategory::update($formData);
        redirect('/movieCategoryIndex');
    }

    public function movieCategoryDelete(Request $request){
        $formData = $request->getBody();
        MovieCategory::delete($formData['movie_category_id']);
        redirect('/movieCategoryIndex');
    }
}