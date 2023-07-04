@extends('mainlayout')

@section('title', 'All Building')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="row justify-content-center">
    <div class="dropdown">
        <div class="col-md-4">
            <button class="btn btn-lg btn-success" data-toggle="dropdown"> Green Andon <span class="badge badge-light" id="notifG"></span></button>
            <div id="pesanG" class="dropdown-menu" aria-labelledby="dropdownMenuButton"></div>
            
        </div>
    </div>
    <div class="dropdown">
        <div class="col-md-4">
            <button class="btn btn-lg btn-warning" data-toggle="dropdown"> Yellow Andon <span class="badge badge-light" id="notifY"></span></button>
            <div id="pesanY" class="dropdown-menu" aria-labelledby="dropdownMenuButton"></div>
        </div>
    </div>
    <div class="dropdown">
        <div class="col-md-4">
            <button class="btn btn-lg btn-danger" data-toggle="dropdown"> Red Andon <span class="badge badge-light" id="notifR"></span></button>
            <div id="pesanR" class="dropdown-menu" aria-labelledby="dropdownMenuButton"></div>
        </div>
    </div>
</div>
<input hidden type="text" id="fac" value="{{$fac}}" name="fac">
<div class="container">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30"
                    alt="">
                <b> LaraPost</b>
            </a>
        </div>
    </nav>
    <br>
    <div class="dropdown">
        <button type="button" class="btn btn-primary" data-toggle="dropdown">
            Notifications <span class="badge badge-light" id="notif"></span>
        </button>
        <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
@endsection
<script src="{{asset('js/jquery-3.7.0.js')}}"></script>
<script>
    $(document).ready(function() {
        jumlah();
        pesan();
    })

    function selesai() {
        // setTimeout(function() {
            jumlah();
            // selesai();
            // pesan();
        // }, 200);
    }

    function jumlah() {
        var fac = $('#fac').val();
        $.ajax({
            url       : '/counts/'+ fac,
            dataType  : 'json',
            success   : function(data){
              $("#notifG").html(data.countG[0].JML);
              $("#notifY").html(data.countY[0].JML);
              $("#notifR").html(data.countR[0].JML);
              $("#notif").html(data.countR[0].JML);
            }
        })
    }
   
    function pesan() {
        var fac = $('#fac').val();
        $.ajax({
            url       : '/display/'+ fac,
            dataType  : 'json',
            success   : function(data){
                $("#pesanY").empty();
                $("#pesanR").empty();
                $("#pesanG").empty();
                $("#pesan").empty();
                var no = 1;
                // $.each(data.displayY, function() {
                for(i = 0; i<data.displayY.length; i++){
                    $("#pesanY").append('<a id="pesanY" class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/></svg>&nbsp;'+data.displayY[i].CELL_CODE+'...</a>');
                }
                    
                // });

                // $.each(data.displayY, function() {
                //     $("#pesan").append('<a id="pesan" class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/></svg>&nbsp;'+this['CELL_CODE'].substr(0, 20)+'...</a>');
                // });
            }
        })
    }
</script>