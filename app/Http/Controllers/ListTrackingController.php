<?php

namespace App\Http\Controllers;

use App\Models\Tracking;

class ListTrackingController extends Controller
{

    public function __invoke()
    {

        return Tracking::all();

    }

}
