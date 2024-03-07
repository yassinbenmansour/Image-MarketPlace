<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $photos = Photo::latest()->get();
        return view('home',[
            "photos" => $photos
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.user.upload');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        if($request->validated()){
            $data = $request->all(); // recuperation data
            $image = $request->file('image'); //recuperation image
            $image_name = time().'_'.$image->getClientOriginalName(); // recuperation name image
            $image->storeAs('images',$image_name,'public'); // stock to storage
            $data['url']='/storage/images/'.$image_name;
            $data['user_id']=auth()->user()->id;  // user connected
            Photo::create($data);
            return redirect('/')->with(
                ["success"=>"Photo Upload Successfully"]
            );

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
