<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoring Andon</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
    <link rel="stylesheet" href="{{asset('css/all_button.css')}}">
    <style>
        .nav-item.active{
            background-color: #bb3434;
            color: white;
            height: 100%;
            margin: 0px;
            
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light justify-content-between" style="text-align:center">
        <table width="100%">
            <tr>
              <td width="200px"><img src="{{URL::asset('templates/image/hwi.png')}}" style="padding-left:5px; padding-bottom: 2px;" width="100px"></td>
              <td style="align:center"><h1><b><center>Andon Monitoring</center></b></h1></td>
              <td width="200px"><h5><b><span style="float:right;" id="demo"></span></b></h5>
                {{-- <span id="countdown"></span> --}}
              </td>
            </tr>
          </table>
    </nav>
    <nav class="navbar-expand-lg navbar-dark sticky-top" style="background-color: #0070c0; color: white;">
        {{-- <a class="navbar-brand" href="#">All Building</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <a class="nav-link" href="/">All Building</a>
            </li>
            <li class="nav-item {{ request()->is('view/A1') ? 'active' : '' }}">
                <a class="nav-link" href="/view/A1">A1</a>
              </li>
            <li class="nav-item {{request()->is('view/B1') ? 'active' : ''}}">
              <a class="nav-link" href="/view/B1">B1</a>
            </li>
            <li class="nav-item {{request()->is('view/C1') ? 'active' : ''}}">
              <a class="nav-link" href="/view/C1">C1</a>
            </li>
            <li class="nav-item {{request()->is('view/D1') ? 'active' : ''}}">
                <a class="nav-link" href="/view/D1">D1</a>
            </li>
            <li class="nav-item {{request()->is('view/D2') ? 'active' : ''}}">
                <a class="nav-link" href="/view/D2">D2</a>
            </li>
            <li class="nav-item {{request()->is('view/E1') ? 'active' : ''}}">
                 <a class="nav-link" href="/view/E1">E1</a>
            </li>
            <li class="nav-item {{request()->is('view/E2') ? 'active' : ''}}">
                <a class="nav-link" href="/view/E2">E2</a>
            </li>
            <li class="nav-item {{request()->is('view/H3') ? 'active' : ''}}">
                <a class="nav-link" href="/view/H3">H3</a>
            </li>
            <li class="nav-item {{request()->is('view/HA') ? 'active' : ''}}">
                <a class="nav-link" href="/view/HA">HA</a>
            </li>
          </ul>
        </div>
    </nav>
    <div class="content p-5 col-lg-12">
        @yield('content')
    </div>
    <div class="card-footer text-center" style="background-color : #78755D; color: white;">
        IT Department, 2023
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    var myVar = setInterval(myTimer ,1000);
    function myTimer() {
        var d = new Date();
        var date = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
        var weekday = new Array(7);
        weekday[0] = "SUN";
        weekday[1] = "MON";
        weekday[2] = "TUE";
        weekday[3] = "WED";
        weekday[4] = "THU";
        weekday[5] = "FRI";
        weekday[6] = "SAT";

        var n = weekday[d.getDay()];
        document.getElementById("demo").innerHTML = n + ', ' + d.toLocaleTimeString();
    }
    
</script>