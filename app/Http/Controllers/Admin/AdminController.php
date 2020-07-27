<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Customer;
use App\Staff;

class AdminController extends Controller
{
    public function dashboard(){

        $partners = Partner::all();

        $customers = Customer::all();

        $staffs = Staff::all();
        
        return view('admin.dashboard')->with([
            'customers' => $customers,
            'partners' => $partners,
            'staffs' => $staffs,
        ]);
    }

    public function getLaundries(){
        
    }

    public function getUser(){
        $users = User::where('role',1)->get();
        return view('admin.customers.customers')->with('users',$users);

    }
}
