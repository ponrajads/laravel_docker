@extends('layouts.admin.dashboard.header')
@section('content')

<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Register Tournament & Create team <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{ url()->previous() }}">Go Back</a>
    </h2>
    <hr class="mt-4 mb-2">
    
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 text-center">
                <h2 class="text-4xl font-bold">{{ $tournament->tournament_name }}</h2>
            </div>

        </div>
       
        
        <hr class="mt-4 mb-2">
       
        <div class="grid grid-cols-12 gap-4 mt-5">
          @foreach($cat as $categ)  
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <center><h1 class="text-xl font-bold truncate text-primary mt-2 mb-4">List of Team Players for {{ $categ->ageCategoryName }}</h1></center>
        <a href="{{ route('gencatcertificate', ['tid' => $tid, 'catid' => $categ->age_category, 'sid' => $state_id]) }}" class="btn btn-primary">Generate Certificate</a>
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                        <th class="whitespace-nowrap">S.No</th>
                        <th class="whitespace-nowrap">BFI UID</th>
                        <th class="whitespace-nowrap">Full Name</th>
                        <th class="text-start whitespace-nowrap">Gender</th>
                        <th class="text-start whitespace-nowrap">Mobile</th>
                        <th class="text-start whitespace-nowrap">Email</th>
                        <th class="text-start whitespace-nowrap">Jersey No</th>
                        <th class="text-start whitespace-nowrap">Photo</th>
                        <th class="text-start whitespace-nowrap">Certificate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;
                    
                    $players = \App\Models\TournamentsTeam::join('users_details', 'users_details.user_id', '=', 'tournament_teams.user_id')
                    ->join('users', 'users.id', '=', 'users_details.user_id')
                    ->where('tournament_id', $tid)->where('age_category', $categ->age_category)->where('state_id', $state_id)
                    ->select('users.username','users.name','users_details.photo','users_details.user_id','users_details.gender','users_details.email','users_details.mobile','users_details.dob','tournament_teams.id','tournament_teams.jersey_no','tournament_teams.certificate','users_details.photo')->get();
                    ?>
                    
                    @foreach($players as $key => $value)
                    <tr class="intro-x">
                        <td class="w-20">
                            <span class="font-medium whitespace-nowrap">{{$counter++}}</span>
                        </td>
                        <td>
                            <span class="font-medium whitespace-nowrap">{{$value->username}}</span>
                        </td>
                        <td>
                            <span class="font-medium whitespace-nowrap">{{$value->name}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->gender}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->phone}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->email}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->jersey_no}}</span>
                        </td>
						<td class="text-start">
                            <span class="font-medium whitespace-nowrap"><img src="{{ Storage::disk('s3')->url('BFI/photo/' . $value->photo) }}" width="80" height="80"></span>
                        </td>
                        <td class="text-start">
                            
                            @if($value->certificate == '')
                            <a href="{{route('gencertificate', ['tid' => $tid, 'uid' => $value->id ])}}" class="btn btn-primary">Generate</a>
                            @else
                            <a href="{{ Storage::disk('s3')->url('BFI/certificates/' . $value->certificate) }}" class="btn btn-primary" target="_blank" download>Download</a>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
         <!-- BEGIN: Data List -->
         <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <center><h1 class="text-xl font-bold truncate text-primary mt-2 mb-4">List of Team Coaches for {{ $categ->ageCategoryName }}</h1></center>
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                        <th class="whitespace-nowrap">S.No</th>
                        <th class="whitespace-nowrap">BFI UID</th>
                        <th class="whitespace-nowrap">Full Name</th>
                        <th class="text-start whitespace-nowrap">Gender</th>
                        <th class="text-start whitespace-nowrap">Mobile</th>
                        <th class="text-start whitespace-nowrap">Email</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;
                    
                    $coaches = \App\Models\TourCoaches::join('coach_details', 'coach_details.user_id', '=', 'tournament_coaches.user_id')
                    ->join('users', 'users.id', '=', 'coach_details.user_id')
                    ->where('tournament_id', $tid)->where('age_category', $categ->age_category)->where('state_id', $state_id)
                    ->where('coach_details.first_name','!=',null)
                    ->select('users.username','users.name','coach_details.photo','coach_details.user_id','coach_details.gender','coach_details.email','coach_details.mobile','coach_details.dob','tournament_coaches.id')->get();
                    ?>
                    
                    @foreach($coaches as $key => $value)
                    <tr class="intro-x">
                        <td class="w-20">
                            <span class="font-medium whitespace-nowrap">{{$counter++}}</span>
                        </td>
                        <td>
                            <span class="font-medium whitespace-nowrap">{{$value->username}}</span>
                        </td>
                        <td>
                            <span class="font-medium whitespace-nowrap">{{$value->name}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->gender}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->phone}}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{$value->email}}</span>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        @endforeach
        
       
        
    </div>
        
        <hr class="mt-8 mb-2">
       
    </form>
</div>
<!-- END: Content -->
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function update_jersey_no(id, selectedElement) {
    var jersey_no = $(selectedElement).val();
    $.ajax({
        url: "{{route('state/tournament/update_jersey_no')}}",
        type: 'POST',
        data: {
            '_token': '{{ csrf_token() }}',
            'id': id,
            'jersey_no': jersey_no
        },
        success: function(data) {
            swal.fire({
                title: 'Success',
                text: 'Jersey number updated successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                // Check if the user clicked "OK"
                if (result.isConfirmed) {
                    // Reload the page
                    location.reload();
                }
            });
        }
    });
}
</script>
@endsection