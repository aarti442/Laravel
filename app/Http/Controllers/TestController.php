<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
class TestController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
