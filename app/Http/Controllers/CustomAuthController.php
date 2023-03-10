<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('customauth.login');
    }  

    public function customLogin (Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //return redirect()->intended('products')->withSuccess('Signed in');
            
            if (auth()->user()->type == 1) {
                
                return redirect()->route('admin.home')->withSuccess('Signed in');;
            }else if (auth()->user()->type == 2) {
                return redirect()->route('manager.home')->withSuccess('Signed in');;
            }else{
                return redirect()->route('home')->withSuccess('Signed in');;
            }
        }
        return redirect("customlogin")->withError('Login details are not valid');
    }

    public function customregistration (){
        return view('customauth.register');
    }

    public function customRegistrationFun(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("products")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }  

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('customlogin');
    }
}
