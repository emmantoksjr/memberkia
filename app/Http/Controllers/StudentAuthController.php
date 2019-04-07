<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use Session;
use App\studentDetail;
use App\department_detail;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
    use AuthenticatesUsers;

    public function showRegistrationForm()
    {
        $departments = department_detail::all();
        return view('students.register',compact('departments'));
    }

    public function showLoginForm()
    {
       
        return view('students.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'matric' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $student = User::all()->where('email',$request->matric)->first();
        if($student == null)
        {
            $this->displayMessages('error',"User not found!");
                 return redirect('/student/login'); 
        }else{
            if($student->privilege == 1){
                $this->displayMessages('error',"Admin cannot login here! Kindly use the admin login to continue");
                 return redirect('/student/login');
            }
        }
        
        
        if(Auth::attempt(['email' => $request->matric, 'password' => $request->password])){
             $this->displayMessages('success','Login successful!');
              return redirect('/student/home');
          
            // return view('student.dashboard');
            }
            else{
            $this->displayMessages('error',"Credentials doesn't match our records! Kindly check and try again!");
             return redirect('/student/login');
        }
    }

    public function showPasswordResetForm ()
    {
     return view('auth.passwords.email');
    }

    public function verifyEmailForReset (Request $request)
    {
         if(($user =  User::all()->where('email', $request->email)->first()) != null){
             return view('auth.passwords.reset', compact('user'));
         }else{
             $this->displayMessages('error','Email not found!');
             return redirect('/admin/showPasswordResetForm');
         }

    }

    public function saveNewPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        $user =  User::all()->where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        if($user->save()){
            $this->displayMessages('success','Password Changed Successfully!');
            return redirect('/admin/login');
        }else{
            $this->displayMessages('error','Error Changing Password!');
            return redirect('/admin/saveNewPassword');
        }
    }

    public function enterPassword(){
        return view('auth.passwords.reset');
    }

    public function showAdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function Register(Request $request)
    {
        $slug = uniqid();
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' =>'required|string|max:255',
            'email' => 'required|email|unique:student_details',
            'level' => 'required',
            'marital_status' => 'required',
            'lga' => 'required',
            'dob' => 'required',
            'state_of_origin' => 'required|string',
            'nationality' => 'required|string',
            'address' => 'required|string',
            'matric_num' => 'required|string|max:100',
            'phone' => ['required', 'string', 'size:11', 'regex:/^[0]\d{10}$/','unique:student_details'],
            'course_of_study' => 'required|string|max:255',
            'admission_year' => 'required|string|max:100',
            'expected_grad_year' => 'required|string|max:100',
            'next_of_kin_name' => 'required|string|max:255',
            'next_of_kin_phone' => 'required|string|size:11|regex:/^[0]\d{10}$/',
            'next_of_kin_address' => 'required|string',
            'sponsor_name' => 'required|string',
            'sponsor_address' => 'required|string',
            'sponsor_phone' => 'required|string|string:11|regex:/^[0]\d{10}$/'
        ]);
        try {

            studentDetail::create([
                'slug' => $slug,
                'title' => $request->title,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'middlename' =>$request->middlename,
                'marital_status' =>$request->marital_status,
                'gender' => $request->gender,
                'date_of_birth' => $request->dob,
                'lga' => $request->lga,
                'state_of_origin' => $request->state_of_origin,
                'nationality' => $request->nationality,
                'address' => $request->address,
                'email' => $request->email,
                'level' => $request->level,
                'matric_num' => $request->matric_num,
                'phone' => $request->phone,
                'course_of_study' => $request->course_of_study,
                'admission_year' => $request->admission_year,
                'expected_grad_year' => $request->expected_grad_year,
                'next_of_kin_name' => $request->next_of_kin_name,
                'next_of_kin_phone' => $request->next_of_kin_phone,
                'next_of_kin_address' => $request->next_of_kin_address,
                'sponsor_name' => $request->sponsor_name,
                'sponsor_address'=> $request->sponsor_address,
                'sponsor_phone' => $request->sponsor_phone,
            ]);
            User::create([
                'slug' => $slug,
                'privilege' => 2,
                'disabled' => 0,
                'email' => $request->matric_num,
                'password' => Hash::make($request->lastname),
            ]);

            $this->displayMessages('success','Student Details Created Successfully!');
             return redirect('/student/login');
            
        } catch (\Illuminate\Database\QueryException $e) {
            $this->displayMessages('error','Error creating user!');
            return redirect('/admin/students');
        }
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/student/dashboard';
    
    protected function authenticated(Request $request, $user)
    {
        return redirect('/student/dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }

}