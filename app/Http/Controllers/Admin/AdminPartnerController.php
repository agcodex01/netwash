<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\User;
use \App\Laundry;
use App\Orders;

class AdminPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',2)->get();
        return view('admin.partners.partners')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string','max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]); 

       $user = User::create([
            
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'role' => 2,
            'password' => Hash::make($data['password']),
        ]);

        Laundry::create([
            
            'user_id' => $user->id,
            'owner' => $user->name,
        ]);

        


        return redirect('/admin/partners');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.partners.info')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.partners.edit')->with('user',$user);
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
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->role = $request->input('role');

        

        $user->save();

        return redirect('/admin/partners')->with('success','Partners info edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          $id =  $request->input('userid');
        $user = User::find($id);

        $user->delete();

        return redirect('/admin/partners')->with('error','Partners remove successfully!');
    }


    public function userLaundry($id){
        $user = User::find($id);

        return view('admin.partners.laundry.show')->with('user',$user);

    }

    public function updateOrder(Request $request, Order $order){
       Orders::find($order)->update(

       );
    }
}
