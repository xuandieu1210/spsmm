<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblNhanvien;
use App\Models\TblDaivt;
use App\Models\TblDonvi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $nhanvien = TblNhanvien::orderBy('ID_DAI', 'ASC')->with('tbl_daivt', 'tbl_donvi')->get();

        return Datatables::of($nhanvien)->addColumn('action', function ($nhanvien) {
            return '
            <a href="'. url('/nhanvien/' . $nhanvien->ID_NHANVIEN).'" title="Xem"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url('/nhanvien/' . $nhanvien->ID_NHANVIEN . '/edit') .'" title="Sửa"><button ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/nhanvien' . '/' . $nhanvien->ID_NHANVIEN) .'" accept-charset="UTF-8" style="display:inline">
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
        return view('nhanvien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tram = TblDaivt::all();
        $donvi = TblDonvi::all();
        return view('nhanvien.create', ['tram' => $tram, 'donvi' => $donvi]);
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
        
        TblNhanvien::create($requestData);

        return redirect('nhanvien')->with('flash_message', 'TblNhanvien added!');
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
        $nhanvien = TblNhanvien::with('tbl_daivt', 'tbl_donvi')->findOrFail($id);

        return view('nhanvien.show', compact('nhanvien'));
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
        $tram = TblDaivt::all();
        $donvi = TblDonvi::all();
        $nhanvien = TblNhanvien::findOrFail($id);

        return view('nhanvien.edit', ['tram' => $tram, 'donvi' => $donvi, 'nhanvien' => $nhanvien]);
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
        
        $nhanvien = TblNhanvien::findOrFail($id);
        $nhanvien->update($requestData);

        return redirect('nhanvien')->with('flash_message', 'TblNhanvien updated!');
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
        TblNhanvien::destroy($id);

        return redirect('nhanvien')->with('flash_message', 'TblNhanvien deleted!');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = TblNhanvien::select('ID_NHANVIEN', DB::raw('CONCAT(MA_NHANVIEN, " - ", TEN_NHANVIEN) AS NHANVIEN'))
            ->where("MA_NHANVIEN","LIKE","%{$request->get('term')}%")
            ->orWhere("TEN_NHANVIEN","LIKE","%{$request->get('term')}%")
            ->get();
            // foreach ($nhanviens as $nhanvien)
            // {
            //     $data[] = $nhanvien->MA_NHANVIEN.' - '.$nhanvien->TEN_NHANVIEN;
            // }
            return response()->json($data);;
        }
    }
}
