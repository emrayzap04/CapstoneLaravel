<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\User;

use App\Models\Appointment;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
  
    public function addview()
    {
       
       return view('admin.add_doctor');

    }

    public function upload(Request $request)
    {
      $doctor = new doctor;
      $image=$request->file;

      $imagename=time().'.'.$image->getClientoriginalExtension();

      $request->file->move('doctorimage',$imagename);

      $doctor->image=$imagename;

      $doctor->name=$request->name;
      $doctor->phone=$request->number;
      $doctor->speciality=$request->speciality;

      $doctor->save();
      

      return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment()
    {
      $data=appointment::all();

      return view('admin.showappointment',compact('data'));
    }

    public function approved($id)
    {
      $data=appointment::find($id);

      $data->status='approved';
      
      $data->save();

      return redirect()->back();
    }

    public function canceled($id)
    {
      $data=appointment::find($id);

      $data->status='canceled';
      
      $data->save();

      return redirect()->back();
    }
    
    public function showdoctor()
    {
      $data=doctor::all();
      return view('admin.showdoctor',compact('data'));
    }

    public function removedoctor($id)
    {
      $data=doctor::find($id);

      $data->delete();

      return redirect()->back();
    
}

    public function updatedoctor($id)
    {

      $data = doctor::find($id);


      return view('admin.update_doctor',compact( 'data'));
    }
 
    public function dashboard()
    {
        $userCount = User::count();
        return view('admin.home', compact('userCount')); // Pass variable to view
    }
    
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    
    public function home()
    {
        $users = User::all() ?? collect();
    
        return view('admin.home', compact('users'));
    }
    public function editdoctor(Request $request , $id)
    {

      $doctor = doctor::find($id);

      $doctor->name=$request->name;

      $doctor->phone=$request->phone;

      $doctor->speciality=$request->speciality;

      $image=$request->file;

      if($image){

      }

      $imagename=time().'.'.$image->getClientOriginalExtension();

      $request->file->move('doctorimage', $imagename);

      $doctor->image=$imagename;

      $doctor->save();

      return redirect()->back()->with('message','Doctor Update Successful');

    }

    public function emailview($id)
    {
      
      $data=appointment::find($id);

      return view('admin.send_email',compact('data'));
    }
    
    public function sendemail(Request $request,$id)
    {

      $data = appointment::find($id);

      $details=[

       'greeting' => $request->greeting,

       'body' => $request->body,

       'actiontext' => $request->actiontext,

       'actionurl' => $request->actionurl,

       'endpart' => $request->endpart

      ];

      Notification::send($data, new SendEmailNotification($details));

      return back()->with('message','Send Email Successful');

    }
    public function viewUser($id)
    {
         $user = User::find($id);
        return view('admin.viewUser', compact('user'));
    }
   public function deleteUser($id)
   {

     $user = user::find($id);

     $user->delete();

     return redirect()->back();

   }

   public function editUser($id)
   {
       $user = user::find($id);
       return view('admin.editUser', compact('user'));
   }

   public function updateUser(Request $request, $id)
{
    $user = User::find($id);

    if ($user) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->student_id = $request->student_id;
        $user->education_level = $request->education_level;
        $user->year_level = $request->year_level;

        $user->save();
    }

    return redirect()->back();
}

}