<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 10/11/19
 * Time: 4:41 PM
 */

namespace Controllers;


use Models\MovieCategory;
use Request\Request;

class FrontController
{
    public function home(Request $request) {
        $movieCategories=MovieCategory::all();
        export('frontend/home',[$movieCategories->objects]);
    }

    public function details(Request $request) {
        export('frontend/details','');
    }
}