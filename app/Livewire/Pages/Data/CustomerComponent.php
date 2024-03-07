<?php

namespace App\Livewire\Pages\Data;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Location;
use Illuminate\Support\Facades\Log;

class CustomerComponent extends Component
{
    public $updateMode = false;
    protected $listeners = ['delete'];

    public $customer = [
        'id' => '',
        'location_id' => '',
        'cus_name' => '',
        'email' => '',
        'address' => '',
        'dob' => '',
        'mobile' => '',
        'phone' => '',
        'remark' => '',
        'user_id'=>'',
        'is_active' => false,
    ];



    public function render()
    {
        $locations = Location::whereIsActive(true)->pluck('name','id');
        $customers = Customer::paginate(25);
        return view('livewire.pages.data.customer-component',compact('customers','locations'));
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $this->customer['id'] = $id;

        $customer = Customer::findOrFail($this->customer['id']);

        if ($customer) {
            # code...

            $this->customer = [
                'id' => $customer->id,
                'location_id' => $customer->location_id,
                'cus_name' => $customer->cus_name,
                'email' => $customer->email,
                'address' => $customer->address,
                'dob' =>$customer->dob,
                'mobile' =>$customer->mobile,
                'phone' => $customer->phone,
                'remark' => $customer->remark,
                'user_id' => $customer->user_id,
                'is_active' => $customer->is_active,
            ];
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Customer Not Found']);
        }
    }


    public function save()
    {

        // Debugbar::info($this->location['id']);


        if (isset($this->location['id'])) {
            # code...
            $this->validate(
                [
                    'customer.location_id' => 'required|string|max:50',
                    'customer.cus_name' => 'nullable|string|max:255',
                    'customer.email' => 'nullable|string|max:20',
                    'customer.address' => 'nullable|string|max:20',
                    'customer.dob' => 'nullable|max:255',
                    'customer.mobile' => 'nullable|max:255',
                ],
                [
                    'customer.cus_name.required' => 'The Customer Name is a required.',
                ]
            );
        } else {
            $this->validate(
                [
                    'customer.cus_name' => 'required',
                ],
                [
                    'customer.cus_name.required' => 'The Customer Name is a required.',
                ]
            );
        }

        try {

            $customer = $this->customer['id'] ? Customer::findOrFail($this->customer['id'])  : new Customer;

            $customer->location_id = $this->customer['location_id'];
            $customer->cus_name = $this->customer['cus_name'];
            $customer->email = $this->customer['email'];
            $customer->address = $this->customer['address'];
            $customer->dob = $this->customer['dob'];
            $customer->mobile = $this->customer['mobile'];
            $customer->phone = $this->customer['phone'];
            $customer->remark = $this->customer['remark'];
            $customer->user_id = $this->customer['user_id'] ? $this->customer['user_id'] : userID();
            $customer->is_active = $this->customer['is_active'];

            // Save the customer data here
            $customer->save();

            $this->clear();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Customer Successfully Saved']);
        } catch (\Throwable $th) {
            // Handle the exception
            $error_message = $th->getMessage();
            Log::error("Customer Saving Failed", ['process' => '[Customer]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
            // You may also provide user feedback here
        }
    }


    public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Customer Successfully Deleted']);
        }
    }

    public function deleteConfirm($id)
    {
        $this->dispatch('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'If you Delete, Related Items also will delete',
            'id' => $id,
        ]);
    }

    public function clear()
    {

        $this->updateMode = false;
        $this->dispatch('modalHide');

        $this->customer = [
            'id' => '',
            'location_id' => '',
            'cus_name' => '',
            'email' => '',
            'address' => '',
            'dob' => '',
            'mobile' => '',
            'phone' => '',
            'remark' => '',
            'user_id'=>'',
            'is_active' => false,
        ];
    }
}
