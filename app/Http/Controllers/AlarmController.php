<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TblAlarm;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AlarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $alarm = TblAlarm::orderBy('ID_ALARM', 'ASC')->get();

        return Datatables::of($alarm)->addColumn('action', function ($alarm) {
            return '
            <a href="'. url("/alarm/" . $alarm->ID_ALARM).'" title="Xem"><button ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
            <a href="'. url("/alarm/" . $alarm->ID_ALARM . '/edit') .'" title="Sửa"><button ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            <form method="POST" action="'. url('/alarm' . '/' . $alarm->ID_ALARM) .'" accept-charset="UTF-8" style="display:inline">
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
        $alarm = TblAlarm::orderBy('ID_ALARM', 'ASC')->get();

        return view('alarm.index', compact('alarm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('alarm.create');
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
        TblAlarm::create($requestData);

        return redirect('alarm')->with('flash_message', 'TblAlarm added!');
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
        $alarm = TblAlarm::findOrFail($id);

        return view('alarm.show', compact('alarm'));
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
        $alarm = TblAlarm::findOrFail($id);

        return view('alarm.edit', compact('alarm'));
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
        
        $alarm = TblAlarm::findOrFail($id);
        $alarm->update($requestData);

        return redirect('alarm')->with('flash_message', 'TblAlarm updated!');
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
        TblAlarm::destroy($id);

        return redirect('alarm')->with('flash_message', 'TblAlarm deleted!');
    }
}
