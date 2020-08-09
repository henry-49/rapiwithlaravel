<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //read data from db
        // using query builder
        $sclass = DB::table('sclasses')->get();
        return response()->json($sclass);
        
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
            'class_name' => 'required|unique:sclasses|max:25'
        ]);


        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('sclasses')->insert($data);

        return response('Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show one record
        $show =  DB::table('sclasses')->where('id', $id)->first();

        return response()->json($show);
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
        //Using query builder for update record
        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('sclasses')->where('id', $id)->update($data);

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
       //Using Query builder for delete record 
        DB::table('sclasses')->where('id', $id)->delete();

        return response('Deleted');
    }
}
