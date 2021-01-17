<?php

namespace App\Http\Controllers;

use App\Servicecard;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicecardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:servicecard-list|servicecard-create|servicecard-edit|servicecard-delete', ['only' => ['index','show']]);
         $this->middleware('permission:servicecard-create', ['only' => ['create','store']]);
         $this->middleware('permission:servicecard-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:servicecard-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $access_card_services = DB::table('access_card_services')
            ->get();

        $servicecards = DB::table('servicecards')
        ->leftJoin('departments', 'servicecards.department_id', '=', 'departments.id')
        ->select('servicecards.*','departments.name as dept')
        ->get();
        return view('servicecard.index',compact('servicecards', 'access_card_services'));
    }




    public function access_card_service(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $input = $request->all();
        $service_id = $input['service_id'];
        $card_number = $input['card_number'];

        if ($request->has('prv_status')) {
            $prv_status = $input['prv_status'];

            $prv_card_id = DB::table('access_card_services')
                ->where('service_id', $service_id)
                ->where('status', 'Using')
                ->get()
                ->first();
        }


        $insert = DB::table('access_card_services')->insert([
            ['service_id' => $service_id, 'card_number' => $card_number, 'created_at' => $now ]
        ]);

        if ($insert) {


            $updateService = DB::table('servicecards')
                ->where('id', $service_id)
                ->update(['status' => 'Not Printed']);



            if (!empty($prv_card_id)) {

                $update = DB::table('access_card_services')
                    ->where('id', $prv_card_id->id)
                    ->update(['status' => $prv_status]);

                if ($update) {

                    return redirect()->route('servicecard.index')
                        ->with('success','Card issued successfully');
                }

            }else{
                return redirect()->route('servicecard.index')
                    ->with('success','New Card issued successfully');
            }


        }else{
            return redirect()->route('employee.index')
                ->with('error','Something else');
        }


    }


    public function updatestatus_service(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $now = date('Y-m-d H:i:s');
        $service = Servicecard::find($id);
        $input = $request->all();

        $update = $service->update($input);

        if ($update) {

            if ($input['status'] == 'Printed') {
                if ($input['card_type'] == 'Access') {
                    $p_name = '0';
                }else{
                    $p_name = '1';
                }

                $s_id = $id;
                $qty = '1';
                $c_type = '0';
                $author = Auth::id();


                DB::table('consumption_services')->insert(
                    ['name' => $p_name, 'service_id' => $s_id, 'quentity' => $qty, 'author' => $author, 'created_at' => $now]
                );

            }

        return redirect()->route('servicecard.index')
             ->with('success','Status updated successfully');

        }else{
            return redirect()->route('employee.index')
                ->with('error','Something else');
        }



    }





    public function create()
    {
        $departments = DB::table('departments')->pluck('name', 'id')->all();;
        return view('servicecard.create', compact('departments'));
    }






    public function store(Request $request)
    {
        request()->validate([
            'service_id' => 'required',
        ]);


        Servicecard::create($request->all());


        return redirect()->route('servicecard.index')
            ->with('success','Service Card created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicecard  $servicecard
     * @return \Illuminate\Http\Response
     */
    public function show(Servicecard $servicecard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicecard  $servicecard
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicecard $servicecard)
    {

        $departments = DB::table('departments')->pluck('name', 'id')->all();
        $servicecardDepartment = $servicecard->department_id;


        return view('servicecard.update',compact('servicecard','departments','servicecardDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicecard  $servicecard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicecard $servicecard)
    {
        request()->validate([
            'service_id' => 'required',
        ]);


        $servicecard->update($request->all());


        return redirect()->route('servicecard.index')
            ->with('success','Service card updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicecard  $servicecard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicecard $servicecard)
    {
        //
    }
}
