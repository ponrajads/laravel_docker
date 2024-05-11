<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MState;
use App\Models\Tournaments;
use App\Models\TourAgeCategory;
use App\Models\MAgeCategory;
use Illuminate\Support\Facades\Log;
use App\Models\TournamentsTeam;
use App\Models\Users;
use App\Models\CoachDetails;
use App\Models\TourCoaches;
use App\Models\TourEntries;
use App\Models\MAssociation;
use DB;
use ZanySoft\LaravelPDF\PDF;
use Storage;
use Barryvdh\DomPDF\Facade as DOMPDF;
use Illuminate\Support\Facades\View;
use App\Jobs\GeneratePdfJob;

class TournamentController extends Controller
{
    public function upcomingTournaments(){

        $today = date('Y-m-d');
        $tournaments = Tournaments::where('tournament_start_date', '>', $today)->get();
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        return view('state.tournaments.upcoming',compact('tournaments','state_id'));
    }
	public function pastTournaments(){
        $user = auth()->user()->id;
        $today = date('Y-m-d');
        $tournaments = TourEntries::join('tournaments', 'tournaments.id', '=', 'tournament_entries.tournament_id')
        ->where('tournaments.tournament_start_date', '<', $today)
        ->where('tournament_entries.state_id', $user)->get();
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        return view('state.tournaments.completed',compact('tournaments','state_id'));
    }
    public function registeredTournaments(){
        $user = auth()->user()->id;
        $today = date('Y-m-d');
        $tournaments = TourEntries::join('tournaments', 'tournaments.id', '=', 'tournament_entries.tournament_id')
        ->where('tournaments.tournament_start_date', '>', $today)
        ->where('tournament_entries.state_id', $user)->get();
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        return view('state.tournaments.completed',compact('tournaments','state_id'));
    }
    public function registerTournament($id){
        $tournament = Tournaments::find($id);
        return view('state.tournaments.registertour',compact('tournament'));
    }
    public function addCoach($tid){
        $tournament = Tournaments::find($tid);
        $coach = TourCoaches::where('tournament_id',$tid)->get();
        return view('state.tournaments.addcoach',compact('tournament','coach','tid'));
    }
    public function coachAdd($tid){
        $tournament = Tournaments::find($tid);
        return view('state.tournaments.coachadd',compact('tournament','tid'));
    }
    public function summary($tid){
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        $tournament = Tournaments::find($tid);
        $cat = TourAgeCategory::join('age_category','age_category.id','tournament_age_category.age_category')->where('tournament_id',$tid)->get();
        $players = TournamentsTeam::join('users_details', 'users_details.user_id', '=', 'tournament_teams.user_id')
        ->join('users', 'users.id', '=', 'users_details.user_id')
        ->where('tournament_id', $tid)->where('state_id', $state_id)
        ->select('users.username','users.name','users_details.photo','users_details.user_id','users_details.gender','users_details.email','users_details.mobile','users_details.dob','tournament_teams.id','tournament_teams.jersey_no')->get();
        
        $coach = TourCoaches::where('tournament_id',$tid)->where('state_id', $state_id)->get();
        return view('state.tournaments.summary',compact('tournament','tid','players','coach','cat'));
    }
    public function sendEntries($tid){
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        $tournament = Tournaments::find($tid);
        $cat = TourAgeCategory::join('age_category','age_category.id','tournament_age_category.age_category')->where('tournament_id',$tid)->get();
        $addedcoach = TourCoaches::where('tournament_id',$tid)->where('state_id', $state_id)->count();
        return view('state.tournaments.sendentries',compact('tournament','tid','cat','addedcoach'));
    }
    public function entrySuccess($tid){
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        $tournament = Tournaments::find($tid);
        $pdfName = TourEntries::where('tournament_id',$tid)->where('state_id', $state_id)->first()->acknowledge;
        return view('state.tournaments.entrysuccess',compact('tournament','tid','pdfName'));
    }
    public function submitEntries($tid)
{
    $state_id = \App\Models\StateDetails::where('user_id', auth()->user()->id)->first()->association_id;
    $statename = MAssociation::where('id', $state_id)->select('name')
        ->first();
    $tournament = Tournaments::find($tid);
    if($tid == 7){
        if($state_id == 13 || $state_id == 21 || $state_id == 33 || $state_id == 19 || $state_id == 7){
    $cat = TourAgeCategory::join('age_category', 'age_category.id', 'tournament_age_category.age_category')->where('tournament_id', $tid)->where('age_category', 6)->get();
    }else{
        $cat = TourAgeCategory::join('age_category', 'age_category.id', 'tournament_age_category.age_category')->where('tournament_id', $tid)->get();
    }
}else{
    $cat = TourAgeCategory::join('age_category', 'age_category.id', 'tournament_age_category.age_category')->where('tournament_id', $tid)->get();
}
    $coach = TourCoaches::where('tournament_id',$tid)->where('state_id', $state_id)->get();

    // Check if the entry already exists
    $existingEntry = TourEntries::where('tournament_id', $tid)
        ->where('state_id', $state_id)
        ->first();

    if ($existingEntry) {
        // Handle the case where the entry already exists, such as showing an error message
        return redirect()->route('state/tournament/entrysuccess', ['tid' => $tid])->with('error', 'Tour entry already Submitted.');
    }

    $viewName = 'state.tournaments.acknowledge_pdf';
    
    // Data to pass to the view
    $data = compact('tournament', 'cat', 'tid', 'state_id', 'coach', 'statename');

    // Generate PDF
$pdf = app('dompdf.wrapper')->setPaper('a4', 'portrait')->loadView($viewName, $data);

// Set the PDF name for download
$pdfName = 'acknowledge_' . $state_id . '_' . $tid . '_' . time() . '.pdf';

// Save PDF to S3
$s3Path = 'BFI/acknowledge/' . $pdfName;
Storage::disk('s3')->put($s3Path, $pdf->output());

    $entries = new TourEntries();
    $entries->tournament_id = $tid;
    $entries->state_id = $state_id;
    $entries->acknowledge = $pdfName;
    $entries->save();
    return redirect()->route('state/tournament/entrysuccess', ['tid' => $tid])->with('success', 'Tour entry submitted successfully');
    // return view('state.tournaments.entrysuccess', compact('tournament', 'tid', 'pdfName'))->with('success', 'Tour entry submitted successfully');
}

// public function submitEntries($tid)
// {
//     $state_id = \App\Models\StateDetails::where('user_id', auth()->user()->id)->first()->association_id;

//     // Check if the entry already exists
//     $existingEntry = TourEntries::where('tournament_id', $tid)
//         ->where('state_id', $state_id)
//         ->first();

//     if ($existingEntry) {
//         // Handle the case where the entry already exists, such as showing an error message
//         return redirect()->route('state/tournament/entrysuccess', ['tid' => $tid])->with('error', 'Tour entry already Submitted.');
//     }

//     // PDF generation logic here
//         // You can reuse the existing PDF generation logic from your original function
//         $view = view('state.tournaments.entry_pdf', [
//             'tournament' => Tournaments::find($tid),
//             'cat' => TourAgeCategory::join('age_category', 'age_category.id', 'tournament_age_category.age_category')
//                 ->where('tournament_id', $tid)
//                 ->get(),
//             'tid' => $tid,
//             'state_id' => $state_id,
//             'coach' => TourCoaches::where('tournament_id', $tid)
//                 ->where('state_id', $state_id)
//                 ->get(),
//             'statename' => MAssociation::where('id', $state_id)->select('name')->first(),
//         ])->render();

//         $pdf = new TCPDF();
//         $pdf->SetMargins(10, 10, 10);
//         $pdf->AddPage();
//         $pdf->writeHTML($view, true, false, true, false, '');

//         // Set the PDF name for download
//         $pdfName = 'acknowledge_' . $state_id . '_' . $tid . '_' . time() . '.pdf';
//         $s3Path = 'BFI/acknowledge/' . $pdfName;

//         // Save PDF to S3
//         Storage::disk('s3')->put($s3Path, $pdf->output());

//         // Update the TourEntries record with the generated PDF name
//         $entries = new TourEntries();
//         $entries->tournament_id = $this->tid;
//         $entries->state_id = $this->state_id;
//         $entries->acknowledge = $pdfName;
//         $entries->save();

//     // Redirect to the success page
//     return redirect()->route('state/tournament/entrysuccess', ['tid' => $tid])->with('success', 'Tour entry submitted successfully');
// }

    public function updateJerseyNo(Request $request){
        $id = $request->id;
        $data = TournamentsTeam::find($id);
        $data->jersey_no = $request->jersey_no;
        $data->save();

        return response()->json(['message' => 'Jersey number updated successfully']);
    }
    public function getCoachData(Request $request){
        $uid = $request->data;
        $details = Users::join('coach_details','coach_details.user_id','users.id')->where('username',$uid)->first();
        return response()->json(['details' => $details]);
    }
    public function registerTeam($tid,$cid){
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        $tournament = Tournaments::find($tid);
        $agecat = TourAgeCategory::where('tournament_id',$tid)->where('age_category',$cid)->first();
        $team = TournamentsTeam::join('users_details', 'users_details.user_id', '=', 'tournament_teams.user_id')
        ->join('users', 'users.id', '=', 'users_details.user_id')
        ->where('tournament_id', $tid)->where('age_category', $cid)->where('state_id', $state_id)->where('users.status',1)
        ->select('users.username','users.name','users_details.photo','users_details.user_id','tournament_teams.id')->get();
        
        return view('state.tournaments.registerteam',compact('tournament','agecat','cid', 'team'));
    }
    public function registerCoach($tid,$cid){
        $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;
        $tournament = Tournaments::find($tid);
        $agecat = TourAgeCategory::where('tournament_id',$tid)->where('age_category',$cid)->first();
        $team = TourCoaches::join('coach_details', 'coach_details.user_id', '=', 'tournament_coaches.user_id')
        ->join('users', 'users.id', '=', 'coach_details.user_id')
        ->where('tournament_id', $tid)->where('state_id', $state_id)
        ->where('age_category', $cid)
		->where('users.status',1)
        ->where('coach_details.first_name','!=',null)
        ->select('users.username','users.name','coach_details.photo','coach_details.user_id','tournament_coaches.id')->get();

        
        
        return view('state.tournaments.registercoach',compact('tournament','agecat','cid', 'team'));
    }
    public function saveSelectedPlayers(Request $request)
{
    $selectedPlayers = $request->input('selected_players');
     \Log::info($selectedPlayers);
    // Add logic to save selected players in the database
    // ...

    return redirect()->back()->with('success', 'Players saved successfully');
}
public function addPlayer(Request $request)
{
    \Log::info($request->all());

    $player_id = $request->player_id;
    $tournament_id = $request->tournament_id;
    $category_id = $request->age_category_id;
    $state_id = $request->state_id;

    // Check if the record already exists
    $existingRecord = TournamentsTeam::where('user_id', $player_id)
        ->where('tournament_id', $tournament_id)
        ->where('age_category', $category_id)
        ->where('state_id', $state_id)
        ->first();

    if ($existingRecord) {
        // Record already exists, you can handle this situation as needed
        return response()->json(['message' => 'Player already added to the team', 'team' => null]);
    }

    // Record doesn't exist, proceed to save
    $addPlayer = new TournamentsTeam();
    $addPlayer->user_id = $player_id;
    $addPlayer->tournament_id = $tournament_id;
    $addPlayer->age_category = $category_id;
    $addPlayer->state_id = $state_id;
    $addPlayer->status = 1;
    $addPlayer->save();

    // Fetch the updated team list
    $team = TournamentsTeam::join('users_details', 'users_details.user_id', '=', 'tournament_teams.user_id')
        ->join('users', 'users.id', '=', 'users_details.user_id')
        ->where('tournament_id', $tournament_id)->where('age_category', $category_id)->where('state_id', $state_id)
		->where('users.status',1)
        ->select('users.username','users.name','users_details.photo','users_details.user_id','tournament_teams.id')->get();

    $count = TourAgeCategory::where('tournament_id',$tournament_id)->where('age_category',$category_id)->select('players_count')->first();

    return response()->json(['message' => 'Player added successfully','team' => $team, 'count' => $count->players_count]);
}
public function addCoaches(Request $request)
{
    \Log::info($request->all());

    $player_id = $request->player_id;
    $tournament_id = $request->tournament_id;
    $category_id = $request->age_category_id;
    $state_id = $request->state_id;

    // Check if the record already exists
    $existingRecord = TourCoaches::where('user_id', $player_id)
        ->where('tournament_id', $tournament_id)
        ->where('state_id', $state_id)
        ->first();

    if ($existingRecord) {
        // Record already exists, you can handle this situation as needed
        return response()->json(['message' => 'Coach already added to the team', 'team' => null]);
    }

    // Record doesn't exist, proceed to save
    $addPlayer = new TourCoaches();
    $addPlayer->user_id = $player_id;
    $addPlayer->tournament_id = $tournament_id;
    $addPlayer->age_category = $category_id;
    $addPlayer->state_id = $state_id;
    $addPlayer->status = 1;
    $addPlayer->save();

    // Fetch the updated team list
    $team = TourCoaches::join('coach_details', 'coach_details.user_id', '=', 'tournament_coaches.user_id')
        ->join('users', 'users.id', '=', 'coach_details.user_id')
        ->where('tournament_id', $tournament_id)->where('state_id', $state_id)
        ->where('coach_details.first_name','!=',null)
        ->where('age_category',$category_id)
		->where('users.status',1)
        ->select('users.username','users.name','coach_details.photo','coach_details.user_id','tournament_coaches.id')->get();

    $count = TourAgeCategory::where('tournament_id',$tournament_id)->where('age_category',$category_id)->select('officials_count')->first();

    return response()->json(['message' => 'Coach added successfully','team' => $team, 'count' => $count->officials_count]);
}
public function removePlayer(Request $request)
{
    \Log::info($request->all());

    $team_id = $request->team_id;
    $tournament_id = $request->tournament_id;
    $category_id = $request->age_category_id;
    $state_id = $request->state_id;

    // Find the model instance by ID
    $team = TournamentsTeam::find($team_id);

    // Check if the model instance exists
    if ($team) {
        // Delete the model instance
        $team->delete();
    }

    // Fetch the updated team list
    $updatedTeam = TournamentsTeam::join('users_details', 'users_details.user_id', '=', 'tournament_teams.user_id')
        ->join('users', 'users.id', '=', 'users_details.user_id')
        ->where('tournament_id', $tournament_id)->where('state_id', $state_id)
		->where('users.status',1)
        ->select('users.username','users.name','users_details.photo','users_details.user_id','tournament_teams.id')->get();

        $count = TourAgeCategory::where('tournament_id',$tournament_id)->where('age_category',$category_id)->select('players_count')->first();

    return response()->json(['message' => 'Player removed successfully', 'team' => $updatedTeam, 'count' => $count->players_count]);
}
public function removeCoaches(Request $request)
{
    \Log::info($request->all());

    $team_id = $request->team_id;
    $tournament_id = $request->tournament_id;
    $category_id = $request->age_category_id;
    $state_id = $request->state_id;

    // Find the model instance by ID
    $team = TourCoaches::find($team_id);

    // Check if the model instance exists
    if ($team) {
        // Delete the model instance
        $team->delete();
    }

    // Fetch the updated team list
    $updatedTeam = TourCoaches::join('coach_details', 'coach_details.user_id', '=', 'tournament_coaches.user_id')
        ->join('users', 'users.id', '=', 'coach_details.user_id')
        ->where('tournament_id', $tournament_id)->where('age_category', $category_id)->where('state_id', $state_id)
        ->where('coach_details.first_name','!=',null)
        ->where('age_category',$category_id)
		->where('users.status',1)
        ->select('users.username','users.name','coach_details.photo','coach_details.user_id','tournament_coaches.id')->get();

        $count = TourAgeCategory::where('tournament_id',$tournament_id)->where('age_category',$category_id)->select('officials_count')->first();

    return response()->json(['message' => 'Coach removed successfully', 'team' => $updatedTeam, 'count' => $count->officials_count]);
}
  public function saveCoach(Request $request){
    $tid = $request->tid;
    $uid = $request->uid;
    $name = $request->name;
    $email = $request->email;
    $phone = $request->phone;
    $gender = $request->gender;
    $state_id = \App\Models\StateDetails::where('user_id',auth()->user()->id)->first()->association_id;

    $coach = new TourCoaches();
    $coach->tournament_id = $tid;
    $coach->username = $uid;
    $coach->name = $name;
    $coach->email = $email;
    $coach->phone = $phone;
    $coach->gender = $gender;
    $coach->state_id = $state_id;
    $coach->save();
    return redirect()->route('state/tournament/addcoach',$tid)->with('success', 'Coach added successfully');
    
  }
  public function coachRemove($tid,$id){
    $coach = TourCoaches::find($id);
    $coach->delete();
    return redirect()->route('state/tournament/addcoach',$tid)->with('success', 'Coach removed successfully');
  }
}
