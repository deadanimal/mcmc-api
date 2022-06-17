<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\slp;
use App\Models\tac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        ini_set('memory_limit', '-1');
        Cache::flush();
    }

    public function index()
    {

        dd(Test::where('Id', 'd0316c94-6e24-4fd4-ae8f-f3a07351400a')->first());
        // $test = Test::pluck('Id')->first();
        // return response()->json($test);
    }

    public function imei(Request $request)
    {
        $IMEI = $request->IMEI;
        //$test = Test::where('IMEI', $IMEI)->first();
        $test = DB::table('_ProductRegistration_productregistration__202206091046')->where('IMEI', $IMEI)->first();
        return response()->json($test);
}
    public function serial(Request $request)
    {
        $SerialNo = $request->SerialNo;
        $test = Test::where('SerialNo', $SerialNo)->first();
        return response()->json($test);
    }

    public function slp(Request $request)
    {
        $slp = $request->slp;
        $test = slp::where('SLP_ID', $slp)->first();
        return response()->json($test);
    }

    public function tac(Request $request)
    {
        $tac = $request->tac;
        $test = tac::where('TAC', $tac)->first();
        return response()->json($test);
    }

}
