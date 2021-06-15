<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Student;
use App\Contact;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function store(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'email' =>  'required',
            'image' =>  'required',
            'phone1' => 'required|regex:/(01)[1356789][0-9]{8}/',
            'phone2' => 'required|regex:/(01)[1356789][0-9]{8}/'

        ]);
        $image = $data->file('image')->store('public');
        Student::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $image

        ]);
        $student = Student::all();
        $id = $student->last()->id;

        Contact::create([
            'student_id' => $id,
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2']



        ]);

        return redirect('/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Contact::with('student')->get();

        return view('show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $img = Student::where('id', $id)->first();
        $img_path = $img->image;
        unlink($img_path);//delete photo from project folder
        Student::where('id', $id)->delete();
        Contact::where('student_id', $id)->delete();

    }
}
