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
            'email' => 'required|email|unique:students',
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

        if ($newStudent) {
            return redirect()->route('student.index');
        } else {
            return back()->with('error', 'Registration failed');
        }

    }

    public function login(Request $request){
        $data = $request->validate([
            'email'=> 'required',
            'password'=> 'required'
            ]);

        $student = Student::where('email','=', $data['email'])->first();
        if ($student) {
            //dd($student);
            if ($data['password'] == $student->password) {
                $request->session()->put('email', $student->email);
                return redirect('/student_dashboard');
            } else {
                return back()->with('error', 'Password mismatch');
            }
        } else {
            return back()->with('error', 'This email is not registered');
        }
    }

    public function dashboard(Request $request)
    {
        return view('students.student_dashboard');
    }
}
