<?php

namespace App\Http\Controllers;

use App\deu;
use App\payment;
use DB;
use Auth;
use Hash;
use App\User;
use Session;
use Validator;
use Redirect;
use App\event;
use App\tutorial;
use App\event_attendant;
use App\student_event;
use App\faculty_detail;
use App\student_due;
use App\studentDetail;
use App\announcement;
use App\department_detail;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class StudentDetailController extends Controller
{
    use AuthenticatesUsers;

    function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }

    public function home()
    {
        $events = event::all()->where('viewers', '<>', 2);
        $announcements = announcement::all()->where('viewers', '<>',2);
        $announcements = $this->paginate($announcements,5);
        $announcements->withPath('/student/home');
        return view('students.overview', compact('announcements','events'));
    }

    public function announcements()
    {
        $announcements = announcement::all()->where('viewers','<>', 2);
        $events = event::all()->where('viewers', '<>', 2);
        $announcements = $this->paginate($announcements,5);
        $announcements->withPath('/student/announcement');
        return view('students.announcements.index', compact('announcements','events'));
    }

    public function announcementsTimeCheck(Request $request)
    {
        $announcements = DB::table('announcements')
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        $announcements = $this->paginate($announcements,5);
        $announcements->withPath('/student/announcement');
        return view('students.announcements.index', compact('announcements'));
    }

    public function profile()
    {
        $student = DB::table('student_details')->where('slug', Auth::user()->slug)->get()->first();
        return view('students.profile', compact('student'));
    }

    public function edit()
    {
        $student = DB::table('student_details')->where('slug', Auth::user()->slug)->get()->first();
        return view('students.edit', compact('student'));
    }

    public function profileUpdateDetails(Request $request)
    {
        $user = studentDetail::all()->where('slug',Auth::user()->slug)->first();
        $id = $user->id;
        $this->validate($request, [
            'phone' => ['size:11', 'regex:/^[0]\d{10}$/', 'unique:student_details,phone,'.$id],
            'email' => 'email|unique:student_details,email,'.$id,
            'password' => 'confirmed'
    ]);

        $student = studentDetail::whereSlug(Auth::user()->slug)->firstOrFail();
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->level = $request->level;
        $student->gender = $request->gender;
        if($request->password == null){
             
        }
        else{
            $upass = User::all()->where('id', Auth::user()->id)->first();
            $upass->password = Hash::make($request->password);
            $upass->has_passwordreset = 1;
            $upass->save();
        }
        try{
            $student->save();
            $this->displayMessages('success','Details saved successfully!');
            return redirect('/student/profile');
        }catch (\Illuminate\Database\QueryException $e)
        {
            $this->displayMessages('error','Error editing details. Kindly try again!');
            return redirect('/student/profile/edit');
        }
    }

    public function dues()
    {
        $student_dues = student_due::all()
            ->where('user_id', '=',Auth::user()->id);
        $dues = deu::all()->where('viewers', '<>','2');
        
        if($student_dues->count() < 1)
        {
            $alldues[] = null;
        }
        foreach($student_dues as $student_due)
            {
                $alldues[] = $student_due->deu_id; 
            }
        $student_dues = $this->paginate($student_dues,5);
        $student_dues->withPath('/student/dues');
        return view('students.dues.dues',compact('student_dues','dues','alldues'));
    }

    public function duesPaid()
    {
        $id = 1;
        $student_dues = student_due::all()
            ->where('user_id', '=',Auth::user()->id)
            ->where('paid', '=',1);
            $student_dues = $this->paginate($student_dues,5);
        $student_dues->withPath('/student/dues/paid');
        $dues = deu::all()->where('viewers', '<>','2');
        return view('students.dues.paid',compact('id','student_dues','dues'));
    }

    public function payDue($id)
    {
        $user = \DB::table('student_details')->where('slug',Auth::user()->slug)->get()->first();
        $due = deu::find($id);
        return view('students.dues.pay',compact('due','user'));
    }

    public function saveDueFeedback(Request $request)
    {
        $messages = [
            'matric.required' => 'The matric number is required. ',
            'reference.required' => 'This is another important field missing. ',
        ];
        $validator = Validator::make($request->all(), [
            'matric' => 'required',
            'reference' => 'required',
            'due_id' => 'required',
            'event_id' =>'required',
            'mode' => 'required',
            'type' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'status' => 'required',
            'payin_time' => 'required'
        ], $messages);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
       
        try
        {
                $payment = new payment();
                $newstudent = new student_due();
                $student_due = student_due::all()
                    ->where('user_id',Auth::user()->id)
                    ->where('deu_id',$request->due_id)->first();
                   
                    $payment::create([
                        'matric' => $request->matric,
                        'reciept' => $request->reference,
                        'due_id' => $request->due_id,
                        'event_id' => $request->event_id,
                        'mode' => $request->mode,
                        'type' => $request->type,
                        'paid' => $request->paid,
                        'balance' => $request->balance,
                        'status' => $request->status,
                        'payin_time' => $request->payin_time
                    ]);

                if($student_due == null)
                {
                    $newstudent::create([
                        'user_id' => Auth::user()->id,
                        'deu_id' => $request->due_id,
                        'paid' => 1,
                        'pending' => 0
                    ]);

                }else
                {
                    $student_due->paid = 1;
                    $student_due->pending = 0;
                    $student_due->save();
                }
                
             return  response()->json(['success'=>'Your enquiry has been successfully submitted!']);
            }catch(\Illuminate\Database\QueryException $e){
             return   response()->json(['error'=> $e]);
            }
    }

    public function events()
    {
        $user = \DB::table('student_details')->where('slug',Auth::user()->slug)->get()->first();
        $events = event::all()->where('viewers','<>',2)->where('completed',0);
         $events = $this->paginate($events,5);
        $events->withPath('/student/event');
        $eventattendance = event_attendant::all()->where('user_id',Auth::user()->id)->toArray();
        if($eventattendance == null ){
            $ats[] = 0;
        }else{
            foreach($eventattendance as $at){
                $ats[] = $at['event_id'];
            }
        }
       
        return view('students.events.event',compact('events','ats','user'));
    }

    public function attendFreeEvent($id)
    {
        $event = event::find($id);
        $eventattendance = new event_attendant();
        $studentevent = new  student_event();

        if($event->mode == 1){
            $free = 1;
            $paid = 0;
        }else{
            $free = 0;
            $paid = 1;
        }

        $studentevent::create([
            'user_id' => Auth::user()->id,
            'event_id' => $id,
            'free' => $free,
            'paid' => $paid
        ]);

        $eventattendance::create([
            'event_id' => $id,
            'user_id' => Auth::user()->id,
            'is_attended' => 0
        ]);
        return  response()->json(['success'=>'Your enquiry has been successfully submitted!']);
    }

    public function removeFreeEvent($id)
    {
        $event = event::find($id);
        $eventattendance = event_attendant::all()->where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
        $studentevent = student_event::all()->where('user_id',Auth::user()->id)
        ->where('event_id',$event->id)->first();
        $eventattendance->delete();
        $studentevent->delete();
        return  response()->json(['success'=>'Your enquiry has been successfully submitted!']);
    }

    public function payEvent($id)
    {
        $user = \DB::table('student_details')->where('slug',Auth::user()->slug)->get()->first();
        $event = event::find($id);
        return view('students.events.pay',compact('event','user'));
    }

    public function saveEventFeedback(Request $request)
    {
        
        $messages = [
            'matric.required' => 'The matric number is required. ',
            'reference.required' => 'This is another important field missing. ',
        ];
        $validator = Validator::make($request->all(), [
            'matric' => 'required',
            'reference' => 'required',
            'due_id' => 'required',
            'event_id' =>'required',
            'mode' => 'required',
            'type' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'status' => 'required',
            'payin_time' => 'required'
        ], $messages);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        } 
        try{
            $event = event::find($request->event_id);
            $eventattendance = new event_attendant();
            $studentevent = new  student_event();
            $payment = new payment();
            if($event->mode == 2){
                $free = 0;
                $paid = 1;
            }
            $studentevent::create([
                'user_id' => Auth::user()->id,
                'event_id' => $request->event_id,
                'free' => $free,
                'paid' => $paid
            ]);
    
            $eventattendance::create([
                'event_id' => $request->event_id,
                'user_id' => Auth::user()->id,
                'is_attended' => 0
            ]);
              
            $payment::create([
                    'matric' => $request->matric,
                    'reciept' => $request->reference,
                    'due_id' => $request->due_id,
                    'event_id' => $request->event_id,
                    'mode' => $request->mode,
                    'type' => $request->type,
                    'paid' => $request->paid,
                    'balance' => $request->balance,
                    'status' => $request->status,
                    'payin_time' => $request->payin_time
                ]);
             return  response()->json(['success'=>'Your enquiry has been successfully submitted!']);
            }catch(\Exception $e){
             return   response()->json(['error'=> $e]);
        }
    }

    public function tutorials()
    {
        $user = studentDetail::all()->where('slug',Auth::user()->slug)->first();
        $events = event::all()->where('viewers' , '<>', 2)->take(5);
        $tutorials = tutorial::all()->where('level',$user->level);
         $tutorials = $this->paginate($tutorials,5);
        $tutorials->withPath('/student/tutorials');
        return view('students.tutorials.tutorial', compact('tutorials','user','events'));
    }

    public function qrcode()
    {
        $slug = Auth::user()->slug;
        $qr = \QrCode::format('svg')->size(500)->generate($slug);
        $qr = print($qr);
        return view('students.qr', compact('qr'));
    }

    public function payments()
    {
        $id = 1;
        $payments = payment::all()->where('matric',Auth::user()->email)->sortByDesc('created_at');
        $dues = deu::get(['id','name']);
        $events = event::get(['id','name']);
        return view('students.payments', compact('payments','id', 'dues','events'));
    }
    
}
