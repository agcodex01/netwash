<?php

namespace App\Http\Controllers\Laundry;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Branch;
use App\Laundry;
use Illuminate\Http\Request;

class BranchesController extends Controller
{

    public function dashboard(Laundry $laundry, Branch $branch)
    {
        return view('branches.dashboard');
    }
    /**
     * Display a listing of the resource.
     *@param App\Laundry
     * @return \Illuminate\Http\Response
     */
    public function index(Laundry $laundry)
    {
        $laundryName = Str::words($laundry->laundryName(),2,'');
        $branches = $laundry->branches()->paginate(10);

        // dd($branches);
        // dd($branches);
        return view('branches.index',compact('branches','laundryName','laundry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.create');
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
            'city' => 'required',
            'street' => 'required',
            'type' => 'required'
        ]);
        $laundry = Laundry::findOrFail($request->input('laundry'));
        $laundry->branches()->create([
            'city' => $data['city'],
            'street' => $data['street'],
            'type' => $data['type']
        ]);
        return back()->with('success','Branch successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }


    public function services($id){
        $selectedBranch = Branch::findOrFail($id)->laundry->services;

        return response()->json( $selectedBranch );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }

    public function orders()
    {
        //this bracnch orders
    }

    public function statusUpdate()
    {
        
    }


}
