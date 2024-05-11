<?php

namespace App\Http\Controllers\Player;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use Image;
use App\Services\IdCardGenerator;
use App\Http\Controllers\Controller;
use ZanySoft\LaravelPDF\PDF;


class PlayerController extends Controller
{
    protected $idCardGenerator;

    public function __construct(IdCardGenerator $idCardGenerator)
    {
        $this->idCardGenerator = $idCardGenerator;
    }
    public function idcard(){
        $user = auth()->user();
        $user->load('details'); // Eager load the details relationship
        $udetails = UserDetails::where('user_id', $user->id)->first();

        // Generate ID card
        $idCardPaths = $this->idCardGenerator->generateIdCard($user);

        //dd($idCardPaths);

        return view('player.idcard', compact('user', 'udetails', 'idCardPaths'));
    }
    public function generateIdCardPdf()
{
    $user = auth()->user();
    $user->load('details');
    $udetails = UserDetails::where('user_id', $user->id)->first();

    // Generate ID card
    $idCardPaths = $this->idCardGenerator->generateIdCard($user);

    // View name for the PDF
    $viewName = 'player.idcard_pdf';

    // Data to pass to the view
    $data = compact('user', 'udetails', 'idCardPaths');
    $pdf = new PDF();
    // Generate PDF
    $pdf->loadView($viewName, $data);

    // Set the PDF name for download
    $pdfName = 'idcard_' . $user->id . '_' . time() . '.pdf';

    // Save the PDF to a file
    //$pdf->save(storage_path('pdf/' . $pdfName));
    return $pdf->stream($pdfName);
    // Return a download response
    //return response()->download(storage_path('pdf/' . $pdfName))->deleteFileAfterSend(true);
}
    public function dashboard(){
        $user = auth()->user();
        $user->load('details'); // Eager load the details relationship
            return view('player.dashboard', compact('user'));

    }
    public function PlayerProfile(){
        $user = auth()->user();
        $id=$user->id;
        $users = \App\Models\User::join('users_details', 'users.id', '=', 'users_details.user_id')->where('users.id', $id)
            ->where('users.role', 2)
            ->select('users.*', 'users_details.*','users.status as userstatus')
            ->get();
        return view('player.playerprofile', compact('user','users'));
    }
    public function ShowEditPage()
    {
        $user = auth()->user();
        $id=$user->id;
        $users = \App\Models\User::join('users_details', 'users.id', '=', 'users_details.user_id')->where('users.id', $id)
            ->where('users.role', 2)
            ->select('users.*', 'users_details.*','users.status as userstatus')
            ->get();
        return view('player.playeredit', compact('user','users'));
    }
    public function UpdatePlayerDetails(Request $request)
    {
        $user = auth()->user();
        $id = $request->hidden_user_id;
        $udetails = UserDetails::where('user_id', $id)->first();
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $mobile = $request->input('mobile');
        $father_name = $request->input('father_name');
        $father_mobile = $request->input('father_mobile');
        $aadhar = $request->input('aadhar');
        $blood_group = $request->input('blood_group');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $association = $request->input('association');
        $address = $request->input('address');
        $pincode = $request->input('pincode');
        $caddress = $request->input('caddress');
        $cpincode = $request->input('cpincode');
        $bank_name = $request->input('bank_name');
        $bank_branch = $request->input('bank_branch');
        $bank_account = $request->input('bank_account');
        $bank_ifsc = $request->input('bank_ifsc');
        $photo = $request->file('photo');
        $dob_proof = $request->file('dob_proof');
        $address_proof = $request->file('address_proof');

        $arraydata = [
            'user_id' => $id,
            'mobile' => $mobile,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dob' => $dob,
            'gender' => $gender,
            'father_name' => $father_name,
            'father_mobile' => $father_mobile,
            'aadhar' => $aadhar,
            'blood_group' => $blood_group,
            'height' => $height,
            'weight' => $weight,
            'association' => $association,
            'address' => $address,
            'pincode' => $pincode,
            'caddress' => $caddress,
            'cpincode' => $cpincode,
            'bank_name' => $bank_name,
            'bank_branch' => $bank_branch,
            'bank_account' => $bank_account,
            'bank_ifsc' => $bank_ifsc
            ];
            if ($udetails) {
                if ($photo) {
                    $arraydata['photo'] = $this->playeruploadFileIfAvailable($photo, 'IRFU/photo', $udetails->photo);
                }

                if ($dob_proof) {
                    $arraydata['dob_proof'] = $this->playeruploadFileIfAvailable($dob_proof, 'IRFU/dob_proof', $udetails->dob_proof);
                }
                if ($address_proof) {
                    $arraydata['address_proof'] = $this->playeruploadFileIfAvailable($address_proof, 'IRFU/address_proof', $udetails->address_proof);
                }
                $udetails->fill($arraydata);
                $udetails->save();
                return redirect('player/profile' )->with('success', 'Player details have been updated.');
                } else {
                    return redirect('player/profile')->with('error', 'No changes made or failed to update.');
                }
            }

}
