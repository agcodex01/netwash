<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Laundry;
use App\Customer;
use App\Order;
use App\Branch;
use Illuminate\Support\Str;
use App\Notifications\OrderResponseNotification;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer, Branch $branch = null)
    {
        $selectedBranch = $branch;
        if(!$branch== null){
            $selectedBranch = $branch;
        }

       $branches =  Branch::all();
        return view('orders.create',compact('branches','selectedBranch','customer'));
    }



    public function details(Order $order){
        return view('branches.orders.details',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'branch' => 'required | not_in: 0',
            'service' =>'required | not_in: 0',
            'transportation' =>'required | not_in: 0',
            'pickup_location' => '',
            'dropin_location' => 'required',
            'kilo' => 'required',
            'pickupdate' => 'required',

        ]);



         $customer->orders()->create([

            'branch_id' => $data['branch'],
            'service' => $data['service'],
            'transportation' => $data['transportation'],
            'pickup_location' => $data['pickup_location'],
            'dropin_location' =>  $data['dropin_location'],
            'kilo' => $data['kilo'],
            'pickupdate' => $data['pickupdate'],
        ]);


        return  redirect()->route('customers.orders',[$customer])->with('success','Your order successfully added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $branches =  Branch::all();

        return view('customer.orders.edit',compact('branches','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'branch_id' => $request->input('branch'),
            'service' => $request->input('service'),
            'transportation' => $request->input('transportation'),
            'pickup_location' => $request->input('pickup_location'),
            'dropin_location' => $request->input('dropin_location'),
            'kilo' => $request->input('kilo'),
            'pickupdate' => $request->input('pickupdate'),
        ]);

        return redirect()->route('order.index')->with('success','Your order successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success','Your order successfully deleted!');
    }

    public function accepted(Order $order){
            $order->update([
                'status' => true
            ]);

            $order->customer->notify(new OrderResponseNotification($order->branch->laundry->laundryProfile->name,'Your order was accepted'));

            return back();
    }

    public function declined(Order $order){

        $order->customer->notify(new OrderResponseNotification($order->branch->laundry->laundryProfile->name,'Your order was decline.'));
        $order->delete();

        return back();
    }
    /**
     * @param \App\Laundry
     * @param \App\Branch
     * @return \Illuminate\Http\Response
     */
    public function branchOrders(Laundry $laundry, Branch $branch)
    {
        $orders = $branch->orders()->latest()->paginate(10);

        return view('branches.orders.index',compact('orders'));

    }
    /**
     * @param \App\Laundry
     * @param \App\Branch
     * @return \Illuminate\Http\Response
     */
    public function waitingList(Laundry $laundry, Branch $branch)
    {
        // $orders = $branch->orders()->where('status',1)->get();
        $orders = $branch->orders->filter(function($order){
            if($order->status == 1 && $order->washed == 0){
                return $order;
            }
        });//->sortByDesc('updated_at');
        
        $ordersWashIn = $branch->orders->filter(function($order){
            if($order->status == 1 && $order->washed == 1 && $order->done ==0 ){
                return $order;
            }
        });

        // dd($orders);
        return view('branches.orders.waitingList', compact('orders','ordersWashIn'));
    }
    public function washIn(Order $order){

        $order->update([
            'washed' => 1
        ]);

        return back()->with('success','success!');

    }

    public function markAsDone(Order $order){

        $order->customer->notify(new OrderResponseNotification($order->branch->laundry->laundryProfile->name,'Your laundry is ready to pick-up'));
       
        $order->update([
            'done' => 1
        ]);
        return back()->with('success','success delete!');

    }

    public function statusUpdate( $id, $statusValue)
    {   
       
        $order = Order::findOrFail($id);
        if($statusValue == 1){
            $order->update([
            'washed' => 1
            ]);
            return back();
        }
        if($statusValue == 2){
            $order->update([
            'done' => 1
            ]);
        return back();
        }
    }


}
