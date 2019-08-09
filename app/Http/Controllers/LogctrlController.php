<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblLogctrl;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\TblParam;
use Illuminate\Support\Facades\DB;

class LogctrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $logctrl = DB::table('tbl_logctrl')
        ->join('tbl_pi', 'tbl_logctrl.ID_PI', '=', 'tbl_pi.ID_PI')->join('tbl_param', function ($join) {
            $join->on('tbl_param.ID_PI', '=', 'tbl_logctrl.ID_PI')
                 ->where('tbl_param.MA_PARAM', '=', 'CTRL');
        })->select('tbl_logctrl.*', 'tbl_param.*', 'tbl_pi.TEN_PI')->limit(100)
        ->get();

        return Datatables::of($logctrl)->setRowData([
            'nc1' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_1');
            },
            'nc2' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_2');
            },
            'nc3' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_3');
            },
            'nc4' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_4');
            },
            'nc5' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_5');
            },
            'nc6' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_6');
            },
            'nc7' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_7');
            },
            'nc8' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_8');
            },
            'nc9' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_9');
            },
            'nc10' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_10');
            },
            'nc11' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_11');
            },
            'nc12' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_12');
            },
            'nc13' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_13');
            },
            'nc14' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_14');
            },
            'nc15' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_15');
            },
            'nc16' => function($logctrl) {
                return $this->get_NC($logctrl->ID_PI, 'OUT_16');
            },
        ])->addColumn('action', function ($logctrl) {
            return '
            <form method="POST" action="'. url('/logctrl' . '/' . $logctrl->ID_LOGCTRL) .'" accept-charset="UTF-8" style="display:inline">
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
        $logctrl = TblLogctrl::with('tbl_pi')->limit(1000)->get();

        return view('logctrl.index', compact('logctrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('logctrl.create');
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
        
        TblLogctrl::create($requestData);

        return redirect('logctrl')->with('flash_message', 'TblLogctrl added!');
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
        $logctrl = TblLogctrl::findOrFail($id);

        return view('logctrl.show', compact('logctrl'));
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
        $logctrl = TblLogctrl::findOrFail($id);

        return view('logctrl.edit', compact('logctrl'));
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
        
        $logctrl = TblLogctrl::findOrFail($id);
        $logctrl->update($requestData);

        return redirect('logctrl')->with('flash_message', 'TblLogctrl updated!');
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
        TblLogctrl::destroy($id);

        return redirect('logctrl')->with('flash_message', 'TblLogctrl deleted!');
    }

    function get_NC($idpi,$outname){
        $para = 'CTRL';
        $modelpara = TblParam::where('ID_PI', '=', $idpi)->where('MA_PARAM', '=', $para)->get();    
        $nc = 0;
        if ($modelpara){
            $arr_para=  json_decode($modelpara[0]['FILE_PARAM'],true);         
            if ($arr_para['CTRLPARAMS']['OUT_CTRLS'][$outname]['NAME'] != 'NONE'){
                $nc = $arr_para['CTRLPARAMS']['OUT_CTRLS'][$outname]['NC'];                
            }        
            else{
                $nc = -1;
            }
        }   
        return $nc;	
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMulti(Request $request)
    {
        $ids = $request->input('id');
        $log = TblLogctrl::whereIn('ID_LOGCTRL', $ids);
        if($log->delete())
        {
            echo 'Xóa thành công';
        }
    }
}
