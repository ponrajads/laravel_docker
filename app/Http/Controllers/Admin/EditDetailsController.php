<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\ClubDetails;
use App\Models\UserDetails;
use App\Models\CoachDetails;
use Illuminate\Http\Request;
use App\Models\OfficialDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditDetailsController extends Controller
{
    public function ShowEditPage($id)
{
        $users = \App\Models\User::join('users_details', 'users.id', '=', 'users_details.user_id')->where('users.id', $id)
            ->where('users.role', 2)
            ->where('users.isactive',1)
            ->select('users.*', 'users_details.*','users.status as userstatus')
            ->get();
    return view('admin.players.editplayer', compact('users','id'));
}
private function uploadFileIfAvailable($file, $folder)
{
    return $file ? $this->uploadFile($file, $folder) : null;
}
private function uploadFile($file, $folder){
$ext = $file->getClientOriginalExtension();
$filename = "player_" . rand(11111, 99999) . "_" . time() . '.' . $ext;

$s3Path = $folder . '/' . $filename;
\Storage::disk('s3')->put($s3Path, file_get_contents($file));

return $filename;
}
public function UpdatePlayerDetails(Request $request)
{
    $user = auth()->user();
    $id = $request->hidden_userUID;
    $udetails = UserDetails::where('user_id', $id)->first();

    $first_name = request('first_name');
    $last_name = request('last_name');
    $dob = request('dob');
    $gender = request('gender');
    $email = request('email');
    $mobile = request('mobile');
    $father_name = request('father_name');
    $father_mobile = request('father_mobile');
    $aadhar = request('aadhar');
    $blood_group = request('blood_group');
    $height = request('height');
    $weight = request('weight');
    $association = request('association');
    $address = request('address');
    $pincode = request('pincode');
    $caddress = request('caddress');
    $cpincode = request('cpincode');
    $bank_name = request('bank_name');
    $bank_branch = request('bank_branch');
    $bank_account = request('bank_account');
    $bank_ifsc = request('bank_ifsc');
    $photo = $request->file('photo');
    $dob_proof = $request->file('dob_proof');
    $address_proof = $request->file('address_proof');

    $arraydata = [
        'user_id' => $id,
        'email' => $email,
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
        'bank_ifsc' => $bank_ifsc,
    ];

    if ($udetails) {
        try {
            if ($request->hasFile('photo') && $photo !== null) {
                $arraydata['photo'] = $this->uploadFileIfAvailable($photo, 'IRFU/photo');
            }
            if ($request->hasFile('dob_proof') && $dob_proof !== null) {
                $arraydata['dob_proof'] = $this->uploadFileIfAvailable($dob_proof, 'IRFU/dob_proof', $udetails->dob_proof);
            }
            if ($request->hasFile('address_proof') && $address_proof !== null) {
                $arraydata['address_proof'] = $this->uploadFileIfAvailable($address_proof, 'IRFU/address_proof', $udetails->address_proof);
            }
            $udetails->fill($arraydata);
            $udetails->save();

            return redirect('admin/player/'.$id)->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating player details: '.$e->getMessage());

            // Redirect with an error message
            return redirect('admin/player/'.$id)->with('error', 'Error updating player details. Please try again.');
        }
    } else {
        return redirect('admin/player/'.$id)->with('error', 'User details not found.');
    }
}
    public function ShowEditPageCoach($id)
    {
        $user = \App\Models\User::join('coach_details', 'users.id', '=', 'coach_details.user_id')->where('users.id', $id)
            ->where('users.role', 3)
            ->where('users.isactive',1)
            ->select('users.*', 'coach_details.*','users.status as userstatus')
            ->get();

        return view('admin.coaches.editcoach', compact('user','id'));
    }
    private function coachuploadFileIfAvailable($file, $folder,$existingFilename)
{
    return $file ? $this->coachuploadFile($file, $folder, $existingFilename) : '';
}
private function coachuploadFile($file, $folder,$existingFilename){
$ext = $file->getClientOriginalExtension();
$filename = $existingFilename ?:"coach_" . rand(11111, 99999) . "_" . time() . '.' . $ext;

$s3Path = $folder . '/' . $filename;
\Storage::disk('s3')->put($s3Path, file_get_contents($file));

return $filename;
}
    public function UpdateCoachDetails(request $request)
    {
        $user = auth()->user();
        $id = $request->hidden_user_id;
        $udetails = CoachDetails::where('user_id', $id)->first();

        $first_name = request('first_name');
        $last_name = request('last_name');
        $dob = request ('dob');
        $gender= request ('gender');
        $email= request ('email');
        $mobile= request ('mobile');
        $father_name = request ('father_name');
        $aadhar = request ('aadhar');
        $pan = request ('pan');
        $blood_group= request ('blood_group');
        $state= request ('state');
        $district= request ('district');
        $association= request ('association');
        $address1= request ('address1');
        $address2= request ('address2');
        $city= request ('city');
        $pincode= request ('pincode');
        $caddress1= request ('caddress1');
        $caddress2= request ('caddress2');
        $ccity= request ('ccity');
        $cstate= request ('cstate');
        $cdistrict= request ('cdistrict');
        $cpincode= request ('cpincode');
        $bank_name= request ('bank_name');
        $bank_branch= request ('bank_branch');
        $account_no= request ('account_no');
        $ifsc_code = request ('ifsc_code');
        $photo= request ('photo');
        $dob_proof= request ('dob_proof');
        $address_proof = request ('address_proof');


       $arraydata=[
        'user_id' => $id,
        'email' => $email,
        'mobile' => $mobile,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'dob' => $dob,
        'gender'=> $gender,
        'father_name' => $father_name,
        'aadhar' => $aadhar,
        'blood_group'=> $blood_group,
        'pan'=> $pan,
        'association'=> $association,
        'state'=> $state,
        'district'=> $district,
        'address1'=> $address1,
        'address2'=> $address2,
        'city'=> $city,
        'pincode'=> $pincode,
        'caddress1'=> $caddress1,
        'caddress2'=> $caddress2,
        'ccity'=> $ccity,
        'cstate'=> $cstate,
        'cdistrict'=> $cdistrict,
        'cpincode'=> $cpincode,
        'bank_name'=> $bank_name,
        'bank_branch'=> $bank_branch,
        'account_no'=> $account_no,
        'ifsc_code' => $ifsc_code
        ];
        if ($udetails) {
            if ($photo) {
                $arraydata['photo'] = $this->coachuploadFileIfAvailable($photo, 'IRFU/photo', $udetails->photo);
            }
            if ($dob_proof) {
                $arraydata['dob_proof'] = $this->coachuploadFileIfAvailable($dob_proof, 'IRFU/dob_proof', $udetails->dob_proof);
            }
            if ($address_proof) {
                $arraydata['address_proof'] = $this->coachuploadFileIfAvailable($address_proof, 'IRFU/address_proof', $udetails->address_proof);
            }

            $udetails->fill($arraydata);
            $udetails->save();
        } else {
            return redirect('admin/coach/'.$id)->with('error', 'User details not found.');
        }

        return redirect('admin/coach/'.$id)->with('success', 'Profile updated successfully!');
    }
    public function ShowEditPageClub($id)
    {

        $user = \App\Models\User::join('club_details', 'users.id', '=', 'club_details.user_id')->where('users.id', $id)
            ->where('users.role', 7)
            ->where('users.isactive',1)
            ->select('users.*', 'club_details.*','users.status as userstatus')
            ->get();

        return view('admin.club.editclub', compact('user','id'));
    }
    private function officialuploadFileIfAvailable($file, $folder, $existingFilename)
{
    return $file ? $this->officialuploadFile($file, $folder, $existingFilename) : '';
}

private function officialuploadFile($file, $folder, $existingFilename)
{
    $ext = $file->getClientOriginalExtension();
    $filename = $existingFilename ?: "official_" . rand(11111, 99999) . "_" . time() . '.' . $ext;
    $s3Path = $folder . '/' . $filename;
    \Storage::disk('s3')->put($s3Path, file_get_contents($file));
    return $filename;
}

    public function UpdateClubDetails(request $request)
    {
        $user = Auth::user();
        $id = $request->hidden_user_id;
        $udetails = ClubDetails::where('user_id', $id)->first();

        $first_name = request('first_name');
        $last_name = request('last_name');
        $dob = request('dob');
        $gender= request('gender');
        $email= request('email');
        $mobile= request('mobile');
        $father_name = request('father_name');
        $aadhar = request('aadhar');
        $pan = request('pan');
        $blood_group= request('blood_group');
        $state= request('state');
        $district= request('district');
        $association= request('association');
        $address1= request('address1');
        $address2= request('address2');
        $city= request('city');
        $pincode= request('pincode');
        $caddress1= request('caddress1');
        $caddress2= request('caddress2');
        $ccity= request('ccity');
        $cstate= request('cstate');
        $cdistrict= request('cdistrict');
        $cpincode= request('cpincode');
        $bank_name= request('bank_name');
        $bank_branch= request('bank_branch');
        $account_no= request('account_no');
        $ifsc_code = request('ifsc_code');
        $photo= request('photo');
        $dob_proof= request('dob_proof');
        $address_proof = request('address_proof');

        $arraydata=[
            'user_id' => $id,
            'email' => $email,
            'mobile' => $mobile,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dob' => $dob,
            'gender'=> $gender,
            'father_name' => $father_name,
            'aadhar' => $aadhar,
            'blood_group'=> $blood_group,
            'pan'=> $pan,
            'association'=> $association,
            'state'=> $state,
            'district'=> $district,
            'address1'=> $address1,
            'address2'=> $address2,
            'city'=> $city,
            'pincode'=> $pincode,
            'caddress1'=> $caddress1,
            'caddress2'=> $caddress2,
            'ccity'=> $ccity,
            'cstate'=> $cstate,
            'cdistrict'=> $cdistrict,
            'cpincode'=> $cpincode,
            'bank_name'=> $bank_name,
            'bank_branch'=> $bank_branch,
            'account_no'=> $account_no,
            'ifsc_code' => $ifsc_code
            ];
            if ($udetails) {
                if ($photo) {
                    $arraydata['photo'] = $this->officialuploadFileIfAvailable($photo, 'BFI/photo', $udetails->photo);
                }
                if ($dob_proof) {
                    $arraydata['dob_proof'] = $this->officialuploadFileIfAvailable($dob_proof, 'BFI/dob_proof', $udetails->dob_proof);
                }
                if ($address_proof) {
                    $arraydata['address_proof'] = $this->officialuploadFileIfAvailable($address_proof, 'BFI/address_proof', $udetails->address_proof);
                }
                $udetails->update($arraydata);

                $udetails->save();
            } else {
                return redirect('admin/official/'.$id)->with('error', 'User details not found.');
            }
            return redirect('admin/official/'.$id)->with('success', 'Profile updated successfully!');
        }
}
