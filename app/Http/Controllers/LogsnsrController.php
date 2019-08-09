<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblLogsnsr;
use App\Models\TblParam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class LogsnsrController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $logsnsr = DB::table('tbl_logsnsr')
        ->join('tbl_pi', 'tbl_logsnsr.ID_PI', '=', 'tbl_pi.ID_PI')->join('tbl_param', function ($join) {
            $join->on('tbl_param.ID_PI', '=', 'tbl_logsnsr.ID_PI')
                 ->where('tbl_param.MA_PARAM', '=', 'SNSR');
        })->select('tbl_logsnsr.*', 'tbl_param.*', 'tbl_pi.TEN_PI')
        ->get();
        //$logsnsr = TblLogsnsr::with('tbl_pi')->get();
        //$logsnsr = "SELECT tbl_logsnsr.*, tbl_pi.TEN_PI, tbl_param.FILE_PARAM, tbl_param.ID_PARAM FROM tbl_logsnsr JOIN tbl_pi ON tbl_logsnsr.ID_PI = tbl_pi.ID_PI JOIN tbl_param ON tbl_logsnsr.ID_PI = tbl_PARAM.ID_PI AND tbl_param.MA_PARAM = 'SNSR' ";

        return Datatables::of($logsnsr)->setRowData([
            'nc1' => function($logsnsr) {
                return $this->get_NC('ADC_1', $logsnsr->ADC_1, $logsnsr->FILE_PARAM);
            },
            'nc2' => function($logsnsr) {
                return $this->get_NC('ADC_2', $logsnsr->ADC_2, $logsnsr->FILE_PARAM);
            },
            'nc3' => function($logsnsr) {
                return $this->get_NC('ADC_3', $logsnsr->ADC_3, $logsnsr->FILE_PARAM);
            },
            'nc4' => function($logsnsr) {
                return $this->get_NC('ADC_4', $logsnsr->ADC_4, $logsnsr->FILE_PARAM);
            },
            'nc5' => function($logsnsr) {
                return $this->get_NC('ADC_5', $logsnsr->ADC_5, $logsnsr->FILE_PARAM);
            },
            'nc6' => function($logsnsr) {
                return $this->get_NC('ADC_6', $logsnsr->ADC_6, $logsnsr->FILE_PARAM);
            },
            'nc7' => function($logsnsr) {
                return $this->get_NC('ADC_7', $logsnsr->ADC_7, $logsnsr->FILE_PARAM);
            },
            'nc8' => function($logsnsr) {
                return $this->get_NC('ADC_8', $logsnsr->ADC_8, $logsnsr->FILE_PARAM);
            },
            'nc9' => function($logsnsr) {
                return $this->get_NC('ADC_9', $logsnsr->ADC_9, $logsnsr->FILE_PARAM);
            },
            'nc10' => function($logsnsr) {
                return $this->get_NC('ADC_10', $logsnsr->ADC_10, $logsnsr->FILE_PARAM);
            },
            'nc11' => function($logsnsr) {
                return $this->get_NC('ADC_11', $logsnsr->ADC_11, $logsnsr->FILE_PARAM);
            },
            'nc12' => function($logsnsr) {
                return $this->get_NC('ADC_12', $logsnsr->ADC_12, $logsnsr->FILE_PARAM);
            },
            'nc13' => function($logsnsr) {
                return $this->get_NC('ADC_13', $logsnsr->ADC_13, $logsnsr->FILE_PARAM);
            },
            'nc14' => function($logsnsr) {
                return $this->get_NC('ADC_14', $logsnsr->ADC_14, $logsnsr->FILE_PARAM);
            },
            'nc15' => function($logsnsr) {
                return $this->get_NC('ADC_15', $logsnsr->ADC_15, $logsnsr->FILE_PARAM);
            },
            'nc16' => function($logsnsr) {
                return $this->get_NC('ADC_16', $logsnsr->ADC_16, $logsnsr->FILE_PARAM);
            },
        ])->addColumn('action', function ($logsnsr) {
            return '
            <form method="POST" action="'. url('/logsnsr' . '/' . $logsnsr->ID_LOGSNSR) .'" accept-charset="UTF-8" style="display:inline">
                '. method_field('DELETE').'
                '. csrf_field().'
                <button type="submit" title="Xóa" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </form>';
        })->rawColumns(['action'])->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('logsnsr.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('logsnsr.create');
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
        
        TblLogsnsr::create($requestData);

        return redirect('logsnsr')->with('flash_message', 'TblLogsnsr added!');
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
        $logsnsr = TblLogsnsr::findOrFail($id);

        return view('logsnsr.show', compact('logsnsr'));
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
        $logsnsr = TblLogsnsr::findOrFail($id);

        return view('logsnsr.edit', compact('logsnsr'));
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
        
        $logsnsr = TblLogsnsr::findOrFail($id);
        $logsnsr->update($requestData);

        return redirect('logsnsr')->with('flash_message', 'TblLogsnsr updated!');
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
        TblLogsnsr::destroy($id);

        return redirect('logsnsr')->with('flash_message', 'TblLogsnsr deleted!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMulti(Request $request)
    {
        $ids = $request->input('id');
        $log = TblLogsnsr::whereIn('ID_LOGSNSR', $ids);
        if($log->delete())
        {
            echo 'Xóa thành công';
        }
    }

    public function get_NC($adcname,$adcvalue, $param = null){
        //$para = 'SNSR';
        //$modelpara = TblParam::where('ID_PI', '=', $idpi)->where('MA_PARAM', '=', $para)->get('FILE_PARAM');    
        $nc = 0;
        if ($param != ''){
            $arr_para=  json_decode($param,true);           
            if ($arr_para['SNSRPARAMS']['ADC_ALARMS'][$adcname]['NAME'] != 'NONE'){
                $dir = $arr_para['SNSRPARAMS']['ADC_ALARMS'][$adcname]['DIR'];
                $low = $arr_para['SNSRPARAMS']['ADC_ALARMS'][$adcname]['LOW'];
                $hi = $arr_para['SNSRPARAMS']['ADC_ALARMS'][$adcname]['HI'];
                if ($dir == 0){
                    if ($adcvalue < $low || $adcvalue > $hi){ 
                        $nc = 1;                 
                    }
                }    
                if ($dir == 1){
                    if ($adcvalue < $hi){
                        $nc = 1;
                    }
                }
                if ($dir == -1){
                    if ($adcvalue > $low){
                        $nc = 1;
                    }
                }
                if ($dir == 2){
                    if ($adcvalue >= $low && $adcvalue <= $hi){
                        $nc = 1;
                    }
                }                
            }    
            else{
                $nc = -1;
            }
        }   
        return $nc;	
    } 
}
