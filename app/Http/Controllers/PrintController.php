<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JobFrame;
use App\Models\JobOrder;
use App\Models\JobPrescription;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\User;
use Illuminate\Http\Request;

class PrintController extends Controller
{

    public function index($id)
    {
        $sales=Sales::findOrFail($id);
        $sales_items=SalesItem::where('sales_id',$id)->get();
        return view("print",compact('sales','sales_items'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }


    public function show(string $id)
    {
    }


    public function edit(string $id)
    {
    }


    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
    }
}
