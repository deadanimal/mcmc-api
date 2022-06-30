<?php

namespace App\Http\Controllers;

use App\Models\slp;
use App\Models\tac;
use App\Models\Test;
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
        // $test = Test::first();
        // return response()->json($test);

        $request = new Request();
        $request['IMEI'] = "359051094335346";

        $test = Test::where('Id', '!=', null);

        if ($request->has('Id')) {
            $test->where('Id', $request->Id);
        }

        if ($request->has('SLPID')) {
            $test->where('SLPID', $request->SLPID);
        }

        if ($request->has('TAC')) {
            $test->where('TAC', $request->TAC);
        }

        if ($request->has('CA_owner')) {
            $test->where('CA_owner', $request->CA_owner);
        }

        if ($request->has('ProductRegistrationNo')) {
            $test->where('ProductRegistrationNo', $request->ProductRegistrationNo);
        }

        if ($request->has('RegType')) {
            $test->where('RegType', $request->RegType);
        }

        if ($request->has('IMEI')) {
            $test->where('IMEI', $request->IMEI);
        }

        if ($request->has('SerialNo')) {
            $test->where('SerialNo', $request->SerialNo);
        }
        if ($request->has('FileNo')) {
            $test->where('FileNo', $request->FileNo);
        }
        if ($request->has('Year')) {
            $test->where('Year', $request->Year);
        }
        return response()->json($test->get());

    }

    public function imei(Request $request)
    {
        $IMEI = $request->IMEI;
        //$test = Test::where('IMEI', $IMEI)->first();
        $test = DB::table('_ProductRegistration_productregistration__202206091046')->where('IMEI', $IMEI)->first();
        // $test = DB::table('pr')->where('IMEI', $IMEI)->first();
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

    public function filter(Request $request)
    {
        $test = Test::where('Id', '!=', null);

        if ($request->has('Id')) {
            $test->where('Id', $request->Id);
        }

        if ($request->has('SLPID')) {
            $test->where('SLPID', $request->SLPID);
        }

        if ($request->has('TAC')) {
            $test->where('TAC', $request->TAC);
        }

        if ($request->has('CA_owner')) {
            $test->where('CA_owner', $request->CA_owner);
        }

        if ($request->has('ProductRegistrationNo')) {
            $test->where('ProductRegistrationNo', $request->ProductRegistrationNo);
        }

        if ($request->has('RegType')) {
            $test->where('RegType', $request->RegType);
        }

        if ($request->has('IMEI')) {
            $test->where('IMEI', $request->IMEI);
        }

        if ($request->has('SerialNo')) {
            $test->where('SerialNo', $request->SerialNo);
        }
        if ($request->has('FileNo')) {
            $test->where('FileNo', $request->FileNo);
        }
        if ($request->has('Year')) {
            $test->where('Year', $request->Year);
        }
        return response()->json($test->get());

    }

}
