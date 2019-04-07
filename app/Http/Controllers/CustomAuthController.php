<?php
namespace App\Http\Controllers;

use Hash;
use App\User;
use Session;
use App\faculty_detail;
use App\studentDetail;
use App\department_detail;
use App\announcement;
use Auth;
use App\event;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    use AuthenticatesUsers;

    public function showRegistrationForm()
    {
        $faculties = faculty_detail::all();
        return view('auth.register',compact('faculties'));
    }

    public function showAdminLoginForm()
    {
        return view('auth.login');
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
            'password' => 'required|confirmed',
        ]);

        $user =  User::all()->where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->has_passwordreset = 1;
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
        $students = studentDetail::all();
        $announcements = announcement::all()->take(5)->sortByDesc('created_at');
        $events = event::all()->take(5)->sortByDesc('created_at');
        return view('admin.dashboard', compact('announcements','events','students'));
    }

    public function Register(Request $request)
    {
        $this->validate($request, [
            'department' => 'required|string|max:255',
            'phone' => ['required', 'string', 'size:11', 'regex:/^[0]\d{10}$/'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
            $slug = uniqid();
            User::create([
                'slug' => $slug,
                'privilege' => 1,
                'disabled' => 0,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            department_detail::create([
                'slug' => $slug,
                'department_name' => $request->department,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            $this->displayMessages('success','Department record has been created successfully!');
            return redirect('/admin/login');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';
    
    protected function authenticated(Request $request, $user)
    {
        return redirect('/admin/dashboard');
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