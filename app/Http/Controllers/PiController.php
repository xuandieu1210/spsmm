<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblPi;
use App\Models\TblNhanvien;
use App\Models\TblDaivt;
use App\Models\TblNhompi;
use Illuminate\Http\Request;
use App\Models\TblParam;
use Yajra\DataTables\DataTables;

class PiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $pi = TblPi::with('tbl_nhompi', 'tbl_nhanvien', 'tbl_daivt')->get();

        return Datatables::of($pi)->addColumn('action', function ($pi) {
            if ($pi->START_UP == 1) {
                $class = "fa fa-toggle-on";
                $title = "Ngắt kết nối";
            } else {
                $class = "fa fa-toggle-off";
                $title = "Kết nối";
            }
            return '
            <a href="'. url('/pi/' . $pi->ID_PI).'" title="View"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="#" title="Ping"><button  ><i onclick="ping(this)" id= "ping" class="fa fa-wifi" aria-hidden="true" value="'.$pi->ID_PI.'"></i></button></a>
            <a href="#" title="Auto Control"><button ><i onclick="resetParam(this)" class="fa fa-gears" aria-hidden="true" value="'.$pi->ID_PI.'"></i></button></a>
            <a href="#" class="conect_title" title="'.$title.'"><button  ><i onclick="active(this)" class="'.$class.'" aria-hidden="true" value="'.$pi->ID_PI.'"></i></button</a>
            <form method="POST" action="'. url('/pi' . '/' . $pi->ID_PI) .'" accept-charset="UTF-8" style="display:inline">
                '. method_field('DELETE').'
                '. csrf_field().'
                <button type="submit" title="Delete điều khiển" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
        return view('pi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $nhomPi =  TblNhompi::select('ID_NHOMPI', 'TEN_NHOMPI')->get();
        $daiVt =  TblDaivt::select('ID_DAI', 'TEN_DAIVT')->get();
        return view('pi.create', ['nhomPi' => $nhomPi, 'daiVt' => $daiVt]);
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
        
        TblPi::create($requestData);

        return redirect('pi')->with('flash_message', 'TblPi added!');
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
        $pi = TblPi::with('tbl_daivt', 'tbl_nhanvien', 'tbl_nhompi')->findOrFail($id);

        return view('pi.show', compact('pi'));
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
        $nhomPi =  TblNhompi::select('ID_NHOMPI', 'TEN_NHOMPI')->get();
        $daiVt =  TblDaivt::select('ID_DAI', 'TEN_DAIVT')->get();
        $pi = TblPi::findOrFail($id);

        return view('pi.edit', compact('pi', 'daiVt', 'nhomPi'));
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
        
        $pi = TblPi::findOrFail($id);
        $pi->update($requestData);

        return redirect('pi')->with('flash_message', 'TblPi updated!');
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
        TblPi::destroy($id);

        return redirect('pi')->with('flash_message', 'TblPi deleted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function ping(Request $request)
    {
        $id = $request->input('ID_PI');
        $pi = TblPi::where('ID_PI', '=', $id)->get(); $pi =$pi[0];
        $ip =  $pi->IP_ADDR;
        $namepi =  $pi->TEN_PI;
        $sts = 1;
        $msg = "Kết nối OK! Thiết bị: $namepi - IP: $ip ";
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $fP = @fsockopen($ip, 22, $errno, $errstr, 3);
            if (!$fP){                      
                $sts = 0;
                $msg = "Không kết nối! Thiết bị: $namepi - IP: $ip";
            }                    
        }
        else{                
            $exec_string = 'ping -c 5 '.$ip;                
            $pingt = exec($exec_string, $output, $status);
            if ($status != 0) {
                $sts = 0;
                $msg = "Không kết nối! Thiết bị: $namepi - IP: $ip";
            }                                        
        }           
            $pi->S_CONNECT = $sts;
            $pi->save();
        return $msg;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function resetParam(Request $request)
    {
        $id = $request->input('ID_PI');
        $requestParam = [];
        $para = 'CTRL';
        $modelpara = TblParam::where('ID_PI', $id)->where('MA_PARAM', $para)->get();
        $modelpara = $modelpara[0];                                                 
        if(!empty($modelpara)){                                                            
            $arr_para=  json_decode($modelpara['FILE_PARAM'],true); 
            foreach ($arr_para['CTRLPARAMS']['OUT_CTRLS'] as $key => $value) { 
                if (array_key_exists('CONDITIONS', $value)) { 
                    $arr_para['CTRLPARAMS']['OUT_CTRLS'][$key]['ENABLE'] = 1;
                    $arr_para['CTRLPARAMS']['OUT_CTRLS'][$key]['AUTO'] = 1;
                }                                
            }
            $requestParam['FILE_PARAM'] = json_encode($arr_para);
            if ($modelpara->update($requestParam)){                             
                echo 'Điều khiển tự động theo thiết lập ban đầu!';                             
            }   
            else{
                echo 'Có lỗi xử lý dữ liệu!'; 
            }
        }                  
    }

    public function active(Request $request) 
    {
        $id = $request->input('ID_PI');
        $pi = TblPi::findOrFail($id);
        $para='UPDATE';
        $requestParam = [];
        $modelpara = TblParam::where('ID_PI', $id)->where('MA_PARAM', $para)->get(); 
        $modelpara = $modelpara[0]; 
        if ($pi['START_UP'] == 0) {                                               
            if($modelpara){                                                            
                $arr_para=  json_decode($modelpara['FILE_PARAM'],true); 
                $arr_para['UPDATEPARAMS']['ASSIGN']['STARTUP']=1;
                $arr_para['UPDATEPARAMS']['ASSIGN']['ENABLE_TEST']=0;                    
                $modelpara->FILE_PARAM = json_encode($arr_para);                
                $modelpara->save();                    
            }    
    
            $pi->START_UP = 1;
            if( $pi->save() ){
                return 1;
            }
        } else {
            if($modelpara){                                                            
                $arr_para=  json_decode($modelpara['FILE_PARAM'],true); 
                $arr_para['UPDATEPARAMS']['ASSIGN']['STARTUP']=0;
                $arr_para['UPDATEPARAMS']['ASSIGN']['ENABLE_TEST']=0;                    
                $modelpara->FILE_PARAM = json_encode($arr_para);                
                $modelpara->save();                    
            }  
            
            $pi->START_UP = 0;
            if( $pi->save() ){
                return 0;
            }
        }                     
    }
}
