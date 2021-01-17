<?php

namespace App\Http\Controllers;

use App\Consumption;
use App\User;
use App\Employee;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()
    {
         $this->middleware('permission:consumption-list|consumption-create|consumption-edit|consumption-delete', ['only' => ['index','show']]);
         $this->middleware('permission:consumption-create', ['only' => ['create','store']]);
         $this->middleware('permission:consumption-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:consumption-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $users = User::all();
        $employees = Employee::all();
        $consumptions = Consumption::all();
        return view('consumption.index',compact('consumptions', 'users', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('consumption.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'employee_id' => 'required',
            'quentity' => 'required',
        ]);


        Consumption::create($request->all());


        return redirect()->route('consumptions.index')
                        ->with('success','Consumption created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function show(consumption $consumption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumption $consumption)
    {
        $employees = Employee::all();
        return view('consumption.edit', compact('consumption', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumption $consumption)
    {
        request()->validate([
            'name' => 'required',
            'employee_id' => 'required',
            'quentity' => 'required',
        ]);


        $consumption->update($request->all());


        return redirect()->route('consumptions.index')
                        ->with('success','Consumption updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function destroy(consumption $consumption)
    {
        //
    }
}
