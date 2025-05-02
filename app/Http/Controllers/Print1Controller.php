<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JobFrame;
use App\Models\JobOrder;
use App\Models\JobPrescription;
use App\Models\User;
use Illuminate\Http\Request;

class Print1Controller extends Controller
{
    
    public function index($id)
    {

        $job = JobOrder::findOrFail($id);
        $customer=Customer::findOrFail($job->customer_id);
        $prescription=JobPrescription::where('job_order_id',$id)->get();
        $user=User::findOrFail($job->take_by);

        $frame=JobFrame::where('job_id',$id)->get();
        return view("print1",compact('job','customer','prescription','frame','user'));
    }
   
  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
