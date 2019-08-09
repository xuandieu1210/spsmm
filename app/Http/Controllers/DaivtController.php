<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblDaivt;
use App\Models\TblDonvi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DaivtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $daivt = TblDaivt::orderBy('ID_DAI', 'ASC')->get();

        return Datatables::of($daivt)->addColumn('action', function ($daivt) {
            return '
            <a href="'. url('/daivt/' . $daivt->ID_DAI).'" title="Xem"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url('/daivt/' . $daivt->ID_DAI . '/edit') .'" title="Sửa"><button ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/daivt' . '/' . $daivt->ID_DAI) .'" accept-charset="UTF-8" style="display:inline">
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
        return view('daivt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $donvis = TblDonvi::all();
        return view('daivt.create', ['donvis' => $donvis]);
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
        
        TblDaivt::create($requestData);

        return redirect('daivt')->with('flash_message', 'TblDaivt added!');
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
        $daivt = TblDaivt::findOrFail($id);

        return view('daivt.show', compact('daivt'));
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
        $daivt = TblDaivt::findOrFail($id);

        return view('daivt.edit', ['donvis' => $donvis, 'daivt' => $daivt]);
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
        
        $daivt = TblDaivt::findOrFail($id);
        $daivt->update($requestData);

        return redirect('daivt')->with('flash_message', 'TblDaivt updated!');
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
        TblDaivt::destroy($id);

        return redirect('daivt')->with('flash_message', 'TblDaivt deleted!');
    }
}
