<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Student;
use DB;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Room;

class AdminController extends Controller
{
    function index(Request $request){
        return view('admins.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', '=', $data['email'])->first();

        if ($admin) {
            if ($data['password'] == $admin->password) {
                $request->session()->put('email', $admin->email);
                return redirect('/admin/admin_dashboard');
            } else {
                return back()->with('error', 'Password mismatch');
            }
        } else {
            return back()->with('error', 'This email is not registered');
        }
    }

    public function dashboard(Request $request)
    {
        $applications = Application::all();
        return view('admins.admin_dashboard', ['applications' => $applications]);
    }

    public function viewRooms(){
        $rooms = Room::all();
        return view('admins.manage_rooms', ['rooms' => $rooms]);

    }

    public function createRoom(){
        return view('admins.create_room');
    }

    public function write(Request $request)
    {
        $data = $request->validate([
            'roomNumber' => 'required',
            'capacity' => 'required',
            'level' => 'required'
        ]);

        $room = Room::create($data);
        if ($room) {
            return redirect('/admin/manage_rooms');
        }
        else{
            dd($room);
        }

    }

    public function editRoom(Room $room){

        //dd($room);
        return view('admins.edit_room', ['room' => $room]);
    }

    public function updateRoom(Room $room,Request $request){
        $data = $request->validate([
            'roomNumber' => 'required',
            'capacity' => 'required',
            'level' => 'required'
        ]);

        $room->update($data);
        //dd($room->roomNumber);
        return redirect('/admin/manage_rooms');
    }

    public function deleteRoom(Room $room)
    {
        $room->delete();
        //dd($room->roomNumber);
        return redirect('/admin/manage_rooms');
    }

    public function getApplications(){
        $applications = Application::all()->sortByDesc('created_at');
        return view('admins.manage_applications', ['applications' => $applications]);
    }

    public function viewApplication(Application $application){

        $rooms = Room::all();
        $student = Student::find($application->student_id);
        //dd($student);
        return view('admins.view_application', compact('application', 'rooms', 'student'));

    }

    public function updateApplication(Request $request, Application $application){
        //dd($application);
        if(isset($request->approve)){
            $application->update(['roomNumber' => $request->roomNumber, 'status' => 'APPROVED']);

            return redirect('/admin/manage_applications');
        }
        else if(isset($request->reject)){
            $application->update(['status' => 'REJECTED']);
            return redirect('/admin/manage_applications');
        }


    }

    public function checkoutStudent(Application $application)
    {
        //dd($application);
        $application->update(['status' => 'CHECKED OUT']);

        return redirect('/admin/manage_applications');
    }



}
