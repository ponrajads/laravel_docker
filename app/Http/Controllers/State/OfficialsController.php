<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Mail\StateVerifyMail;
use App\Mail\StateRejectMail;
use Illuminate\Support\Facades\Mail;

class OfficialsController extends Controller
{
    public function allOfficials(){
        $user = \Auth::user();
        $statedetails = \App\Models\StateDetails::where('user_id', $user->id)->first();
        $users = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("official_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('official_details.association', $statedetails->association_id)
    ->where('users.role', 6)
    ->where('users.isactive',1)
    ->select('users.*', 'official_details.*', 'users.status as userstatus')
    ->get();
        return view('state.officials.allofficials', compact('users'));
    }

    public function approvedOfficials(){
        $user = \Auth::user();
        $statedetails = \App\Models\StateDetails::where('user_id', $user->id)->first();
        $users = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("official_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('official_details.association', $statedetails->association_id)
    ->where('users.role', 6)
    ->where('users.stateverify', 1)
    ->where('users.isactive',1)
    ->select('users.*', 'official_details.*', 'users.status as userstatus')
    ->get();
        return view('state.officials.approvedofficials', compact('users'));
    }
    public function pendingOfficials(){
        $user = \Auth::user();
        $statedetails = \App\Models\StateDetails::where('user_id', $user->id)->first();
        $users = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("official_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('official_details.association', $statedetails->association_id)
    ->where('users.role', 6)
    ->where('users.stateverify', 0)
    ->where('users.isactive',1)
    ->select('users.*', 'official_details.*', 'users.status as userstatus')
    ->get();
        return view('state.officials.pendingofficials', compact('users'));
    }

    public function rejectedOfficials(){
        $user = \Auth::user();
        $statedetails = \App\Models\StateDetails::where('user_id', $user->id)->first();
        $users = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("official_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('official_details.association', $statedetails->association_id)
    ->where('users.role', 6)
    ->where('users.stateverify', 2)
    ->where('users.isactive',1)
    ->select('users.*', 'official_details.*', 'users.status as userstatus')
    ->get();
        return view('state.officials.rejectedofficials', compact('users'));
    }

    public function blockedOfficials(){
        $user = \Auth::user();
        $statedetails = \App\Models\StateDetails::where('user_id', $user->id)->first();
        $users = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("official_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('official_details.association', $statedetails->association_id)
    ->where('users.role', 6)
    ->where('users.stateverify', 1)
    ->where('users.isactive',1)
    ->select('users.*', 'official_details.*', 'users.status as userstatus')
    ->get();
        return view('state.officials.blockedofficials', compact('users'));
    }

    
    public function officialDetails($id){
        $user = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
        ->where('users.role', 6)
        ->where('users.id', $id)
        ->select('users.*', 'official_details.*','users.status as userstatus')
        ->first();
        return view('state.officials.officialdetails', compact('user'));
    }
    public function approveOfficial($id){
        try {
            \DB::beginTransaction();
            $user = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
                ->where('users.role', 6)
                ->where('users.id', $id)
                ->select('users.*', 'official_details.*','users.email')
                ->first();

                
    
            if (!$user) {
                // User not found
                return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
            }


    
            // $seq = \App\Models\Users::max('sequence') + 1;
    
            // if ($user->gender == 'Male') {
            //     $gcode = 'M';
            // } else {
            //     $gcode = 'F';
            // }
            // if($user->username != ''){
            //     if ($user->userstatus != 1) {
            // $users= \App\Models\User::find($id);
            // $users->status = 1;
            // $association = \App\Models\MAssociation::find($user->association);
            // $uid = "BFI" . $association->statecode . $gcode . "P" . $seq;
            // \Log::info($uid);
            // $users->username = $uid;
            // $users->sequence = $seq;
            // $users->approved_by = \Auth::user()->id;
            // $users->save();

            // $details = UserDetails::where('user_id', $id)->first();
            // $details->status = 1;
            // $details->save();
            
            if ($user->stateverify == 0) {
            $users= \App\Models\User::find($id);
            $users->stateverify = 1;
            $users->save();
            
            \DB::commit();

                }
            if ($users) {
                $mail = new StateVerifyMail();
                Mail::to($user->email)->send($mail);
                return response()->json(['status' => 'success', 'message' => 'Player Verified Successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
            }
            

            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
            
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            // Handle exceptions, log them, etc.
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
       
    }

    public function rejectOfficial($id,$reason){
        
        $user = \App\Models\User::join('official_details', 'users.id', '=', 'official_details.user_id')
            ->where('users.role', 6)
            ->where('users.id', $id)
            ->select('users.*', 'official_details.*','users.email')
            ->first();

        if (!$user) {
            // User not found
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        $users= \App\Models\User::find($id);
        $users->stateverify = 2;
        $users->reason = $reason;
        $users->rejected_by = \Auth::user()->id;
        $users->save();
        if ($users) {
            $mail = new StateRejectMail($reason);
                Mail::to($user->email)->send($mail);
            return response()->json(['status' => 'success', 'message' => 'Player Rejected Successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
        }

    }
    public function blockCoach($id){
        $user = \App\Models\User::find($id);
        $user->stateverify = 3;
        $user->save();
        if($user){
            return response()->json(['status' => 'success', 'message' => 'Player Blocked Successfully']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
        }
    }
}
