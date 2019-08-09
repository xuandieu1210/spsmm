<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblNhompi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NhompiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $nhompi = TblNhompi::get();

        return Datatables::of($nhompi)->addColumn('action', function ($nhompi) {
            return '
            <a href="'. url('/nhompi/' . $nhompi->ID_NHOMPI).'" title="Xem"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url('/nhompi/' . $nhompi->ID_NHOMPI . '/edit') .'" title="Sửa"><button><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/nhompi' . '/' . $nhompi->ID_NHOMPI) .'" accept-charset="UTF-8" style="display:inline">
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

        return view('nhompi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nhompi.create');
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
        
        TblNhompi::create($requestData);

        return redirect('nhompi')->with('flash_message', 'TblNhompi added!');
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
        $nhompi = TblNhompi::findOrFail($id);

        return view('nhompi.show', compact('nhompi'));
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
        $nhompi = TblNhompi::findOrFail($id);

        return view('nhompi.edit', compact('nhompi'));
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
        
        $nhompi = TblNhompi::findOrFail($id);
        $nhompi->update($requestData);

        return redirect('nhompi')->with('flash_message', 'TblNhompi updated!');
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
        TblNhompi::destroy($id);

        return redirect('nhompi')->with('flash_message', 'TblNhompi deleted!');
    }
}
