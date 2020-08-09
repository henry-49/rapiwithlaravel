<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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
        $student = Student::all();
        return response()->json($student);
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
        // $validateData = $request->validate([
        //     'class_id'       => 'required|unique:students|max:25',
        //     'section_id'     => 'required|unique:students|max:25',
        //     'name'           => 'required|unique:students|max:25',
        //     'phone'          => 'required|unique:students|max:25',
        //     'email'          => 'required|unique:students|max:25',
        //     'password'       => 'required|unique:students|max:25',
        //     'photo'          => 'required|unique:students|max:25',
        //     'address'        => 'required|unique:students|max:25',
        //     'gender'         => 'required|unique:students|max:25',

        // ]);

        $data = array();
        $data['class_id']   = $request->class_id;
        $data['section_id']  = $request->section_id;
        $data['name']       = $request->name;
        $data['phone']      = $request->phone;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['photo']      = $request->photo;
        $data['address']    = $request->address;
        $data['gender']     = $request->gender;

        // Using query Builder for insert record
        $insert = DB::table('students')->insert($data);

        // Using Eloquent model class
        // $student = Student::create($request->all());

        return response('Student Inserted');
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
        $student= Student::findorfail($id);
        // $student = DB::table('students')->where('id', $id)->first();
        return response()->json($student);
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
        $data = array();
        $data['class_id']   = $request->class_id;
        $data['section_id']  = $request->section_id;
        $data['name']       = $request->name;
        $data['phone']      = $request->phone;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['photo']      = $request->photo;
        $data['address']    = $request->address;
        $data['gender']     = $request->gender;

        // Using query Builder for Update Student record
        DB::table('students')->where('id', $id)->update($data);


        //Using Eloquent model class to update record 
        // $student = Student::findorfail($id);
        // $student->update($request->all());
        
        return response('Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Using query Builder for Update Student record
      $img =  DB::table('students')->where('id', $id)->first(); // get the first data
      $image_path = $img->photo;  // get only image data 
     
      unlink($image_path);      // delete the image from folder
      DB::table('students')->where('id', $id)->delete();

        return response('Student Deleted');
    }
}
