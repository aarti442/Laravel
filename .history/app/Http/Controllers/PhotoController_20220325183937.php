<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input; 

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$photos = photos::all();
        $photos = array(["id"=>1,"backend"=>"Laravel","frontend"=>"VueJs"],["id"=>2,"backend"=>"PHP","frontend"=>"Javscript"]);
        // load the view and pass the sharks
        return View::make('photos.index', ['photos'=>$photos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // get the shark
          //$shark = shark::find($id);
        $photos = array(["id"=>1,"backend"=>"Laravel","frontend"=>"VueJs"],["id"=>2,"backend"=>"PHP","frontend"=>"Javscript"]);
        foreach($photos as $k => $v){
            if($v['id'] == $id){
                $photosdata = $v;
            }
        }
          // show the view and pass the shark to it
        return View::make('photos.show', ['photos'=>$photosdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photos = array(["id"=>1,"backend"=>"Laravel","frontend"=>"VueJs"],["id"=>2,"backend"=>"PHP","frontend"=>"Javscript"]);
        foreach($photos as $k => $v){
            if($v['id'] == $id){
                $photosdata = $v;
            }
        }
          // show the view and pass the shark to it
        return View::make('photos.show', ['photos'=>$photosdata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
