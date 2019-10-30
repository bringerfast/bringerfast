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
        auth('SuperAdminData');
    }

    public function movieIndex(){
        try {
            $movies = Movie::all();
            export('backend/movies/view_all',$movies);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieForm() {
        try{
            $movieCategories = MovieCategory::all();
            export('backend/movies/create_form',$movieCategories);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieStore(Request $request){
        try {
            $formData = $request->getBody();
            $formData['movieBannerImage'] = imageUpload($request->FILES['movieBannerImage']);
            $formData['movieListImage'] = imageUpload($request->FILES['movieListImage']);
            Movie::insert($formData);
            redirect('/movieIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieShow(Request $request){
        try {
            $formData = $request->getBody();
            $movie = Movie::select($formData['movie_id']);
            export('backend/movies/show',$movie);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieEditForm(Request $request){
        try {
            $formData = $request->getBody();
            $movie = Movie::select($formData['movie_id']);
            $movieCategories = MovieCategory::all();
            export('backend/movies/edit_form',[$movie,$movieCategories]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieUpdate(Request $request){
        try {
            $formData = $request->getBody();
            $movie = Movie::select($formData['movieId']);
            if ($request->FILES['movieBannerImage']['name']=="" && $request->FILES['movieListImage']['name']!=""){
                $formData['movieBannerImage'] = $movie['banner_image'];
                $formData['movieListImage'] = imageUpload($request->FILES['movieListImage']);
            } else if ($request->FILES['movieBannerImage']['name']!="" && $request->FILES['movieListImage']['name']==""){
                $formData['movieBannerImage'] = imageUpload($request->FILES['movieBannerImage']);
                $formData['movieListImage'] = $movie['list_image'];
            } else if ($request->FILES['movieBannerImage']['name']!="" && $request->FILES['movieListImage']['name']!="") {
                $formData['movieBannerImage'] = imageUpload($request->FILES['movieBannerImage']);
                $formData['movieListImage'] = imageUpload($request->FILES['movieListImage']);
            } else {
                $formData['movieBannerImage'] = $movie['banner_image'];
                $formData['movieListImage'] = $movie['list_image'];
            }
            Movie::update($formData);
            redirect('/movieIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function movieDelete(Request $request){
        try {
            $formData = $request->getBody();
            Movie::delete($formData['movie_id']);
            redirect('/movieIndex');
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}