<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Application;
use Session;

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
                $request->session()->put('student_id', $student->id);
                $request->session()->put('email', $student->email);
                return redirect('/student_dashboard');
            } else {
                return back()->with('error', 'Password mismatch');
            }
        } else {
            return back()->with('error', 'This email is not registered');
        }
    }

    public function dashboard(Request $request){
        $applications = Application::where('student_id','=', Session::get('student_id'))->get();
        $numberOfApprovedOrPendingRequest = 0;
        foreach ($applications as $application) {
            if((in_array("APPROVED", $application->toArray()) || in_array("PENDING", $application->toArray()))){
                $numberOfApprovedOrPendingRequest++;
            }
        }
        //dd($applications);
        return view('students.student_dashboard',compact('applications', 'numberOfApprovedOrPendingRequest'));
    }

    public function logout(){
        if(Session::has('email')){
            Session::pull('email');
            return redirect()->route('student.index');
        }

    }

    public function hostelForm(){
        return view('students.application_form');
    }

    public function apply(Request $request){
        $data = $request->validate([
            'checkin_date' => 'required',
            'intake' => 'required',
            'student_id' => 'required']
            );
        $application = Application::create($data);
        if ($application) {
            return redirect()->route('student.dashboard');
        } else {
            return back()->with('error', 'Application failed');
        }
    }


}
