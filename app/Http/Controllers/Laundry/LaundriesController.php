<?php

namespace App\Http\Controllers\Laundry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Laundry;
use App\Order;
use App\User;
use App\Category;
use App\Price;

class LaundriesController extends Controller
{
    public function dashboard()
    {
        return view('laundries.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laundries = Laundry::paginate(10);

        return view('laundries.index',compact('laundries'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param App\Laundry
     */
    public function orders(Laundry $laundry){

        $orders  = $laundry->branches->map(function($branch ){
                                        return $branch->orders;
                                    })->collapse();



        return view('partner.order.index')->with([
            'orders'=>$orders,

            ]);
    }


    public function profile(Laundry $laundry){
        // $laundry  = Auth::user()->laundry;
        // $user = $laundry->user;
        // $categories = $laundry->categories;
        // return view('partner.profile.index')->with([
        //     'laundry' =>$laundry,
        //     'user'=> $user,
        //     'categories'=> $categories
        // ]);

        return view('laundries.profile',compact('laundry'))->with('launr');
    }

    public function profileEdit($id){

        $laundry = Laundry::findOrFail($id);

        return view('partner.profile.create',compact('laundry'));
    }





    public function profileUpdate(Request $request,$id){

        $laundry = Laundry::findOrFail($id);

        $laundry->name = $request->input('name');
        $laundry->location = $request->input('location');

        $laundry->save();

        return redirect('/laundry/profile')->with('success','Your laundry was updated successfully!');


    }

    public function customer(){
        $laundry = Auth::user()->partner->laundry;
        // $users = Orders::where('laundry_id',$laundry->id)->get()[0]->user;
        // SELECT DISTINCT(orders.user_id),users.name
        // FROM users JOIN orders
        //  ON users.id = orders.user_id WHERE orders.laundry_id = 1

        // $customers = DB::table('orders')
        // ->join('customers','customers.id','=','orders.customer_id')
        // ->join('branches','branches.id','=','orders.branch_id')
        // ->join('laundries','laundries.id','=','branches.laundry_id')
        // ->where('laundries.id',$laundry->id)
        // ->select(DB::raw('DISTINCT(orders.customer_id) as customer'))
        // ->get();

        $customers  = Auth::user()->partner->laundry->branches
        ->map(function($branch ){
            return $branch->orders->map(function($order){
                return $order->customer;
            });
        })->collapse();


        // dd($customers[0]->id);
        return view('partner.customers.index')->with([
            'customers'=>$customers,
        ]);
    }

    public function customerShow($id){
      $user = User::find($id);
      return view('partner.customers.show')->with('user',$user);

    }

    public function customerOrders($id){
        // 'SELECT orders.user_id AS id , users.name , orders.service ,orders.kilo , orders.pickupdate , orders.created_at
        //                        FROM users JOIN orders ON users.id = orders.user_id
        //                        WHERE orders.user_id = 3 AND orders.laundry_id = 1
        //                        ORDER BY orders.created_at DESC'
        $customerOrders = DB::table('users')
                          ->join('orders','orders.user_id','=','users.id')
                          ->where('orders.user_id',$id)
                          ->where('orders.laundry_id',Auth::user()->id)
                          ->select(DB::raw('orders.id AS id , users.name , orders.service ,orders.kilo , orders.pickupdate , orders.created_at'))
                          ->orderByRaw('orders.created_at DESC')
                          ->get();


        return view('partner.customers.orders.orders')->with('customerOrders',$customerOrders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory($id)
    {
        $laundry = Laundry::findOrFail($id);
        $user = $laundry->user;
        return view('partner.category.create')->with([
            'laundry' => $laundry,
            'user' => $user
        ]);
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
    public function storeCategory(Request $request,$id)
    {

        $laundry = Laundry::findOrFail($id);
        $category = new Category();
        $category->name = $request->input('name');

        $laundry->categories()->save($category);

        return redirect('/laundry/category/'.$laundry->id);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePrice(Request $request)
    {

        $category = Category::find($request->input('category_id'));
        $price = new Price();
        $price->description = $request->input('description');
        $price->cost = $request->input('cost');

        $category->prices()->save($price);

        return redirect('/laundry/category/'.$category->laundry->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategoryList($id)
    {
        $categories = Category::where('laundry_id',$id)->get();
        // dd($category);
        $user = $categories[0]->laundry->user;

        return view('partner.category.index')->with([
            'categories' => $categories,
            'user'=> $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::find($id);
        return view('partner.customers.orders.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $service = $request->input('service');
        $kilo = $request->input('kilo');
        $pickupdate = $request->input('pickupdate');

        $order->service = $service;
        $order->kilo = $kilo;
        $order->pickupdate = $pickupdate;

        $order->save();
        return redirect('laundry/orders')->with('success','Order was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteOrders(Request $request)
    {
        $id = $request->input('userid');

        // dd($id);

        $order = Order::find($id)->delete();
        return redirect('/laundry/orders')->with('error','Order was successfully deleted!');
    }

    public function destroy(Request $request)
    {
        $id =  $request->input('userid');
        $user = User::find($id);
        $user->orders()->delete();
        $user->delete();

        return redirect('/laundry/customers')->with('error','Customer remove successfully!');;
    }
}
