<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Product;
use App\Consumption;
use App\Servicecard;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = Employee::all();
        $access_employee = Employee::where('card_type', 'Access')->get();
        $nonaccess_employee = Employee::where('card_type', 'NonAccess')->get();

        $pending_issue = Employee::where('status', 'Issue card')->get();
        $pending_print_access = Employee::where('status', 'Not Printed')->where('card_type', 'Access')->get();
        $pending_print_nonaccess = Employee::where('status', 'Not Printed')->where('card_type', 'NonAccess')->get();
        $pending_delivery_access = Employee::where('status', 'Printed')->where('card_type', 'Access')->get();
        $pending_delivery_nonaccess = Employee::where('status', 'Printed')->where('card_type', 'NonAccess')->get();


        $total_employee = $employee->count();
        $total_access_employee = $access_employee->count();
        $total_nonaccess_employee = $nonaccess_employee->count();

        $total_pending_issue = $pending_issue->count();
        $total_pending_print_access = $pending_print_access->count();
        $total_pending_print_nonaccess = $pending_print_nonaccess->count();
        $total_pending_delivery_access = $pending_delivery_access->count();
        $total_pending_delivery_nonaccess = $pending_delivery_nonaccess->count();


        $product = Product::all();
        $total_product_access = Product::where('name', '0')->sum('quentity');
        $total_product_nonaccess = Product::where('name', '1')->sum('quentity');

        $consumption = Consumption::all();
        $total_consumption_access = Consumption::where('name', '0')->sum('quentity');
        $total_consumption_nonaccess = Consumption::where('name', '1')->sum('quentity');

        $servicecard = Servicecard::all();
        $servicecard_total = $servicecard->count();


        $total_damage_access = Consumption::where('name', '0')->where('consumption_type', '1')->sum('quentity');
        $total_damage_nonaccess = Consumption::where('name', '1')->where('consumption_type', '1')->sum('quentity');

        $total_balance_access = $total_product_access - $total_consumption_access - $total_damage_access;
        $total_balance_nonaccess = $total_product_nonaccess - $total_consumption_nonaccess - $total_damage_nonaccess;



        $consumption_per_access = ($total_consumption_access * 100) / $total_product_access;
        $consumption_per_nonaccess = ($total_consumption_nonaccess * 100) / $total_product_nonaccess;



        $damage_per_access = ($total_damage_access * 100) / $total_product_access;
        $damage_per_nonaccess = ($total_damage_nonaccess * 100) / $total_product_nonaccess;


        $balence_per_access = ($total_balance_access * 100) / $total_product_access;
        $balence_per_nonaccess = ($total_balance_nonaccess * 100) / $total_product_nonaccess;


        return view('home', compact('total_employee', 'total_access_employee', 'total_nonaccess_employee', 'total_product_access', 'total_consumption_access', 'consumption_per_access', 'total_product_nonaccess', 'total_consumption_nonaccess', 'consumption_per_nonaccess', 'total_damage_access', 'total_damage_nonaccess', 'damage_per_access', 'damage_per_nonaccess', 'total_balance_access', 'total_balance_nonaccess', 'balence_per_access', 'balence_per_nonaccess', 'total_pending_issue', 'total_pending_print_access', 'total_pending_print_nonaccess', 'total_pending_delivery_access', 'total_pending_delivery_nonaccess', 'servicecard_total'));
    }
}
