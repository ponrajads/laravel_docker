<!DOCTYPE html>
<html lang="en" class="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8">
        <link href="{{asset('dist/images/logo/rugbylogo.png')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Rugby India, founded in 1998, is the sole governing body for the sport of Rugby in India. Recognized by the Ministry of Youth Affairs & Sport, Govt. of India, Rugby India is a full member of World Rugby, Asia Rugby and the Indian Olympic Association (IOA). The body is responsible for the growth & development of the sport of Rugby across the country from the grassroots to the high performance level.">
        <meta name="keywords" content="Indian Rugby">
        <meta name="author" content="Sportingindia">
        <title>Indian Rugby Football Union</title>
        <!-- BEGIN: CSS Assets-->
        <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:ital,wght@0,400;0,500;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Fjalla+One&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>

       <!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


<!-- END: CSS Assets-->
</head>
@include('layouts.admin.dashboard.navbar')
@include('layouts.admin.dashboard.sidebar')
@yield('content')


</div>
<!-- BEGIN: JS Assets-->
<script src="{{asset('dist/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('#players-table').DataTable();
});
</script>
</body>
</html>
