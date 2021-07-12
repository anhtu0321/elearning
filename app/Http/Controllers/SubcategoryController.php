<?php

namespace App\Http\Controllers;

use App\subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return subcategory::with('categories')->get();
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
        $this->formValidation($request);
        $subcategory = new subcategory;
        $subcategory->sub_cate_name = $request->sub_cate_name;
        $subcategory->cate_id = $request->cate_id;
        $subcategory->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(subcategory $subcategory, $id)
    {
        return subcategory::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subcategory $subcategory, $id)
    {
        $sub_cate = subcategory::find($id);
        $sub_cate->sub_cate_name = $request->sub_cate_name;
        $sub_cate->cate_id = $request->cate_id;
        $sub_cate->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(subcategory $subcategory, $id)
    {
        subcategory::destroy($id);        
    }
    public function formValidation($request){
        $this->validate($request, [
            'cate_id' =>'required',
            'sub_cate_name' =>'required',
        ]);
    }
}
