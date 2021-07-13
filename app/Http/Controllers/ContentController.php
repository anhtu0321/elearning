<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_url='';
        if($request->file != ""){
            $uploadPath = public_path('images/');
            $fileName = $request->file->getClientOriginalName();
            $newFileName = time().$fileName.'.'.$request->file->getClientOriginalExtension();
            $file_url = $newFileName;
            $request->file->move($uploadPath,$newFileName);
        }
        $content = new Content();
        $content->category_id = $request->category_id;
        $content->subCategory_id = $request->subCategory_id;
        $content->title = $request->title;
        $content->description = $request->description;
        $content->video_url = $request->video_url;
        $content->file = $file_url;
        $content->save();
        return ['status'=>'success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
