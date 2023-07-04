@extends('mainlayout')

@section('title', 'All Building')

@section('content')
<style>
    .toast {
        opacity: 1 !important;
    }
</style>
   
    <div class="container" id="all_building">
       
    </div>
    
@endsection

<script src="{{asset('js/jquery-3.7.0.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    function display_factory(){
        $.ajax({
            url       : '/all',
            dataType  : 'json',
            success   : function(data){
              console.log(data);
                var html='';
                var i, j, k; 
                // if(data.building.length > 1){
                    for(i=0; i<data.building.length; i++){
                        html +='<div class="card">'+
                                '<h2 class="card-header" style="background-color: #0983af; color: white;">Building '+data.building[i].FACTORY2+'</h2>'+
                                '<div class="card-body">';
                        for(k=0; k<data.all.length; k++){
                            if(data.all[k].FACTORY2 == data.building[i].FACTORY2){
                                if(data.all[k].EVENT_TYPE == "YELLOW"){
                                    html += '<button type="button" class="buttonY">'+data.all[k].CELL_CODE+'</button> ';
                                }else if(data.all[k].EVENT_TYPE == "RED"){
                                    html += '<button type="button" class="buttonR">'+data.all[k].CELL_CODE+'</button> ';
                                }else if(data.all[k].EVENT_TYPE == "GREEN"){
                                    html += '<button type="button" class="buttonG">'+data.all[k].CELL_CODE+'</button> ';
                                }else{
                                    html += '<button type="button" class="button1">'+data.all[k].CELL_CODE+'</button> ';
                                }
                            }else{
                                html +=''
                            }
                        }
                        html += ' </div></div><br>'
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
                    $('#all_building').html(html);
                }
        });
    }

    $(document).ready(function(){
        display_factory();
        
        setInterval(function() {
            display_factory();
        }, 5000);

    })

</script>