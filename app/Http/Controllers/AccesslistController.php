<?php

namespace App\Http\Controllers;
use DB;
use App\Accesslist;
use Illuminate\Http\Request;

class AccesslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:accesslist-list|accesslist-create|accesslist-edit|accesslist-delete', ['only' => ['index','show']]);
         $this->middleware('permission:accesslist-create', ['only' => ['create','store']]);
         $this->middleware('permission:accesslist-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:accesslist-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $accesslist = Accesslist::all();
        return view('accesslist.index',compact('accesslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

$employee_id = $request->employee_id;

$accesslist = DB::table('accesslists')->where('employee_id', '=', $employee_id)->delete();


$door_id = $request->door_id;

foreach($door_id as $key => $val)
{
    $input['employee_id'] = $employee_id;
    $input['door_id'] = $val;

    Accesslist::create($input);

}

        return redirect()->route('employee.index')
                        ->with('success','Gate pass record successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accesslist  $accesslist
     * @return \Illuminate\Http\Response
     */
    public function show(Accesslist $accesslist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accesslist  $accesslist
     * @return \Illuminate\Http\Response
     */
    public function edit(Accesslist $accesslist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accesslist  $accesslist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accesslist $accesslist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accesslist  $accesslist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accesslist $accesslist)
    {
        //
    }
}
