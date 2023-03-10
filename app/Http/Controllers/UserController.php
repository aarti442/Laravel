<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\User;
class UserController extends Controller{

    public function showuser(){
        return view("userlist");
    }

    public function index()
    {
        $users = DB::select('select * from users where active = ?', [1]);
 
        return view('user.index', ['users' => $users]);
    }

    public function updateuser(Request $request, $id)
    {
        //print_r($request);
        $uri = $request->path();
        print_r($id);
        print_r($uri);
        if ($request->is('admin/*')) {
            echo 'true';
        }
    }
}
?>