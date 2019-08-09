<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblLogalarm;
use App\Models\TblLogsnsr;
use App\Models\TblLogalarm16;
use App\Models\TblLogctrl;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class LogalarmController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $logalarm = TblLogalarm::with('tbl_pi', 'tbl_alarm')->orderBy('ID_LOGALARM', 'DESC')->limit(1000)->get();

        return Datatables::of($logalarm)->addColumn('action', function ($logalarm) {
            return '
            <form method="POST" action="'. url('/logalarm' . '/' . $logalarm->ID_LOGALARM) .'" accept-charset="UTF-8" style="display:inline">
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
        return view('logalarm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('logalarm.create');
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
        
        TblLogalarm::create($requestData);

        return redirect('logalarm')->with('flash_message', 'TblLogalarm added!');
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
        $logalarm = TblLogalarm::findOrFail($id);

        return view('logalarm.show', compact('logalarm'));
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
        $logalarm = TblLogalarm::findOrFail($id);

        return view('logalarm.edit', compact('logalarm'));
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
        
        $logalarm = TblLogalarm::findOrFail($id);
        $logalarm->update($requestData);

        return redirect('logalarm')->with('flash_message', 'TblLogalarm updated!');
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
        TblLogalarm::destroy($id);

        return redirect('logalarm')->with('flash_message', 'TblLogalarm deleted!');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMulti(Request $request)
    {
        $ids = $request->input('id');
        $log = TblLogalarm::whereIn('ID_LOGALARM', $ids);
        if($log->delete())
        {
            echo 'Xóa thành công';
        }
    }

    public function actionShowlog(Request $request)
    {   
        if ($request->input('id') != ''){
            $id = $request->input('id');
            $para = $request->input('param');                       
            
            switch($para) {                
            case 'SNSR': 
                $logsnsr = TblLogsnsr::where('ID_PI', '=', $id)->orderBy('ID_LOGSNSR', 'DESC')->limit(1)->get();
                if(!empty($logsnsr[0])){                              
                    return Response::json($logsnsr[0]);
                }
                break;
            case 'CTRL': 
                $ctrl = TblLogctrl::where('ID_PI', '=', $id)->orderBy('ID_LOGCTRL', 'DESC')->limit(1)->get();
                if(!empty($ctrl[0])){                              
                    return Response::json($ctrl[0]);
                }
                
                break;
            case 'ALARM16': 
                $logalarm16 = TblLogalarm16::join('tbl_param', function ($join) {
                    $join->on('tbl_param.ID_PI', '=', 'tbl_logalarm16.ID_PI')
                         ->where('tbl_param.MA_PARAM', '=', 'ALARM');
                })->where('tbl_logalarm16.ID_PI', '=', $id)->select('tbl_logalarm16.*', 'tbl_param.FILE_PARAM')->orderBy('tbl_logalarm16.ID_LOGALARM16', 'DESC')->limit(1)->get();
                if(!empty($logalarm16[0])){          
                    $arr_para =  json_decode($logalarm16[0]['FILE_PARAM'],true); 
                    $arr_para = $arr_para['ALARMPARAMS']['IN_ALARMS'];                      
                    return Response::json($logalarm16[0]);
                }
                break;
            default:
               
            }                           
        }                        
        
    }

    public function getDataAlarm()
    {
        if ($arr_para[])
    }
}
