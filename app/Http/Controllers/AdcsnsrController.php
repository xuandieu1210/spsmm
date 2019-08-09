<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblAdcsnsr;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdcsnsrController extends Controller
{
    public function getData()
    {
        $adcsnsr = TblAdcsnsr::get();

        return Datatables::of($adcsnsr)->addColumn('action', function ($adcsnsr) {
            return '
            <a href="'. url("/adcsnsr/" . $adcsnsr->ID_ADCSNSR).'" title="Xem"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url("/adcsnsr/" . $adcsnsr->ID_ADCSNSR . '/edit') .'" title="Sửa"><button ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/adcsnsr' . '/' . $adcsnsr->ID_ADCSNSR) .'" accept-charset="UTF-8" style="display:inline">
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
        return view('adcsnsr.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('adcsnsr.create');
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
        
        TblAdcsnsr::create($requestData);

        return redirect('adcsnsr')->with('flash_message', 'TblAdcsnsr added!');
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
        $adcsnsr = TblAdcsnsr::findOrFail($id);

        return view('adcsnsr.show', compact('adcsnsr'));
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
        $adcsnsr = TblAdcsnsr::findOrFail($id);

        return view('adcsnsr.edit', compact('adcsnsr'));
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
        
        $adcsnsr = TblAdcsnsr::findOrFail($id);
        $adcsnsr->update($requestData);

        return redirect('adcsnsr')->with('flash_message', 'TblAdcsnsr updated!');
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
        TblAdcsnsr::destroy($id);

        return redirect('adcsnsr')->with('flash_message', 'TblAdcsnsr deleted!');
    }
}
