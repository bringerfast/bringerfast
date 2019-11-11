<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 10/11/19
 * Time: 4:41 PM
 */

namespace Controllers;


use Models\MovieCategory;
use Models\MovieOfScreen;
use Request\Request;

class FrontController
{
    public function home(Request $request) {
        $movieCategories=MovieCategory::all();
        $movieOfScreens = MovieOfScreen::allWithRelation();
        export('frontend/home',[$movieCategories->objects,$movieOfScreens->objects]);
    }

    public function details(Request $request) {
        $formData = $request->getBody();
        $movieOfScreen = MovieOfScreen::selectWithRelation($formData['movie_of_screen_id']);
        export('frontend/details',$movieOfScreen);
    }

    public function booking(Request $request) {
        export('frontend/booking','');
    }
}