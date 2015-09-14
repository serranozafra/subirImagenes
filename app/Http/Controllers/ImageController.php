<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $imagenes = Image::paginate(15);

        //
       return view('imagenes',['imagenes'=>$imagenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $imagen = null;

        return view('editar',['imagen' => $imagen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'path' => 'required',

        ];
        $this->validate($request, $rules);

        //if($id != null)
          //  $image = Image::findOrFail($id);
        //else
        $image = new Image;
        $image->name = $request->input('name');
        $image->save();

        $path = 'imgs/'.$image->id.'.'.$request->file('path')->getClientOriginalExtension();
        $image->path = $path;
        $image->save();

        Storage::disk('public')->put(
            $path,
            file_get_contents($request->file('path')->getRealPath())
        );

        return view('imagenes');

        //Storage::put('file.jpg',$request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
