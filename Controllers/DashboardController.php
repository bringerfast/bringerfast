<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 1/11/19
 * Time: 12:47 AM
 */

namespace Controllers;


use Request\Request;

class DashboardController
{
    public function __construct()
    {
        auth(['SuperAdmin','Admin']);
    }

    public function dashboard(Request $request){
        export('backend/dashboard/dashboard',$request->getSession('CurrentUserData'));
    }
}