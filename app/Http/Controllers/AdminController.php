<?php
namespace App\Http\Controllers;

use App\payment;
use Auth;
use Hash;
use App\deu;
use App\event;
use App\User;
use Session;
use App\year;
use App\tutorial;
use App\polls;
use App\student_due;
use App\Role;
use App\Permission_Role;
use App\Permission;
use App\alumniDetail;
use App\studentDetail;
use App\poll_result;
use App\event_attendant;
use App\app_session;
use App\announcement;
use App\department_detail;
use Illuminate\Http\Request;
ini_set('max_execution_time', 1800);
ini_set('memory_limit','4400M');
class AdminController extends Controller
{

    public function viewStudents()
    {   
        $id = 1;
        $students = studentDetail::all();
        $stu_diss = User::all();
        return view('admin.students.index',compact('students', 'id','stu_diss'));
    }

    public function createStudent()
    {
        return view('admin.students.create');
    }

    public function saveCreateStudent(Request $request)
    {
        $slug = uniqid();
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'level' => 'required',
            'email' => 'required',
            // 'marital_status' => 'required',
            // 'lga' => 'required',
            // 'dob' => 'required',
            // 'state_of_origin' => 'required|string',
            // 'nationality' => 'required|string',
            // 'address' => 'required|string',
            'matric_num' => 'required|string|max:100',
            'phone' => ['string', 'size:11', 'regex:/^[0]\d{10}$/','unique:student_details'],
            // 'course_of_study' => 'required|string|max:255',
            // 'admission_year' => 'required|string|max:100',
            // 'expected_grad_year' => 'required|string|max:100'
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

            switch($request->save) {
                case 'save':
                    $this->displayMessages('success','Student Details Created Successfully!');
                    return redirect('/admin/students');
                    break;

                case 'saveAndContinue':
                    $this->displayMessages('success','Student Details Created Successfully!');
                    return redirect('/admin/student/create');
                    break;
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $this->displayMessages('error','Error creating user!');
            return redirect('/admin/students');
        }
    }

    public function createStudentBatch()
    {
        return view('admin.students.batch');
    }

    public function saveStudentBatch(Request $request)
    {
        $file = $request->file('import');
        $studentArr = $this->csvToArray($file);
        for ($i = 0; $i < count($studentArr); $i ++)
        {
            $slug = uniqid();
            $data[$i]['slug'] = $slug;
            $pieces = explode(" ", $studentArr[$i]['NAMES']);
            $data[$i]['lastname'] =  $pieces[0];
            $data[$i]['firstname'] = $pieces[1];
            $data[$i]['matric_num'] = $studentArr[$i]['MATRIC'];
            $data[$i]['level'] = $studentArr[$i]['LEVEL'];
            
            
             
            try {
               
               
            studentDetail::firstOrCreate([
            'matric_num' => $data[$i]['matric_num']
            ], [
            'slug' => $slug,
            'firstName' => $data[$i]['firstname'],
            'lastName' => $data[$i]['lastname'],
            'level' => 100
            ]);;
                
                User::firstOrCreate([
                    'slug' => $slug,
                    'privilege' => 2,
                    'disabled' => 0,
                    'email' => $studentArr[$i]['MATRIC'],
                    'password' => Hash::make($data[$i]['lastname']),
                ]);
            }
             catch (\Illuminate\Database\QueryException $e) {
                //  dd($e);
                continue;
            }

        }
        $this->displayMessages('success','Student Created Successfully!');
        return redirect('/admin/students');
    }

    public function editStudent($id)
    {
        $student = studentDetail::whereId($id)->firstOrFail();
        return view('admin.students.edit', compact('student'));
    }

    public function saveEditStudent($id, Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'level' => 'required',
            // 'marital_status' => 'required',
            // 'lga' => 'required',
            // 'dob' => 'required',
            // 'state_of_origin' => 'required|string',
            // 'nationality' => 'required|string',
            // 'address' => 'required|string',
            'matric_num' => 'required|string|max:100',
            'phone' => ['string', 'size:11', 'regex:/^[0]\d{10}$/'],
            // 'course_of_study' => 'required|string|max:255',
            // 'admission_year' => 'required|string|max:100',
            // 'expected_grad_year' => 'required|string|max:100'
        ]);

        $student = studentDetail::whereId($id)->firstOrFail();
        $student->title = $request->get('title');
        $student->firstname = $request->get('firstname');
        $student->lastname = $request->get('lastname');
        $student->middlename = $request->get('middlename');
        $student->gender = $request->get('gender');
        $student->marital_status = $request->get('marital_status');
        $student->date_of_birth = $request->get('dob');
        $student->lga = $request->get('lga');
        $student->state_of_origin = $request->get('state_of_origin');
        $student->nationality = $request->get('nationality');
        $student->sponsor_address = $request->get('sponsor_address');
        $student->sponsor_name = $request->get('sponsor_name');
        $student->sponsor_phone = $request->get('sponsor_phone');
        $student->email = $request->get('email');
        $student->matric_num = $request->get('matric_num');
        $student->phone = $request->get('phone');
        $student->level = $request->get('level');
        $student->course_of_study = $request->get('course_of_study');
        $student->admission_year = $request->get('admission_year');
        $student->expected_grad_year = $request->get('expected_grad_year');
        $student->next_of_kin_name = $request->get('next_of_kin_name');
        $student->next_of_kin_phone = $request->get('next_of_kin_phone');
        $student->next_of_kin_address = $request->get('next_of_kin_address');
        $student->save();
        $this->displayMessages('success','Student record has been updated Successfully!');
        return redirect(action('AdminController@viewStudents'));
    }

    public function disableStudent($id)
    {
        $student = User::find($id);
        $student->disabled = 1;
        $student->save();
        $this->displayMessages('success','Student disabled successfully!');
        return redirect(action('AdminController@viewStudents'));
    }

    public function enableStudent($id)
    {
        $student = User::find($id);
        $student->disabled = 0;
        $student->save();
        $this->displayMessages('success','Student enabled successfully!');
        return redirect(action('AdminController@viewStudents'));
    }
    public function studentDetails($matric)
    {
        $student = User::all()->where('email',$matric)->first();
        $studentSlug = $student->slug;
        $studentDetails = studentDetail::all()->where('slug',$studentSlug)->first();
        return json_encode($studentDetails);
    }

    public function viewAlumni()
    {
        $id = 1;
        $alumnis = alumniDetail::all();
        return view('admin.alumni.index',compact('alumnis', 'id'));
    }

    public function createAlumni()
    {
        return view('admin.alumni.create');
    }

    public function saveCreateAlumni(Request $request)
    {
        $slug = uniqid();
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:student_details',
            'matric_num' => 'required|string|max:100',
            'phone' => ['required', 'string', 'size:11', 'regex:/^[0]\d{10}$/','unique:student_details'],
            'course_of_study' => 'required|string|max:255',
            'admission_year' => 'required|string|max:100',
            'grad_year' => 'required|string|max:100',
            'next_of_kin_name' => 'required|string|max:255',
            'next_of_kin_phone' => 'required|string|size:11'
        ]);

        try {
            alumniDetail::create([
                'department_id' => Auth::user()->id,
                'slug' => $slug,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'matric_num' => $request->matric_num,
                'phone' => $request->phone,
                'course_of_study' => $request->course_of_study,
                'admission_year' => $request->admission_year,
                'grad_year' => $request->grad_year,
                'next_of_kin_name' => $request->next_of_kin_name,
                'next_of_kin_phone' => $request->next_of_kin_phone,
            ]);
            User::create([
                'slug' => $slug,
                'privilege' => 3,
                'email' => $request->email,
                'disabled' => 0,
                'password' => Hash::make($request->lastname),
            ]);
            switch($request->save) {
                case 'save':
                    $this->displayMessages('success','Alumni Details Created Successfully!');
                    return redirect('/admin/alumni');
                    break;
                case 'saveAndContinue':
                    $this->displayMessages('success','Alumni Details Created Successfully!');
                    return redirect('/admin/alumni/create');
                    break;
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $this->displayMessages('error','User details already exist!');
            return redirect('/admin/alumni');
        }
    }

    public function createAlumniBatch()
    {
        return view('admin.alumni.batch');
    }

    public function saveAlumniBatch(Request $request)
    {
        $file = $request->file('import');
        $alumniArr = $this->csvToArray($file);

        for ($i = 0; $i < count($alumniArr); $i ++)
        {
            $slug = uniqid();
            $alumniArr[$i]['slug'] = $slug;

            try {
                alumniDetail::firstOrCreate($alumniArr[$i]);
                User::firstOrCreate([
                    'slug' => $slug,
                    'privilege' => 3,
                    'disabled' => 0,
                    'email' => $alumniArr[$i]['email'],
                    'password' => Hash::make($alumniArr[$i]['lastname']),
                ]);

            } catch (\Illuminate\Database\QueryException $e) {
                continue;
                // $this->displayMessages('error','Duplicate entry for Fields in the Import CSV!');
                // return redirect('/admin/alumni');
            }
        }
        $this->displayMessages('success','Alumni Created Successfully!');
        return redirect('/admin/alumni');
    }

    public function editAlumni($id)
    {
        $alumni = alumniDetail::whereId($id)->firstOrFail();
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function saveEditAlumni($id, Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'matric_num' => 'required|string|max:100',
            'phone' => ['required', 'string', 'size:11', 'regex:/^[0]\d{10}$/'],
            'course_of_study' => 'required|string|max:255',
            'admission_year' => 'required|string|max:100',
            'grad_year' => 'required|string|max:100',
            'next_of_kin_name' => 'required|string|max:255',
            'next_of_kin_phone' => 'required|string|size:11'
        ]);

        $alumni = alumniDetail::whereId($id)->firstOrFail();
        $alumni->firstname = $request->get('firstname');
        $alumni->lastname = $request->get('lastname');
        $alumni->email = $request->get('email');
        $alumni->matric_num = $request->get('matric_num');
        $alumni->phone = $request->get('phone');
        $alumni->course_of_study = $request->get('course_of_study');
        $alumni->admission_year = $request->get('admission_year');
        $alumni->grad_year = $request->get('grad_year');
        $alumni->next_of_kin_name = $request->get('next_of_kin_name');
        $alumni->next_of_kin_phone = $request->get('next_of_kin_phone');
        $alumni->save();
        $this->displayMessages('success','Alumni record has been updated Successfully!');
        return redirect(action('AdminController@viewAlumni'));
    }

    public function disableAlumni($id)
    {
        return 'This would be worked on. It is suspended for now';
    }

    public function viewAnnouncements()
    {
        $announcements = announcement::orderBy('created_at','desc')->get();
        return view('admin.announcement.index', compact('announcements'));
    }

    public function createAnnouncement()
    {
        return view('admin.announcement.create');
    }

    public function saveCreateAnnouncement(Request $request)
    {

        $slug = uniqid();
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|max:255',
            'options' =>'required'
        ]);

        announcement::create([
            'slug' => $slug,
            'title' => $request->title,
            'department_id' => Auth::user()->id,
            'description' => $request->description,
            'viewers' =>$request->options,
        ]);

        switch($request->save) {

            case 'save':
                $this->displayMessages('success','Announcement Details Created Successfully!');
                return redirect('/admin/announcements');
                break;

            case 'saveAndContinue':
                $this->displayMessages('success','Announcement Details Created Successfully!');
                return redirect('/admin/announcement/create');
                break;
        }
    }

    public function viewAnnouncementDetails ($id)
    {
        $announcement = announcement::whereId($id)->firstOrFail();
        return view('admin.announcement.view', compact('announcement'));
    }

    public function editAnnouncementDetails ($id)
    {
        $announcement = announcement::whereId($id)->firstOrFail();
        return view('admin.announcement.edit', compact('announcement'));
    }

    public function saveEditAnnouncement($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'options' => 'required'
        ]);
        $announcement = announcement::whereId($id)->firstOrFail();
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->viewers = $request->options;
        $announcement->save();
        $this->displayMessages('success','Announcement has been updated Successfully!');
        return redirect('/admin/announcements');
    }

    public function viewDues()
    {
       $dues = deu::all()->sortByDesc('created_at');
       $id = 1;
       return view('admin.dues.index', compact('dues','id'));
        // return view('admin.dues.index');
    }

    public function createDues()
    {
        $years = year::all();
        return view('admin.dues.create',compact('years'));
    }

    public function saveCreateDue(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'amount' => 'required',
            'sessions' => 'required',
            'years' => 'required',
            'options' => 'required',
        ]);

        deu::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'department_id' => Auth::user()->id,
            'session' => $request->sessions,
            'year' => $request->years,
            'viewers' => $request->options
        ]);
        $this->displayMessages('success','Due created Successfully!');
        return redirect('/admin/dues');
    }

    public function editDue($id)
    {
        $due = deu::whereId($id)->firstOrFail();
        $sessions = app_session::all();
        $years = year::all();
        return view('admin.dues.edit', compact('due','sessions','years'));
    }

    public function saveEditDue($id,Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'amount' => 'required',
            'sessions' => 'required',
            'years' => 'required',
            'options' => 'required',
        ]);

        $due = deu::whereId($id)->firstOrFail();
        $due->name = $request->get('name');
        $due->amount = $request->get('amount');
        $due->session = $request->get('sessions');
        $due->year = $request->get('years');
        $due->viewers = $request->get('options');
        $due->save();
        $this->displayMessages('success','Due details has been updated successfully!');
        return redirect(action('AdminController@viewDues'));
    }

    public function selectDue($session,$year)
    {$dues = deu::all()
        ->where('session',$session)
        ->where('year',$year)->sortByDesc('created_at')->toArray();
    //  json_encode($dues);
     return $dues;
    }

    public function singleDue($selectvalue)
    {
        $selected = deu::find($selectvalue);
        json_encode($selected);
        return $selected;
    }

    public function officePayment()
    {
        $payments = payment::all()->where('mode', 'Office')->where('event_id','<', 1);
        $students = \DB::table('student_details')->get();
        $dues = deu::all();
        return view('admin.payments.office',compact('payments','students','dues'));
    }

    public function timecheckOfficePayments(Request $request)
    {
        $payments = \DB::table('payments')->where('mode', 'Office')->where('event_id','<', 1)
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        $students = \DB::table('student_details')->get();
        $dues = deu::all();
        return view('admin.payments.office',compact('payments','students','dues'));
    }

    public function onlinePayment()
    {
        $payments = payment::all()->where('mode', 'Online')->where('event_id','<', 1);
        $students = \DB::table('student_details')->get();
        $dues = deu::all();
        return view('admin.payments.bank',compact('payments','students','dues'));
    }

    public function timecheckOnlinePayments(Request $request)
    {
        $payments = \DB::table('payments')->where('mode', 'Online')->where('event_id','<', 1)
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        // $payments = payment::all()->where('mode', 'Online')->where('event_id','<', 1)->whereBetween('created_at', [$request->from, $request->to]);
        $students = \DB::table('student_details')->get();
        $dues = deu::all();
        return view('admin.payments.bank',compact('payments','students','dues'));
    }

    public function payments()
    {
        $payments = payment::all()->where('event_id','<', 1);
        $students = \DB::table('student_details')->get();
        $dues = deu::all();
        return view('admin.payments.index',compact('payments','students','dues'));
    }

    public function timecheckPayments(Request $request)
    {
        // $payments = payment::all()->where('event_id','<', 1);
        $payments = \DB::table('payments')->where('event_id','<', 1)
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        $students = \DB::table('student_details')->get();
        $dues = deu::all();
        return view('admin.payments.index',compact('payments','students','dues'));
    }

    public function paymentDetails($id)
    {
        $payment = payment::find($id);
        $student = \DB::table('student_details')->where('matric_num',$payment->matric)->get()->first();
        $due = deu::all()->where('id',$payment->due_id);
        return view('admin.payments.details', compact('payment','student','due'));
    }

    public function createPayment()
    {
        $app_sessions = app_session::all();
        $years = year::all();
        return view('admin.payments.create',compact('app_sessions','years'));
    }

    public function savePayment(Request $request)
    {
        $this->validate($request,[
            'matric' => 'required',
            'ref' => 'required',
            'due_id' => 'required',
            'paid' => 'required',
        ]);
        $userid = User::all()
         ->where('email' , $request->matric)
         ->first();
        $due = deu::find($request->due_id);
        $balance = $due->amount - $request->paid;
        $check = payment::all()->where('matric',$request->matric)
        ->where('due_id',$request->due_id)->last();
        
        if($check == null){
            payment::Create([
                'matric' => $request->matric,
                'reciept' => $request->ref,
                'due_id' => $request->due_id,
                'event_id' => 0,
                'mode' => 'Office',
                'type' => 'Due',
                'paid' => $request->paid,
                'balance' => $balance,
                'status' => 'success',
                'payin_time' => NOW()
            ]);
            student_due::Create([
                'user_id' => $userid->id,
                'deu_id' => $request->due_id,
                'paid' => 0,
                'pending' => 1,
                ]);
            
            $this->displayMessages('success','Payment saved Successfully!');
            return redirect('/admin/payments');
        }else{
            if($check->balance == 0){
            $this->displayMessages('error','User has already paid for the event. Kindly check your payment records!');
                return redirect('/admin/payments/create');
        }
         if($request->paid > $check->balance){
                $this->displayMessages('error','Amount paid cannot be greater than the remaining balance!');
                return redirect('/admin/payments/create'); 
            }else{
                 $amountBal = $check->balance - $request->paid;
                if($amountBal == 0){
                    $student_due = student_due::all()
                    ->where('user_id', $userid->id)
                    ->where('deu_id', $request->due_id)->first();
                    $student_due->paid = 1;
                    $student_due->pending =0;
                    $student_due->update();
                }

                payment::Create([
                    'matric' => $request->matric,
                    'reciept' => $request->ref,
                    'due_id' => $request->due_id,
                    'event_id' => 0,
                    'mode' => 'Office',
                    'type' => 'Due',
                    'paid' => $request->paid,
                    'balance' => $amountBal,
                    'status' => 'success',
                    'payin_time' => NOW()
                ]);
                $this->displayMessages('success','Payment saved Successfully!');
                return redirect('/admin/payments');
            }
        }
    }

    public function verifyPayment()
    {
        return view('admin.payments.verify');
    } 

    public function eventOfficePayment()
    {
        $payments = payment::all()->where('mode', 'Office')
        ->where('due_id','<', 1);
        $students = \DB::table('student_details')->get();
        $events = event::all();
        return view('admin.eventpayments.office',compact('payments','students','events'));
    }

    public function timecheckEventOfficePayments(Request $request)
    {
        $payments = \DB::table('payments')->where('mode', 'Office')
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        $students = \DB::table('student_details')->get();
        $events = event::all();
        return view('admin.eventpayments.office',compact('payments','students','events'));
    }

    public function eventOnlinePayment()
    {
        $payments = payment::all()->where('mode', 'Online');
        $students = \DB::table('student_details')->get();
        $events = event::all();
        $dues = deu::all();
        return view('admin.eventpayments.bank',compact('payments','students','events','dues'));
    }

    public function timecheckEventOnlinePayments(Request $request)
    {
        $payments = \DB::table('payments')->where('mode', 'Online')
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        $students = \DB::table('student_details')->get();
        $events = event::all();
        $dues = deu::all();
        return view('admin.eventpayments.bank',compact('payments','students','events','dues'));
    }

    public function eventPayments()
    {
        $payments = payment::all()->where('due_id','<', 1);
        $students = \DB::table('student_details')->get();
        $events = event::all();
        return view('admin.eventpayments.index',compact('payments','students','events'));
    }

    public function timecheckEventPayments(Request $request)
    {
        $payments = \DB::table('payments')->where('due_id','<', 1)
        ->whereDate('created_at', '<=', $request->to)
        ->whereDate('created_at', '>=', $request->from)
        // ->whereBetween('created_at', [$request->from, $request->to])
        ->get();
        $students = \DB::table('student_details')->get();
        $events = event::all();
        return view('admin.eventpayments.index',compact('payments','students','events'));
    }

    public function EventPaymentDetails($id)
    {
        $payment = payment::find($id);
        $student = \DB::table('student_details')->where('matric_num',$payment->matric)->get()->first();
        $events = event::all()->where('id',$payment->due_id);
        return view('admin.eventpayments.details', compact('payment','student','event'));
    }

    public function eventCreatePayment()
    {
        $events = event::all()->where('completed',0);
        return view('admin.eventpayments.create',compact('events'));
    }

    public function eventSavePayment(Request $request)
    {
        $this->validate($request,[
            'matric' => 'required',
            'ref' => 'required',
            'event_id' => 'required'
        ]);
        $event = event::find($request->event_id);
                payment::Create([
                    'matric' => $request->matric,
                    'reciept' => $request->ref,
                    'due_id' => 0,
                    'event_id' => $request->event_id,
                    'mode' => 'Office',
                    'type' => 'Event',
                    'paid' => $event->price,
                    'balance' => 0,
                    'status' => 'success',
                    'payin_time' => NOW()
                ]);
                $this->displayMessages('success','Event Payment saved Successfully!');
                return redirect('/admin/event/payments');
    }

    public function eventVerifyPayment()
    {
        return view('admin.eventpayments.verify');
    } 

    public function profile($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $organisation = department_detail::whereSlug($user->slug)->firstOrFail();
        return view('admin.profile.index', compact('organisation','user'));
    }

    public function editProfile($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $organisation = department_detail::whereSlug($user->slug)->firstOrFail();
        return view('admin.profile.edit', compact('organisation','user'));
    }

    public function viewDetails($iid)
    {
        $id = 1;
        $eventdetail = event::find($iid);
        $users = \DB::table('users')
            ->join('student_details', 'users.slug', '=', 'student_details.slug')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id','student_details.firstname','student_details.lastname','student_details.level','student_details.matric_num')
            ->get();
        $attendees = event_attendant::all()->where('event_id',$iid)->values('user_id');
         $attendeds = event_attendant::all()->where('is_attended',1)
         ->where('event_id',$iid)->values('user_id');
         $allattended = [];
         foreach($attendeds as $attended)
         {
             $allattended[] = $attended->user_id;
         }
         
        $allattend = [];
        foreach($attendees as $attendee)
        {
            $allattend[] = $attendee->user_id;
        }
        return view('admin.events.view',compact('id','eventdetail','users','allattend','allattended'));
    }
 
    public function saveEditProfile($id, Request $request)
    {
        $this->validate($request,[
            'password' => 'confirmed'
        ]);
        
        $user = User::whereId($id)->firstOrFail();
        $organisation = department_detail::whereSlug($user->slug)->firstOrFail();
        
            $user->email = $request->email;
            $organisation->phone = $request->phone;
            $organisation->department_name = $request->department;
            if($request->password != null){
            $user->password = $request->password;
            }
            $user->save();
            $organisation->save();
            $this->displayMessages('success','Profile updated successfully!');
            return view('admin.profile.index', compact('organisation','user'));
    }

    public function events()
    {
        $events = event::all()->where('viewers', '<>', 2)->where('completed', 0)->where('date', '>=', Now())->sortByDesc('created_at');
        return view('admin.events.index', compact('events'));
    }

    public function completeEvent($id)
    {
       $event =  event::find($id);
       $event->completed = 1;
       $event->save();

        $events = event::all()->where('viewers', '<>', 2)->where('completed', '=', 0);
        $events = $this->paginate($events, 5);
        $events = $events->withPath('/admin/events');
        $this->displayMessages('success','Event Successfully Completed!');
        return view('admin.events.index', compact('events'));
    }

    public function createEvent()
    {
        return view('admin.events.create');
    }

    public function saveEvent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'end_time' => 'required',
            'mode' => 'required',
            'viewers' => 'required'
        ]);
        
        if($request->price == null){
            $price = 0;
        }else{
            $price = $request->price;
        }

        event::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'completed' => 0,
            'time' => $request->time,
            'end_time' => $request->end_time,
            'mode' => $request->mode,
            'price' => $price,
            'viewers' => $request->viewers
        ]);
        $this->displayMessages('success','Event created Successfully!');
        return redirect('/admin/events');
    }

    public function editEvent($id)
    {
        $event = event::findOrFail($id);
        return view('admin.events.edit',compact('event'));
    }

    public function saveEditEvent($id, Request $request)
    {
        $event = event::findOrFail($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->end_time = $request->end_time;
        $event->mode = $request->mode;
        $event->price = $request->price;
        $event->viewers = $request->viewers;

        if($event->update()){
            $this->displayMessages('success','Event Edited Successfully!');
            return redirect('/admin/events');
        }else{
            $this->displayMessages('error','Error editing event details. Please try again!');
            return redirect('/admin/events');
        }
    }

    public function tutorials()
    {
        $tutorials = tutorial::all()->where('date', '>=', Now());
        $id = 1;
        return view('admin.tutorial.index', compact('tutorials','id'));
    }

    public function createTutorial()
    {
        return view('admin.tutorial.create');
    }

    public function saveCreateTutorial(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'level' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required', 
        ]);

        $tutorial = new  tutorial();
        try{
            $tutorial::create([
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'level' => $request->level,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date' => $request->date,
                'prequisites' => $request->prequisites,
            ]);
            $this->displayMessages('success','Tutorial Created Successfully!');
            return redirect('/admin/tutorials');
        }catch(\Exception $e){
            $this->displayMessages('error','Error creating Tutorial!');
            return redirect('/admin/tutorials');
        }
    }

    public function editTutorial($id)
    {
        $tutorial = tutorial::find($id);
        return view('admin.tutorial.edit',compact('tutorial'));
    }

    public function saveEditTutorial($id,Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'level' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required', 
        ]);

        $tutorial = tutorial::find($id);
        $tutorial->name = $request->name;
        $tutorial->description = $request->description;
        $tutorial->location = $request->location;
        $tutorial->level = $request->level;
        $tutorial->start_time = $request->start_time;
        $tutorial->end_time = $request->end_time;
        $tutorial->date = $request->date;
        $tutorial->prequisites = $request->prequisites;
        $tutorial->save();
        $this->displayMessages('success','Tutorial Updated Successfully!');
        return redirect('/admin/tutorials');
    }

    public function users()
    {
        $id = 1;
        $users = \DB::table('department_details')
            ->join('users', 'users.slug', '=', 'department_details.slug')
            ->join('role_user','role_user.user_id', '=', 'users.id')
            ->join('roles','roles.id', '=', 'role_user.role_id')
            ->select('users.id','users.disabled','department_details.department_name','department_details.phone','roles.name')
            ->get();
        return view('admin.user.index',compact('users','id'));
    }

    public function createUser()
    {
        $roles =  Role::all()->where('visibility',1);
        return view('admin.user.create', compact('roles'));
    }

    public function saveCreate(Request $request)
    {
        $this->validate($request, [
            'department_name' => 'required|string|max:255|unique:department_details',
            'phone'=>'required|size:11|unique:department_details',
            'password' => 'required|alpha_num|min:8|confirmed',
            'email' => ['required', 'string', 'email', 'max:255','unique:users']
        ]);
        
        $slug = uniqid(); 
        User::create([
            'slug' => $slug,
            'privilege' => 1,
            'disabled' => 0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::all()->last();
        
        department_detail::create([
            'slug' => $slug,
            'department_name' => $request->department_name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        $roles = $request->get('role');
        
        if ($roles != ''){
            foreach ($roles as $role){
                $user->saveRoles($request->get('role'));
            }
        }
        $this->displayMessages('success','User Created Successfully!');
        return redirect('/admin/users');
    }

    public function editUser($id)
    {
        $user = \DB::table('department_details')
            ->join('users', 'users.slug', '=', 'department_details.slug')
            ->join('role_user','role_user.user_id', '=', 'users.id')
            ->join('roles','roles.id', '=', 'role_user.role_id')
            ->select('users.id','users.disabled','department_details.department_name','department_details.address', 'users.email', 'department_details.phone','roles.name')
            ->where('users.id',$id)
            ->first();
            $roles = \DB::table('roles')->where('id',"!=", 1)->get();
            $selectedRole = \DB::table('role_user')->where('user_id',$id)->select('role_id')->first();
            $selectedRoles[] = $selectedRole->role_id;
        return view('admin.user.edit',compact('user','roles', 'selectedRoles'));
    }

    public function updateUser($id, Request $request)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->email = $request->get('email');
        $password = $request->get('password');

        if ($password != "") {
            $user->password = Hash::make($password);
        } 

        $dept = department_detail::whereSlug($user->slug)->firstOrFail();
        $dept->department_name = $request->get('department_name');
        $dept->phone = $request->get('phone');
        $dept->address = $request->get('address');

        $user->save();
        $dept->save();
        
        $roles = $request->get('role');
    
        if ($roles != '')
        {
            foreach ($roles as $role){
                $user->saveRoles($request->get('role'));
            }
        }

        $this->displayMessages('success','User Updated Successfully!');
        return redirect('/admin/users');
    }

    public function disableUser($id)
    {
        $user = User::find($id);
        $user->disabled = 1;
        $user->save();
        $this->displayMessages('success','User disabled Successfully!');
        return redirect('/admin/users');
    }

    public function enableUser($id)
    {
        $user = User::find($id);
        $user->disabled = 0;
        $user->save();
        $this->displayMessages('success','User enabled Successfully!');
        return redirect('/admin/users');
    }

    public function viewTutorial($id)
    {
        $tutorial = tutorial::find($id);
        return view('admin.tutorial.view',compact('tutorial'));
    }

    public function polls()
    {
       $polls =  polls::all();
        return view('admin.poll.index' , compact('polls'));
    }

    public function createPoll()
    {
        return view('admin.poll.create');
    }

    public function savePoll(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:polls',
            'description'=>'required',
            'deadline' => 'required',
            'cand1' => 'required',
            'cand2' => 'required',
            'cand3' => 'required',
            'cand4' => 'required',
            'cand5' => 'required',
        ]);

        polls::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'cand1' => $request->cand1,
            'cand2' => $request->cand2,
            'cand3' => $request->cand3,
            'cand4' => $request->cand4,
            'cand5' => $request->cand5,
            'cand6' => $request->cand6,
            'cand7' => $request->cand7,
            'cand8' => $request->cand8,
            'started' => 0,
            'closed' => 0,
        ]);

        $this->displayMessages('success','Poll created successfully!');
        return redirect('/admin/polls');
    }

    public function editpoll($id)
    {
        $polls = polls::find($id);
        return view('admin.poll.edit', compact('polls'));
    }

    public function saveEditPoll($id,Request $request)
    {
        $poll = polls::find($id);
        $poll->title = $request->title;
        $poll->description = $request->description; 
        $poll->deadline = $request->deadline;
        $poll->cand1 = $request->cand1;
        $poll->cand2 = $request->cand2;
        $poll->cand3 = $request->cand3;
        $poll->cand4 = $request->cand4;
        $poll->cand5 = $request->cand5;
        $poll->cand6 = $request->cand6;
        $poll->cand7 = $request->cand7;
        $poll->cand8 = $request->cand8;
        $poll->save();
        $this->displayMessages('success','Poll created successfully!');
        return redirect('/admin/polls');
    }

    public function viewPoll($id)
    {
        // $id = 1;
        
        $polls = polls::all()->where('id',$id)->first();
        // dd($polls);
        
        // $polls = \DB::table('polls')
        // ->join('poll_results', 'polls.id', '=', 'poll_results.poll_id')
        // ->select('polls.title','polls.description','polls.cand1','polls.cand2','polls.cand3','polls.cand4',
        // 'polls.cand5','polls.cand6','polls.cand7','polls.cand8','polls.tostart','polls.deadline')
        // ->where('polls.id' , $id)
        // ->get()
        // ->first();
        
        // dd($polls);
        $cand1 = poll_result::all()->where('poll_id',$id)->where('cand1',1);
        $cand2 = poll_result::all()->where('poll_id',$id)->where('cand2',1);
        $cand3 = poll_result::all()->where('poll_id',$id)->where('cand3',1);
        $cand4 = poll_result::all()->where('poll_id',$id)->where('cand4',1);
        $cand5 = poll_result::all()->where('poll_id',$id)->where('cand5',1);
        $cand6 = poll_result::all()->where('poll_id',$id)->where('cand6',1);
        $cand7 = poll_result::all()->where('poll_id',$id)->where('cand7',1);
        $cand8 = poll_result::all()->where('poll_id',$id)->where('cand8',1);
        return view('admin.poll.view', compact('id','polls', 'cand1', 'cand2', 'cand3', 
                                        'cand4', 'cand5', 'cand6', 'cand7', 'cand8'));
    }

    public function startPoll($id)
    {
        $poll = polls::find($id);
        $poll->started = 1;
        $poll->tostart = now();
        $poll->save();
        $this->displayMessages('success','Poll started successfully!');
        return redirect('/admin/polls');
    }

    public function stopPoll($id)
    {
        $poll = polls::find($id);
        if(now() < $poll->deadline){
            $this->displayMessages('error','Cannot stop poll until deadline is over!');
            return redirect('/admin/polls');
        }
        $poll->closed = 1;
        $poll->save();
        $this->displayMessages('success','Poll closed successfully!');
        return redirect('/admin/polls');
    }

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }

    function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false){
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
    
}