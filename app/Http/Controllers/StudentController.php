<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        return view('students.index');
    }

    public function register(){
        return view('students.register');
    }

    public function write(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password'=> 'required',
            'name'=> 'required',
            'nric'=> 'required',
            'studentID'=> 'required',
            'program' => 'required',
            'batch' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required'
        ]);

        $newStudent = Student::create($data);

        return redirect()->route('student.index');
    }
}
