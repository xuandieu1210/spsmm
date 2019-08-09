<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblDonvi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DonviController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $donvi = TblDonvi::join('tbl_donvi as captren', 'tbl_donvi.CAP_TREN', '=', 'captren.ID_DONVI')
        ->select('tbl_donvi.*', 'captren.TEN_DONVI as TEN_CAPTREN')
        ->get();

        return Datatables::of($donvi)->addColumn('action', function ($donvi) {
            return '
            <a href="'. url('/donvi/' . $donvi->ID_DONVI).'" title="Xem"><button><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url('/donvi/' . $donvi->ID_DONVI . '/edit') .'" title="Sửa"><button ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/donvi' . '/' . $donvi->ID_DONVI) .'" accept-charset="UTF-8" style="display:inline">
                '. method_field('DELETE').'
                '. csrf_field().'
                <button type="submit"  title="Xóa" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

        return view('donvi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $donvis = TblDonvi::all();
        return view('donvi.create', ['donvis' => $donvis]);
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
        
        $data = request()->all();
        TblDonvi::create($data);
        $donvis = TblDonvi::join('tbl_donvi as captren', 'tbl_donvi.CAP_TREN', '=', 'captren.ID_DONVI')
        ->select('tbl_donvi.*', 'captren.TEN_DONVI as TEN_CAPTREN')
        ->get();
        return view('donvi.index', ['donvis' => $donvis])->with('flash_message', 'TblDonvi added!');
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
        $donvi = TblDonvi::join('tbl_donvi as captren', 'tbl_donvi.CAP_TREN', '=', 'captren.ID_DONVI')
        ->select('tbl_donvi.*', 'captren.TEN_DONVI as TEN_CAPTREN')
        ->findOrFail($id);
        return view('donvi.show', compact('donvi'));
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
        $donvis = TblDonvi::all();
        $donvi = TblDonvi::find($id);
        return view('donvi.edit', ['donvi' => $donvi, 'donvis' => $donvis]);
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
        
        $donvi = TblDonvi::findOrFail($id);
        $donvi->update($requestData);
        $donvis = TblDonvi::join('tbl_donvi as captren', 'tbl_donvi.CAP_TREN', '=', 'captren.ID_DONVI')
        ->select('tbl_donvi.*', 'captren.TEN_DONVI as TEN_CAPTREN')
        ->get();
        return view('donvi.index', ['donvis' => $donvis])->with('flash_message', 'TblDonvi updated!');
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
        TblDonvi::destroy($id);

        return redirect('donvi')->with('flash_message', 'TblDonvi deleted!');
    }
}
