<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblParam;
use App\Models\TblPi;
use App\Models\TblModule;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $param = TblParam::with('tbl_module', 'tbl_pi')->get();

        return Datatables::of($param)->addColumn('action', function ($param) {
            return '
            <a href="'. url('/param/' . $param->ID_PARAM).'" title="Xem"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url('/param/' . $param->ID_PARAM . '/edit') .'" title="Sửa"><button ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/param' . '/' . $param->ID_PARAM) .'" accept-charset="UTF-8" style="display:inline">
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
        return view('param.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('param.create');
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
        $requestData['FILE_PARAM'] =  file_get_contents($request['FILE_PARAM']);
        TblParam::create($requestData);

        return redirect('param')->with('flash_message', 'TblParam added!');
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
        $param = TblParam::with('tbl_module', 'tbl_pi')->findOrFail($id);

        return view('param.show', compact('param'));
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
        $param = TblParam::with('tbl_module', 'tbl_pi')->findOrFail($id);

        return view('param.edit', compact('param'));
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
        if (isset($requestData['FILE_PARAM'])) {
            $requestData['FILE_PARAM'] =  file_get_contents($requestData['FILE_PARAM']);
        }

        $piId = TblPi::where('TEN_PI', '=', $requestData['ID_PI'])->get('ID_PI');
        $moduleId = TblModule::where('MA_MODULE', '=', $requestData['ID_MODULE'])->get('ID_MODULE');
        
        if (!$piId || !$moduleId) {
            return redirect('param');
        } else {
            $requestData['ID_MODULE'] = $moduleId[0]['ID_MODULE'];
            $requestData['ID_PI'] = $piId[0]['ID_PI'];
        }
        
        $param = TblParam::findOrFail($id);
        $param->update($requestData);

        return redirect('param')->with('flash_message', 'TblParam updated!');
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
        TblParam::destroy($id);

        return redirect('param')->with('flash_message', 'TblParam deleted!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByPiId(Request $request)
    {
        $id = $request->input('id');
        //$maParam = $request->input('maParam');
        $param = TblParam::where('ID_PARAM', '=', $id)->get();
        
        return Response::json($param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAjax(Request $request)
    {
        
        //$id = $request->input('id');
       // return $request->input('FILE_PARAM');
       $requestData['FILE_PARAM'] = [];
        if ($request->input('FILE_PARAM') !=  null) {
            $requestData['FILE_PARAM'] =  file_get_contents($request->input('FILE_PARAM'));
        } else {
            $requestData['FILE_PARAM'] = $request->input('THAM_SO_TEXT');
        }
        $requestData['ACTIVE_PARAM'] = $request->input('ACTIVE_PARAM');
        $requestData['ACTIVE_MODULE'] = $request->input('ACTIVE_MODULE');
        // $piId = TblPi::where('TEN_PI', '=', $requestData['ID_PI'])->get('ID_PI');
        // $moduleId = TblModule::where('MA_MODULE', '=', $requestData['ID_MODULE'])->get('ID_MODULE');
        
        // if (!$piId || !$moduleId) {
        //     return redirect('param');
        // } else {
        //     $requestData['ID_MODULE'] = $moduleId[0]['ID_MODULE'];
        //     $requestData['ID_PI'] = $piId[0]['ID_PI'];
        // }

        $param = TblParam::findOrFail($request->input('ID_PARAM'));
        $param->update($requestData);
        {
            echo 'Sửa thành công';
        }
        // return redirect('param')->with('flash_message', 'TblParam updated!');
    }
}
