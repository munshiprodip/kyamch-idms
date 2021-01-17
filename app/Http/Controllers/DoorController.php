<?php

namespace App\Http\Controllers;

use App\Door;
use Illuminate\Http\Request;

class DoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:door-list|door-create|door-edit|door-delete', ['only' => ['index','show']]);
        $this->middleware('permission:door-create', ['only' => ['create','store']]);
        $this->middleware('permission:door-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:door-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $doors    = Door::all();
        return view('door.index',compact('doors'));
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
        Door::create($request->all());


        return redirect()->route('door.index')
            ->with('success','Door added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function show(Door $door)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function edit(Door $door)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Door $door)
    {
        request()->validate([
            'name' => 'required',
        ]);


        $door->update($request->all());


        return redirect()->route('door.index')
            ->with('success','Door update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function destroy(Door $door)
    {
        $door->delete();


        return redirect()->route('door.index')
            ->with('success','Door deleted successfully');
    }
}
