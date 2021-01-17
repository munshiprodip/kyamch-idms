<?php

namespace App\Http\Controllers;

use App\Blood;
use Illuminate\Http\Request;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:blood-list|blood-create|blood-edit|blood-delete', ['only' => ['index','show']]);
        $this->middleware('permission:blood-create', ['only' => ['create','store']]);
        $this->middleware('permission:blood-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blood-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $bloods    = Blood::all();
        return view('blood.index',compact('bloods'));
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
        request()->validate([
            'name' => 'required',
        ]);
        Blood::create($request->all());


        return redirect()->route('blood.index')
            ->with('success','Blood group added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function show(Blood $blood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function edit(Blood $blood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blood $blood)
    {
        request()->validate([
            'name' => 'required',
        ]);


        $blood->update($request->all());


        return redirect()->route('blood.index')
            ->with('success','Blood group update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blood  $blood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blood $blood)
    {
        $blood->delete();


        return redirect()->route('blood.index')
            ->with('success','Blood group deleted successfully');
    }
}
