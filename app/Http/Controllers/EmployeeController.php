<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Accesslist;
use App\Door;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    function __construct()
    {
         $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','show']]);
         $this->middleware('permission:employee-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }



    public function index()
    {
        $employee = DB::table('employees')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('bloods', 'employees.blood_id', '=', 'bloods.id')
        ->where('employees.card_type', 'Access')
        ->select('employees.*','departments.name as dept', 'bloods.name as blood')
        ->get();

        $access_card = DB::table('access_cards')
        ->get();

        $accesslists = Accesslist::all();
        $doors = Door::all();
        
        return view('employee.index',compact('employee', 'access_card', 'doors', 'accesslists'));
    }

    public function access_card(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $input = $request->all();
        $employee_id = $input['employee_id'];
        $card_number = $input['card_number'];

        if ($request->has('prv_status')) {
            $prv_status = $input['prv_status'];

            $prv_card_id = DB::table('access_cards')
            ->where('employee_id', $employee_id)
            ->where('status', 'Using')
            ->get()
            ->first();
        }
        

        $insert = DB::table('access_cards')->insert([
            ['employee_id' => $employee_id, 'card_number' => $card_number, 'created_at' => $now ]
        ]);

        if ($insert) {


            $updateEmployee = DB::table('employees')
                ->where('id', $employee_id)
                ->update(['status' => 'Not Printed']);



            if (!empty($prv_card_id)) {

                $update = DB::table('access_cards')
                ->where('id', $prv_card_id->id)
                ->update(['status' => $prv_status]);

                if ($update) {

                    return redirect()->route('employee.index')
                            ->with('success','Card issued successfully');
                }
                
            }else{
                return redirect()->route('employee.index')
                        ->with('success','New Card issued successfully');
            }

            
        }else{
            return redirect()->route('employee.index')
                    ->with('error','Something else');
        }



    }

    public function nonaccess()
    {
        $employee = DB::table('employees')
        ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftJoin('bloods', 'employees.blood_id', '=', 'bloods.id')
        ->where('employees.card_type', 'NonAccess')
        ->select('employees.*','departments.name as dept', 'bloods.name as blood')
        ->get();

        $access_card = DB::table('access_cards')
        ->get();


        
        return view('employee.nonaccess_index',compact('employee', 'access_card'));
    }


    public function nonaccess_create()
    {
        $departments = DB::table('departments')
            ->pluck('name', 'id');

        $bloods = DB::table('bloods')
            ->pluck('name', 'id');
        return view('employee.nonaccess_create',compact('departments', 'bloods'));
    }


    public function nonaccess_edit($id)
    {
        $employee = Employee::find($id);

        $departments = DB::table('departments')->pluck('name', 'id')->all();;

        $bloods = DB::table('bloods')->pluck('name', 'id')->all();

        $employeeDepartment = $employee->department_id;
        $employeeBlood = $employee->blood_id;
        $employeeStatus = $employee->status;

        return view('employee.nonaccess_edit',compact('employee','departments','bloods','employeeDepartment','employeeBlood', 'employeeStatus'));
    }




    public function service()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = DB::table('departments')
            ->pluck('name', 'id');

        $bloods = DB::table('bloods')
            ->pluck('name', 'id');
        return view('employee.create',compact('departments', 'bloods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|max:2048',
            'name' => 'required',
            'designation' => 'required',
            'mobile' => 'required',
            'employee_id' => 'required',
            'department_id' => 'required',
            'blood_id' => 'required'

        ]);

       
            $image = $request->file('image');
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $destinationPath = public_path('images/kyamch/employee');
            $image->move($destinationPath, $imageName);

            
            

            $input = $request->all();
            Arr::set($input, 'image', $imageName);


            $employee = Employee::create($input);

            if ($input['card_type'] == 'NonAccess') {

                return redirect()->route('nonaccess')
                        ->with('success','Data input successfully');
            }else{

                return redirect()->route('employee.index')
                        ->with('success','Data input successfully');

            }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeComtroller  $employeeComtroller
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeComtroller  $employeeComtroller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        $departments = DB::table('departments')->pluck('name', 'id')->all();

        $bloods = DB::table('bloods')->pluck('name', 'id')->all();

        $employeeDepartment = $employee->department_id;
        $employeeBlood = $employee->blood_id;
        $employeeStatus = $employee->status;

        return view('employee.edit',compact('employee','departments','bloods','employeeDepartment','employeeBlood', 'employeeStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeComtroller  $employeeComtroller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'mobile' => 'required',
            'employee_id' => 'required',
            'department_id' => 'required',
            'blood_id' => 'required'

        ]);

        $employee = Employee::find($id);
        $input = $request->all();

        if(!empty($request->file('image'))){

            $prvImage = public_path("images/kyamch/employee/{$employee->image}");
            if (File::exists($prvImage)) { 
                unlink($prvImage);
            } 



            $image = $request->file('image');
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $destinationPath = public_path('images/kyamch/employee');
            $image->move($destinationPath, $imageName);

            Arr::set($input, 'image', $imageName);
        }else{
            $input = array_except($input,array('image'));    
        }

            $employee = Employee::find($id);
            $update = $employee->update($input);

            if ($input['card_type'] == 'NonAccess') {
               return redirect()->route('nonaccess')
                        ->with('success','Data updated successfully');
            }else{

                return redirect()->route('employee.index')
                        ->with('success','Data updated successfully');

            }

    }




    public function updatestatus(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $now = date('Y-m-d H:i:s');
        $employee = Employee::find($id);
        $input = $request->all();

        $update = $employee->update($input);

        if ($update) {

            if ($input['status'] == 'Printed') {
                if ($input['card_type'] == 'Access') {
                    $p_name = '0';
                }else{
                    $p_name = '1';
                }

                $e_id = $id;
                $qty = '1';
                $c_type = '0';
                $author = Auth::id();


                DB::table('consumptions')->insert(
                    ['name' => $p_name, 'employee_id' => $e_id, 'quentity' => $qty, 'consumption_type' => $c_type, 'author' => $author, 'created_at' => $now]
                );
                
            }

            if ($input['card_type'] == 'NonAccess') {
               return redirect()->route('nonaccess')
                        ->with('success','Status updated successfully');
            }else{

                return redirect()->route('employee.index')
                        ->with('success','Status updated successfully');

            }            
        }else{
            return redirect()->route('employee.index')
                    ->with('error','Something else');
        }



    }










    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeComtroller  $employeeComtroller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!empty($employee->image)) {
           $prvImage = public_path("images/kyamch/employee/{$employee->image}");

           File::exists($prvImage);
            unlink($prvImage);
        }

        $employee->delete();

        if ($employee['card_type'] == 'NonAccess') {
            return redirect()->route('nonaccess')
                ->with('success','Data deleted successfully');
        }else{

            return redirect()->route('employee.index')
                ->with('success','Data deleted successfully');

        }

        
    }
}
