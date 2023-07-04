<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Andon extends Model
{
    use HasFactory;

    public function all_building(){
        $all    = DB::table('TMCELL')
                    ->select('TMCELL.CELL_CODE', 'TMCELL.FACTORY2', DB::raw("(CASE WHEN B.EVENT_TYPE='Y' THEN 'YELLOW'
                                                WHEN B.EVENT_TYPE='G' THEN 'GREEN'
                                                WHEN B.EVENT_TYPE='R' THEN 'RED'
                                                END ) AS EVENT_TYPE"))
                    ->leftJoin(DB::raw('
                            (SELECT DISTINCT(CELL_CODE), EVENT_TYPE 
                            FROM THANDONLOG WITH (NOLOCK)
                            WHERE START_YMD = CONVERT(CHAR(8), GETDATE(), 112) AND END_YMD IS NULL) B
                        '),
                        function($join)
                        {
                            $join->on('TMCELL.CELL_CODE', '=', 'B.CELL_CODE');
                        })
                        ->where('USE_FLAG', 'Y')
                        ->whereIn('FACTORY', ['A1',
                        'B1',
                        'C1',
                        'D1',
                        'E1',
                        'H1'])
                        // ->whereNotNull('EVENT_TYPE')
                    ->get();
        //  dd($all);
        return $all;
    }

    public function building(){
        $building = DB::table('TMCELL')
                    ->select('FACTORY2')
                    ->whereIn('FACTORY', ['A1', 'B1', 'C1', 'D1', 'E1', 'H1'])
                    ->groupBy('FACTORY2')->get();
        // dd($building);
        return $building;
    }

    public function a_building($fac){
        $building = DB::table('TMCELL')
                    ->select('FACTORY2')
                    ->where('FACTORY', $fac)
                    ->groupBy('FACTORY2')->get();
        // dd($building);
        return $building;
    }

    public function per_building($fac){
            $facs  = DB::table('TMCELL')
                    ->select('TMCELL.CELL_CODE', 'TMCELL.FACTORY2', DB::raw("(CASE WHEN B.EVENT_TYPE='Y' THEN 'YELLOW'
                                                WHEN B.EVENT_TYPE='G' THEN 'GREEN'
                                                WHEN B.EVENT_TYPE='R' THEN 'RED'
                                                END ) AS EVENT_TYPE"))
                    ->leftJoin(DB::raw('
                            (SELECT DISTINCT(CELL_CODE), EVENT_TYPE 
                            FROM THANDONLOG WITH (NOLOCK)
                            WHERE START_YMD = CONVERT(CHAR(8), GETDATE(), 112) AND END_YMD IS NULL) B
                        '),
                        function($join)
                        {
                            $join->on('TMCELL.CELL_CODE', '=', 'B.CELL_CODE');
                        })
                        ->where('USE_FLAG', 'Y')
                        ->where('FACTORY2', $fac)
                        // ->whereNotNull('EVENT_TYPE')
                    ->get();
            //  dd($all);
            return $facs;
    }

    public function per_building_toast($fac){
        $facs  = DB::table('TMCELL')
                ->select('TMCELL.CELL_CODE', 'TMCELL.FACTORY2', DB::raw("(CASE WHEN B.EVENT_TYPE='Y' THEN 'YELLOW'
                                            WHEN B.EVENT_TYPE='G' THEN 'GREEN'
                                            WHEN B.EVENT_TYPE='R' THEN 'RED'
                                            END ) AS EVENT_TYPE"))
                ->join(DB::raw('
                        (SELECT DISTINCT(CELL_CODE), EVENT_TYPE 
                        FROM THANDONLOG WITH (NOLOCK)
                        WHERE START_YMD = CONVERT(CHAR(8), GETDATE(), 112) AND END_YMD IS NULL) B
                    '),
                    function($join)
                    {
                        $join->on('TMCELL.CELL_CODE', '=', 'B.CELL_CODE');
                    })
                    ->where('USE_FLAG', 'Y')
                    ->where('FACTORY2', $fac)
                ->get();
        //  dd($all);
        return $facs;
    }

    public function all_building_toast(){
        $all    = DB::table('TMCELL')
                    ->select('TMCELL.CELL_CODE', 'TMCELL.FACTORY2', DB::raw("(CASE WHEN B.EVENT_TYPE='Y' THEN 'YELLOW'
                                                WHEN B.EVENT_TYPE='G' THEN 'GREEN'
                                                WHEN B.EVENT_TYPE='R' THEN 'RED'
                                                END ) AS EVENT_TYPE"))
                    ->join(DB::raw('
                            (SELECT DISTINCT(CELL_CODE), EVENT_TYPE 
                            FROM THANDONLOG WITH (NOLOCK)
                            WHERE START_YMD = CONVERT(CHAR(8), GETDATE(), 112) AND END_YMD IS NULL) B
                        '),
                    function($join)
                    {
                        $join->on('TMCELL.CELL_CODE', '=', 'B.CELL_CODE');
                    })
                    ->where('USE_FLAG', 'Y')
                    ->whereIn('FACTORY', ['A1',
                                'B1',
                                'C1',
                                'D1',
                                'E1',
                                'H1'])
                    
                    ->GET();
        //  dd($all);
        return $all;
    }

   
}
