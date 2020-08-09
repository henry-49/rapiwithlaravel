<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //read data from db
        // Using Eloquent model classe
        $section = Section::all();
        return response()->json($section);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //instering data into database
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',

        ]);

        // Using Eloquent model class
        $section = Section::create($request->all());
        return response('Section Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Using Eloquent model class to fine One record
        $section = Section::findorfail($id);
        return response()->json($section);
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
        //Using Eloquent model class to update record 
        $section = Section::findorfail($id);
        $section->update($request->all());


        return response('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Using Eloquent model class for delete record 
        Section::where('id', $id)->delete();
        return response('Section Deleted');
    }
}
