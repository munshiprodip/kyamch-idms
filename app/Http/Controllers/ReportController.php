<?php

namespace App\Http\Controllers;

use App\Consumption;
use App\Door;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Product;
use DateTime;
use PDF;
use DB;
class ReportController extends Controller
{
    public function inventory_report()
    {
        return view('report.product');
    }

    public function inventory_report_view(Request $request)
    {

        $input = $request->all();
        $from = $input['fromdate'];
        $to = $input['todate'];



        $product_type = $input['product_type'];

        if ($product_type=='all'){
            $products= Product::whereBetween('created_at', [$from, $to])->get();
        }elseif ($product_type==0){
            $products = Product::where('name', 0)
                ->whereBetween('created_at', [$from, $to])
                ->get();
        }elseif ($product_type==1){
            $products = Product::where('name', 1)
                ->whereBetween('created_at', [$from, $to])
                ->get();
        }





        $pdf = PDF::loadView('report.product_view',['products' => $products] );
        return $pdf->stream('ProductList.pdf');
    }

    public function consumption_report_view(Request $request)
    {

        $input = $request->all();
        $from = $input['fromdate'];
        $to = $input['todate'];
        $consumption_type = $input['consumption_type'];



        $product_type = $input['product_type'];

        if ($product_type=='all'){
            $consumptions= Consumption::leftJoin('employees', 'consumptions.employee_id', '=', 'employees.id')
                ->whereBetween('consumptions.created_at', [$from, $to])
                ->where('consumptions.consumption_type', $consumption_type)
                ->select('consumptions.*','employees.employee_id as e_id')
                ->get();
        }elseif ($product_type==0){
            $consumptions = Consumption::leftJoin('employees', 'consumptions.employee_id', '=', 'employees.id')
                ->whereBetween('consumptions.created_at', [$from, $to])
                ->where('consumptions.consumption_type', $consumption_type)
                ->where('consumptions.name', 0)
                ->select('consumptions.*','employees.employee_id as e_id')
                ->get();
        }elseif ($product_type==1){
            $consumptions = Consumption::leftJoin('employees', 'consumptions.employee_id', '=', 'employees.id')
                ->whereBetween('consumptions.created_at', [$from, $to])
                ->where('consumptions.consumption_type', $consumption_type)
                ->where('consumptions.name', 1)
                ->select('consumptions.*','employees.employee_id as e_id')
                ->get();
        }





        $pdf = PDF::loadView('report.consumption_view',['consumptions' => $consumptions] );
        return $pdf->stream('omsumptionList.pdf');
    }

//==========Gatepass==========================================

    public function gatepass_report()
    {
        $employees = Employee::where('card_type', 'Access')
            ->pluck('employee_id', 'id')->all();
        $doors = Door::pluck('name', 'id')->all();

        return view('report.door',compact('employees', 'doors'));
    }


    public function doorwise_report_view(Request $request)
    {

        $input = $request->all();
        $id = $input['door_id'];

        $employees = DB::table('accesslists')
            ->leftJoin('employees', 'employees.id', '=', 'accesslists.employee_id')
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
            ->where('accesslists.door_id', $id)
            ->select('employees.*','departments.name as dept')
            ->get();




        $pdf = PDF::loadView('report.door_wise_view',['employees' => $employees] );
        return $pdf->stream('AccessEmployeeList.pdf');
    }


    public function employeewise_report_view(Request $request)
    {

        $input = $request->all();
        $id = $input['employee_id'];

        $doors = DB::table('accesslists')
            ->leftJoin('doors', 'doors.id', '=', 'accesslists.door_id')
            ->where('accesslists.employee_id', $id)
            ->select('doors.*')
            ->get();




        $pdf = PDF::loadView('report.employee_wise_view',['doors' => $doors] );
        return $pdf->stream('PermitedDoorList.pdf');
    }
}
