<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Snowfire\Beautymail\Beautymail;
use App\Http\Controllers\API\BaseController as BaseController;
use App\announcement;
use App\tutorial;
use App\deu;
use App\event;
use App\event_attendant;
use App\student_event;
use App\poll_result;
use App\studentDetail;
use App\payment;
use App\User;
use App\polls;
use Illuminate\Support\Facades\Hash;
use App\student_due;
use Illuminate\Support\Facades\Route;

class AuthController extends BaseController {
    public function Login(Request $request)
    {
        $tokenRequest = $request->create('/oauth/token', 'POST', $request->all());
        $request->request->add([
            "client_id" => 2,
            "client_secret" => 'HlHRKODi0FZUe5RGHHGM6oCwddBPm8blqY6QyQU6',
            "grant_type" => 'password',
            "scope" => '*',
        ]);
        $response = Route::dispatch($tokenRequest);
        $json = (array) json_decode($response->getContent());
        if (array_key_exists('error', $json)) {
            return $this->generateJSON('error', 401, "Invalid credentials. The user credentials were incorrect.", null);
        } else {
          $student_details =  User::where('email', '=', $request['username'])->get()->first();
          $student_full = \DB::table('student_details')->where('slug',$student_details->slug)->get();
            (array) $json['student_details'] =  $student_details;
            $json['student_full_details'] = $student_full;
            return $this->generateJSON('success', 200, "Login successful.", $json);
        }
    }

    public function savePassword(Request $request)
    {
        if($request->matric == null){
            return $this->generateJSON('error', 200, null, 'matric number required');
        }else{
        try
        {
            $matric = $request->matric;
            $user = User::all()->where('email','=', $matric)->first();
            $user->password =  Hash::make($request->password);
            $user->has_passwordreset = 1;
            $user->save();
            return $this->generateJSON('success', 200, null, "Password Changed Successfully!");
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
    }
    }
    
    public function changePassword(Request $request)
    {
        if($request->matric == null){
            return $this->generateJSON('error', 200, null, 'matric number required');
        }else{
        try
        {
            $matric = $request->matric;
            $user = User::all()->where('email','=', $matric)->first();
            $user->password =  Hash::make($request->password);
            $user->save();
            return $this->generateJSON('success', 200, null, "Password Changed Successfully!");
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
    }
    }

    public function verify($matric)
    {
        $user = User::all()->where("email", "=", $matric)->first();
        if($user != null){
            return $this->generateJSON('success', 200, null, $user);
        }else{
            return $this->generateJSON('error', 500, 'User not Found!', null);
        }
    }

    public function announcements()
    {
        $announcements = announcement::all()->where('viewers','<>',2);
        return $this->generateJSON('success', 200, null, $announcements);
    }

    public function tutorials($level) {
        if ($level == null) {
            return $this->generateJSON('error', 500, "Student level is required.", null);
        }
        $tutorials  =  tutorial::all()->where('level', '=', $level)->where('date', '>=', Now());
            return $this->generateJSON('success', 200, null, $tutorials);
    }

    public function events($id) {
        $events = event::all()->where('completed','=',0)->where('date', '>=', Now());
        
        $allAttend = [];
        
        $eventAdd = event_attendant::all()->where('user_id', $id);
        
        foreach($eventAdd as $attend){
            
            $allAttend[] = $attend->event_id;
        }
        
        // unset($allAttend[0]);
        
        $allAttend = array_values($allAttend);
        
        $response['events'] = $events;
        $response['attend'] = $allAttend;
        return $this->generateJSON('success', 200, null, $response);
    }

    public function dues($id) {
        $allstu = [];
        if ($id == null) {
            return $this->generateJSON('error', 500, "Student id is required.", null);
        }
       $dues = deu::all()->where('viewers', '<>',2);
       $student_due = student_due::all()->where('user_id','=',$id)->where('paid',1);
       foreach($student_due as $stu)
       {
            $allstu[] = $stu->deu_id;
       }
       $alld[] = null;
       $pend[] = null;
       foreach($dues as $due)
       {
           if(in_array($due->id, $allstu))
           {
               $alld[] = $due;
           }
           else{
              
               $pend[] = $due;
           }
       }
        unset($pend[0]);
       $pend = array_values($pend);
        return $this->generateJSON('success', 200, null, $pend);
    }

    public function Profile($slug)
    {
        if ($slug == null) {
            return $this->generateJSON('error', 400, 'Slug is required', null);
        }else {
            try {
                //  $student = studentDetail::all($slug);
                $student = \DB::table('student_details')->where([
                            ["slug", "=", $slug],
                        ])->get();
                $result['details'] = $student;
                return $this->generateJSON('success', 200, null, $student);
            } catch (\Illuminate\Database\QueryException $e) {
                return $this->generateJSON('error', 500, $e->errorInfo[2], null);
            }
        }
    }

    public function saveProfile(Request $request)
    {
        if ($request->slug == null) {
            return $this->generateJSON('error', 400, 'Slug is required', null);
        } else {
        try{
            $student = studentDetail::all()->where('slug',$request->slug)->first();
            // $student = \DB::table('student_details')->where([
            //     ["slug", "=", $request->slug],
            // ])->get();
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->gender = $request->gender;
            $student->level = $request->level;
            $student->save(); 
            return $this->generateJSON('success', 200, null, 'Profile edited successfully');
            // return $this->generateJSON('success', 200, null, $student);
        }catch (\Illuminate\Database\QueryException $e) {
                return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        }
    }
}

    Public function saveDuePayment(Request $request)
    {
        try{
            $payment = new payment();
            $newstudent = new student_due();
            $student_due = student_due::all()
                ->where('user_id',$request->id)
                ->where('deu_id',$request->due_id)->first();
            $payment::create([
                'matric' => $request->matric,
                'reciept' => $request->reference,
                'due_id' => $request->due_id,
                'event_id' => 0,
                'mode' => 'Online',
                'type' => 'Due',
                'paid' => $request->amount,
                'balance' => 0,
                'status' => $request->status,
                'payin_time' => $request->payin_time
            ]);

            if($student_due == null){
                $newstudent::create([
                    'user_id' => $request->id,
                    'deu_id' => $request->due_id,
                    'paid' => 1,
                    'pending' => 0
                ]);
            }else{
                $student_due->paid = 1;
                $student_due->pending = 0;
                $student_due->save();
            }
            
            return $this->generateJSON('success', 200, null, 'Payment made successfully');
        }catch (\Illuminate\Database\QueryException $e) {
            return $this->generateJSON('error', 500, $e->errorInfo[2], null);
        } 
    }

    public function attendFreeEvent(Request $request)
    {
        $check = event_attendant::all()->where('user_id',$request->user_id)
        ->where('event_id',$request->event_id)->first();
        if( $check == null){
            $event_id = $request->event_id;
            $event = event::find($event_id);
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
                'user_id' => $request->user_id,
                'event_id' => $event_id,
                'free' => $free,
                'paid' => $paid
            ]);
     
            $eventattendance::create([
                'event_id' => $event_id,
                'user_id' => $request->user_id,
                'is_attended' => 0
            ]);
            return $this->generateJSON('success', 200, null, 'Event Attended successfully');
        }else{
            return $this->generateJSON('success', 200, null, 'Event already attended!!');
        }
    }

    public function removeFreeEvent(Request $request)
    {
        $event_id = $request->event_id;
        $event = event::find($event_id);
        $eventattendance = event_attendant::all()->where('user_id',$request->user_id)
                        ->where('event_id',$event_id)->first();
        $studentevent = student_event::all()->where('user_id',$request->user_id)
        ->where('event_id',$event_id)->first();
        $eventattendance->delete();
        $studentevent->delete();
        return $this->generateJSON('success', 200, null, 'Event Removed successfully');
    }

    public function adminLogin(Request $request)
    {
        if ($request->username == null || $request->password == null) {
            return $this->generateJSON('error', 400, 'Incomplete Parameters. Kindly check and revert', null);
        }
        else{
            $password = Hash::make($request->password);
            $check = User::all()->where('email',$request->username)->first();
            if($check == null){
                return $this->generateJSON('error', 400, 'Invalid Login details. Kindly check and try again', null);
            }
            else{
                $tokenRequest = $request->create('/oauth/token', 'POST', $request->all());
        
                $request->request->add([
                    "client_id" => 2,
                    "client_secret" => 'HlHRKODi0FZUe5RGHHGM6oCwddBPm8blqY6QyQU6',
                    "grant_type" => 'password',
                    "scope" => '*',
                ]);
                $response = Route::dispatch($tokenRequest);
                $json = (array) json_decode($response->getContent());
                if (array_key_exists('error', $json)) {
                    return $this->generateJSON('error', 401, "Invalid credentials. The user credentials were incorrect.", null);
                } else {
                  return $this->generateJSON('success', 200, null, $json);
               }
            }
        }
    }


    public function attendEvent(Request $request)
    {
        if ($request->slug == null || $request->event_id == null) {
            return $this->generateJSON('error', 400, 'Incomplete Parameters. Kindly check and revert', null);
        } else{
            $user = User::all()->where('slug',$request->slug)->first();
            $eventattendance = event_attendant::all()->where('user_id',$user->id)->where('event_id',$request->event_id)->first();
           if($eventattendance == null)
           {
            return $this->generateJSON('error', 404, null, 'Student not registered for event'); 
           }
           elseif($eventattendance->is_attended == 1)
           {
            return $this->generateJSON('error', 404, null, 'Student already attended event'); 
           } 
           else{
               $eventattendance->is_attended = 1;
               $eventattendance->save();
               return $this->generateJSON('success', 200, null, 'Student attended successfully.'); 
           }
        }
    }
    
    public function allEvents(){
        
        $events = event::all()->where('completed','=',0)->where('date', '>=', Now());
        return $this->generateJSON('success', 200, null, $events);
        
    }

    public function allPolls(){
        $polls = polls::all()->where('closed', '=', 0)->where('started', '=', 1);
        return $this->generateJSON('success', 200, null, $polls);
    }

    public function iVote(Request $request){
        
        $cand1 = $cand2 = $cand3 = $cand4 = $cand5 = $cand6 = $cand7 = $cand8 = 0;
        
        $poll_id = $request->poll_id;
        $student_id = $request->student_id;
        $vote_value = $request->vote_value;
        
        $polls = poll_result::all()
        ->where('student_id', '=', $request->student_id)
        ->where('poll_id', '=', $request->poll_id)
        ->first();

        // if(now() > $polls->deadline){
        //     return $this->generateJSON('error', 400, null , "Vote time limit has elapsed.!"); 
        // }

        if($vote_value == 1){
            $cand1 = 1;
            $cand2 = 0;
            $cand3 = 0;
            $cand4 = 0;
            $cand5 = 0;
            $cand6 = 0;
            $cand7 = 0;
            $cand8 = 0;
        }else if($vote_value == 2){
            $cand1 = 0;
            $cand2 = 1;
            $cand3 = 0;
            $cand4 = 0;
            $cand5 = 0;
            $cand6 = 0;
            $cand7 = 0;
            $cand8 = 0;
        }else if($vote_value == 3){
            $cand1 = 0;
            $cand2 = 0;
            $cand3 = 1;
            $cand4 = 0;
            $cand5 = 0;
            $cand6 = 0;
            $cand7 = 0;
            $cand8 = 0;
        }else if($vote_value == 4){
            $cand1 = 0;
            $cand2 = 0;
            $cand3 = 0;
            $cand4 = 1;
            $cand5 = 0;
            $cand6 = 0;
            $cand7 = 0;
            $cand8 = 0;
        }else if($vote_value == 5){
            $cand1 = 0;
            $cand2 = 0;
            $cand3 = 0;
            $cand4 = 0;
            $cand5 = 1;
            $cand6 = 0;
            $cand7 = 0;
            $cand8 = 0;
        }
        else if($vote_value == 6){
            $cand1 = 0;
            $cand2 = 0;
            $cand3 = 0;
            $cand4 = 0;
            $cand5 = 0;
            $cand6 = 1;
            $cand7 = 0;
            $cand8 = 0;
        }else if($vote_value == 7){
            $cand1 = 0;
            $cand2 = 0;
            $cand3 = 0;
            $cand4 = 0;
            $cand5 = 0;
            $cand6 = 0;
            $cand7 = 1;
            $cand8 = 0;
        }else if($vote_value == 8){
            $cand1 = 0;
            $cand2 = 0;
            $cand3 = 0;
            $cand4 = 0;
            $cand5 = 0;
            $cand6 = 0;
            $cand7 = 0;
            $cand8 = 1;
        }
        
        if($polls == null){
            poll_result::create([
                'student_id' => $student_id,
                'poll_id' => $poll_id,
                'cand1' => $cand1,
                'cand2' => $cand2,
                'cand3' => $cand3,
                'cand4' => $cand4,
                'cand5' => $cand5,
                'cand6' => $cand6,
                'cand7' => $cand7,
                'cand8' => $cand8,
                ]);
                
            return $this->generateJSON('success', 200, null , "Vote Placed successfully");
            
            // return $this->generateJSON('success', 200, null , $request->vote_value);
        }else{
          return $this->generateJSON('error', 400, null , "Vote already casted!"); 
        }
    }

}
