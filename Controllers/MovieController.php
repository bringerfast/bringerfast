<?php
/**
 * Created by PhpStorm.
 * Movie: Banu
 * Date: 25/10/19
 * Time: 2:30 AM
 */

namespace Controllers;

use Models\Movie;
use Models\MovieCategory;
use Request\Request;
use Throwable;

class MovieController
{
    public function __construct()
    {
        auth(['SuperAdmin','Admin']);
    }

    public function movieIndex(){
        try {
            $movies = Movie::all();
            export('backend/movies/view_all',$movies->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieForm() {
        try{
            $movieCategories = MovieCategory::all();
            export('backend/movies/create_form',$movieCategories->objects);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieStore(Request $request){
        try {
            $formData = $request->getBody();
            $formData['banner_image'] = imageUpload($request->FILES['banner_image']);
            $formData['list_image'] = imageUpload($request->FILES['list_image']);
            Movie::insert($formData);
            redirect('/movieIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieShow(Request $request){
        try {
            $formData = $request->getBody();
            $movie = Movie::find($formData['movie_id']);
            export('backend/movies/show',$movie);
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $movie = Movie::find($formData['movie_id']);
            $movieCategories = MovieCategory::all();
            export('backend/movies/edit_form',[$movie,$movieCategories->objects]);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieUpdate(Request $request){
        try {
            $formData = $request->getBody();
            $movie = Movie::find($formData['movie_id']);
            if ($request->FILES['banner_image']['name']=="" && $request->FILES['list_image']['name']!=""){
                $formData['banner_image'] = $movie->banner_image;
                $formData['list_image'] = imageUpload($request->FILES['list_image']);
            } else if ($request->FILES['banner_image']['name']!="" && $request->FILES['list_image']['name']==""){
                $formData['banner_image'] = imageUpload($request->FILES['banner_image']);
                $formData['list_image'] = $movie->list_image;
            } else if ($request->FILES['banner_image']['name']!="" && $request->FILES['list_image']['name']!="") {
                $formData['banner_image'] = imageUpload($request->FILES['banner_image']);
                $formData['list_image'] = imageUpload($request->FILES['list_image']);
            } else {
                $formData['banner_image'] = $movie->banner_image;
                $formData['list_image'] = $movie->list_image;
            }
            Movie::update($formData);
            redirect('/movieIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieDelete(Request $request){
        try {
            $formData = $request->getBody();
            Movie::findDelete($formData['movie_id']);
            redirect('/movieIndex');
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}
