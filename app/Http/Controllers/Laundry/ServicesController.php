<?php

namespace App\Http\Controllers\Laundry;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Service;
use App\Laundry;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Laundry $laundry)
    {
        $services = $laundry->services->map(function($service){
            $service->subName = Str::of($service->name)->replaceMatches('/[^A-Za-z0-9]++/','') ;
            return $service;
        });
      
         return view('services.index',compact('services','laundry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPricing(Request $request)
    {
        $data =  $request->validate([
            'priceDescription' => 'required',
            'amount' => 'required'
        ]);
        $service = Service::findOrFail($request->input('service'));

        $service->prices()->create([
            'priceDescription' => $data['priceDescription'],
            'amount' => $data['amount']
        ]);

        return back();
        
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'service' => 'required'
        ]);
        $laundry = Laundry::findOrFail($request->input('laundry'));

        $laundry->services()->create([
            'name' => $data['service']
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
