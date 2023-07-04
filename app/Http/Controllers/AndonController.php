<?php

namespace App\Http\Controllers;

use App\Models\Andon;
use Illuminate\Http\Request;

class AndonController extends Controller
{
    public function index(){
        $factory    = 'all';
        return view('all')->with(['factory' => $factory]);
    }

    public function display_all(){
        $andon_all  = Andon::all_building();
        $building   = Andon::building();
        $alert      = Andon::all_building_toast();
        return response()->json(['all'=> $andon_all, 'building' => $building, 'alert'=> $alert]);
    }

    public function factory($fac){
        return view('factory')->with(['factory' => $fac]);
    }

    public function display_per_fac($fac){
        $andon_all  = Andon::per_building($fac);
        $building   = Andon::a_building($fac);
        $alert      = Andon::per_building_toast($fac);
        // return view('all')->with(['andon_all'=> $andon_all, 'building' => $building]);
        return response()->json(['all'=> $andon_all, 'building' => $building, 'factory'=>$building, 'alert'=>$alert]);
    }
}
