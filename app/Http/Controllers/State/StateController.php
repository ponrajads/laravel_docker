<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StateController extends Controller
{
    public function dashboard(){
        $user = \Auth::user();
        $statedetails = \App\Models\StateDetails::where('user_id', $user->id)->first();
        $today = date('Y-m-d');
        $tournaments = array();
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        $users = \App\Models\User::join('users_details', 'users.id', '=', 'users_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("users_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('users_details.association', $statedetails->association_id)
    ->where('users.role', 2)
    ->select('users.*', 'users_details.*', 'users.status as userstatus')
    ->get();
    $playercount = $users->count();

    $coachusers = \App\Models\User::join('coach_details', 'users.id', '=', 'coach_details.user_id')
    ->join('massociations', function ($join) {
        $join->on(DB::raw('CAST("coach_details"."association" AS bigint)'), '=', 'massociations.id');
    })
    ->where('coach_details.association', $statedetails->association_id)
    ->where('users.role', 3)
    ->where('users.stateverify', 1)
    ->select('users.*', 'coach_details.*', 'users.status as userstatus')
    ->get();

    $coachcount = $coachusers->count();


    $officialcount = 0;
        return view('state.dashboard', compact('users', 'playercount', 'coachcount', 'officialcount','tournaments','state_id'));
    }
}
