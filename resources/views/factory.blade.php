@extends('mainlayout')

@section('title', 'All Building')

@section('content')

<div class="container">
    {{-- <div class="card"> --}}
        {{-- <div class="row justify-content-center">
            <div class="col-md-4"><button class="btn btn-lg btn-success"> Green Andon </button></div>
            <div class="col-md-4"><button class="btn btn-lg btn-warning"> Yellow Andon</button></div>
            <div class="col-md-4"><button class="btn btn-lg btn-danger"> Red Andon</button></div>
        </div> --}}
    {{-- </div> --}}
</div>
    
    <div class="container">
        <input type="text" name="factory" id="factory" value="{{$factory}}" hidden>
      
            <div class="card">
                <h2 class="card-header" style="background-color: #0983af; color: white;">BUILDING {{$factory}}</h2>
                <div class="card-body" id="per_factory">
                   
                </div>
            </div><br>
    
    </div>
    
@endsection

<script src="{{asset('js/jquery-3.7.0.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    function display_factory(factory){
        $.ajax({
            url       : '/factory/'+ factory,
            dataType  : 'json',
            success   : function(data){
                console.log(data);
                var html = '';
                var j, k; 
                for(k=0; k<data.all.length; k++){
                    if(data.all[k].EVENT_TYPE == "YELLOW"){
                        html += '<button type="button" class="buttonY">'+data.all[k].CELL_CODE+'</button> ';
                    }else if(data.all[k].EVENT_TYPE == "RED"){
                        html += '<button type="button" class="buttonR">'+data.all[k].CELL_CODE+'</button> ';
                    }else if(data.all[k].EVENT_TYPE == "GREEN"){
                        html += '<button type="button" class="buttonG">'+data.all[k].CELL_CODE+'</button> ';
                    }else{
                        html += '<button type="button" class="button1">'+data.all[k].CELL_CODE+'</button> ';
                    }
                }
                for(j=0; j<data.alert.length; j++){
                    if(data.alert[j].EVENT_TYPE == "YELLOW"){
                        toastr.warning('<h1>'+data.alert[j].CELL_CODE+'</h1> ');
                    }else if(data.alert[j].EVENT_TYPE == "RED"){
                        toastr.error('<h1>'+data.alert[j].CELL_CODE+'</h1> ');
                    }else if(data.alert[j].EVENT_TYPE == "GREEN"){
                        toastr.success('<h1>'+data.alert[j].CELL_CODE+'</h1> ');
                    }else{
                        
                    }
                }
                $('#per_factory').html(html);

            }
        });
    }

    $(document).ready(function(){
        var factory = $('#factory').val()
        display_factory(factory);
        
        setInterval(function() {
            display_factory(factory)
          
        }, 5000);

    })

</script>