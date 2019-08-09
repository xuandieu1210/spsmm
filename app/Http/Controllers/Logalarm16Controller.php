<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblLogalarm16;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\TblParam;
use Illuminate\Support\Facades\DB;

class Logalarm16Controller extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $logalarm16 = DB::table('tbl_logalarm16')
        ->join('tbl_pi', 'tbl_logalarm16.ID_PI', '=', 'tbl_pi.ID_PI')->join('tbl_param', function ($join) {
            $join->on('tbl_param.ID_PI', '=', 'tbl_logalarm16.ID_PI')
                 ->where('tbl_param.MA_PARAM', '=', 'ALARM');
        })->select('tbl_logalarm16.*', 'tbl_param.*', 'tbl_pi.TEN_PI')->limit(1000)
        ->get();
        //$logalarm16 = TblLogalarm16::with('tbl_pi')->limit(100)->get();

        return Datatables::of($logalarm16)->setRowData([
            'nc1' => function($logalarm16) {
                return $this->get_NC('IN_1', $logalarm16->FILE_PARAM);
            },
            'nc2' => function($logalarm16) {
                return $this->get_NC( 'IN_2', $logalarm16->FILE_PARAM);
            },
            'nc3' => function($logalarm16) {
                return $this->get_NC( 'IN_3', $logalarm16->FILE_PARAM);
            },
            'nc4' => function($logalarm16) {
                return $this->get_NC( 'IN_4', $logalarm16->FILE_PARAM);
            },
            'nc5' => function($logalarm16) {
                return $this->get_NC( 'IN_5', $logalarm16->FILE_PARAM);
            },
            'nc6' => function($logalarm16) {
                return $this->get_NC( 'IN_6', $logalarm16->FILE_PARAM);
            },
            'nc7' => function($logalarm16) {
                return $this->get_NC( 'IN_7', $logalarm16->FILE_PARAM);
            },
            'nc8' => function($logalarm16) {
                return $this->get_NC( 'IN_8', $logalarm16->FILE_PARAM);
            },
            'nc9' => function($logalarm16) {
                return $this->get_NC( 'IN_9', $logalarm16->FILE_PARAM);
            },
            'nc10' => function($logalarm16) {
                return $this->get_NC( 'IN_10', $logalarm16->FILE_PARAM);
            },
            'nc11' => function($logalarm16) {
                return $this->get_NC( 'IN_11', $logalarm16->FILE_PARAM);
            },
            'nc12' => function($logalarm16) {
                return $this->get_NC( 'IN_12', $logalarm16->FILE_PARAM);
            },
            'nc13' => function($logalarm16) {
                return $this->get_NC( 'IN_13', $logalarm16->FILE_PARAM);
            },
            'nc14' => function($logalarm16) {
                return $this->get_NC( 'IN_14', $logalarm16->FILE_PARAM);
            },
            'nc15' => function($logalarm16) {
                return $this->get_NC( 'IN_15', $logalarm16->FILE_PARAM);
            },
            'nc16' => function($logalarm16) {
                return $this->get_NC( 'IN_16', $logalarm16->FILE_PARAM);
            },
        ])->addColumn('action', function ($logalarm16) {
            return '
            <form method="POST" action="'. url('/logalarm16' . '/' . $logalarm16->ID_LOGALARM16) .'" accept-charset="UTF-8" style="display:inline">
                '. method_field('DELETE').'
                '. csrf_field().'
                <button type="submit" title="Xóa" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </form>';
        })->rawColumns(['action'])->make(true); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('logalarm16.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('logalarm16.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        TblLogalarm16::create($requestData);

        return redirect('logalarm16')->with('flash_message', 'TblLogalarm16 added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $logalarm16 = TblLogalarm16::findOrFail($id);

        return view('logalarm16.show', compact('logalarm16'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $logalarm16 = TblLogalarm16::findOrFail($id);

        return view('logalarm16.edit', compact('logalarm16'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $logalarm16 = TblLogalarm16::findOrFail($id);
        $logalarm16->update($requestData);

        return redirect('logalarm16')->with('flash_message', 'TblLogalarm16 updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TblLogalarm16::destroy($id);

        return redirect('logalarm16')->with('flash_message', 'TblLogalarm16 deleted!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMulti(Request $request)
    {
        $ids = $request->input('id');
        $log = TblLogalarm16::whereIn('ID_LOGALARM16', $ids);
        if($log->delete())
        {
            echo 'Xóa thành công';
        }
    }

    function get_NC($inname, $param = null){
        // $para = 'ALARM';
        // $modelpara = TblParam::where('ID_PI', '=', $idpi)->where('MA_PARAM', '=', $para)->get();    
        $nc = 1;
        if ($param != ''){
            $arr_para=  json_decode($param,true);         
            if ($arr_para['ALARMPARAMS']['IN_ALARMS'][$inname]['NAME'] != 'NONE'){
                $nc = $arr_para['ALARMPARAMS']['IN_ALARMS'][$inname]['NC'];                
            }   
            else{
                $nc =-1;
            }
        }   
        return $nc;	
    }
}
