<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 7/11/19
 * Time: 4:54 PM
 */

namespace Controllers;


use Models\Movie;
use Models\MovieOfScreen;
use Models\Screen;
use Models\Show;
use Models\Theatre;
use Request\Request;
use Throwable;

class MovieOfScreenController
{
    public function __construct()
    {
        auth(['SuperAdmin','Admin']);
    }

    public function index()
    {
        $movieOfScreens = MovieOfScreen::allWithRelation();
        export('backend/movie_of_screen/view_all',$movieOfScreens->objects);
    }

    public function create(Request $request)
    {
        $theatres = Theatre::all();
        $screens = Screen::all();
        $shows = Show::all();
        $movies = Movie::all();
        export('backend/movie_of_screen/create_form',[$theatres->objects,$screens->objects,$shows->objects,$movies->objects]);
    }

    public function store(Request $request){
        $formData = $request->getBody();
        MovieOfScreen::insert($formData);
        redirect('/movieOfScreenIndex');
    }

    public function show(Request $request){
        try {
            $formData = $request->getBody();
            $movieOfScreen = MovieOfScreen::selectWithRelation($formData['movie_of_screen_id']);
            export('backend/movie_of_screen/show',$movieOfScreen);
        } catch (Throwable $e) {
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function edit(Request $request){
        $formData = $request->getBody();
        $theatres = Theatre::all();
        $shows = Show::all();
        $movies = Movie::all();
        $movieOfScreen = MovieOfScreen::selectWithRelation($formData['movie_of_screen_id']);
        $screens = Screen::multSelect([' * '],['r_theatre_id'=>$movieOfScreen->r_theatre_id]);
        export('backend/movie_of_screen/edit_form',[$theatres->objects,$screens,$shows->objects,$movies->objects,$movieOfScreen]);
    }

    public function update(Request $request){
        $formData = $request->getBody();
        MovieOfScreen::update($formData);
        redirect('/movieOfScreenIndex');
    }

    public function delete(Request $request){
        $formData = $request->getBody();
        MovieOfScreen::findDelete($formData['movie_of_screen_id']);
        redirect('/movieOfScreenIndex');
    }

}