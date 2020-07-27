<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Customer;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CustomersController extends Controller
{
    public function dashboard()
    {
        $branches= \App\Branch::with('laundry.laundryProfile')->get();


        return view('customers.dashboard',compact('branches'));
    }

    public function orders(Customer $customer)
    {
        $orders = $customer->orders;

        return view('orders.index',compact('orders'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $customers = Customer::paginate(10);

        return view('customers.index', compact('customers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

    public function profile(Customer $customer)
    {
        return view('customers.profile',compact('customer'));
    }

    public function updateProfilePicture(Request $request, Customer $customer)
    {
        $this->storeImage($request->profile,$customer);
        return back();
    }
    public function updateCity(Request $request, Customer $customer)
    {
        $customer->profile()->update([
            'city' => $request->city
        ]);

        return back();
    }

    public function updateStreet(Request $request, Customer $customer)
    {
        $customer->profile()->update([
            'street' => $request->street
        ]);

        return back()->with('success','success');
    }

    public function updateEmail(Request $request, Customer $customer)
    {
        $customer->user()->update([
            'email' => $request->email
        ]);

        return back();
    }

    public function updatePhoneNumber(Request $request, Customer $customer)
    {
        $customer->profile()->update([
            'phone_number' => $request->phone_number
        ]);

        return back();
    }

    public function storeImage($image , $customer){


        if(! is_dir(public_path('/profile_pictures')))
        {
            mkdir(public_path('/profile_pictures'),0777);
        }

        $basename = Str::random();
        $original = $basename . '.' . $image->getClientOriginalExtension();

        Image::make($image)->fit(300,300)->save(public_path('/profile_pictures/'. $original));
        
        // $image->move(public_path('/profile_pictures'),$original);
       
        if($customer->image == null){
            return $customer->image()->create([
                'path' => '/profile_pictures/'.$original
            ]);
        }
        $this->deleteImage($customer->image);
        return $customer->image()->update([
            'path' => '/profile_pictures/'.$original
        ]);

    }

    public function deleteImage($image)
    {
   
        File::delete(public_path($image->path));

    }

}
