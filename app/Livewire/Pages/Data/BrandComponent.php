<?php

namespace App\Livewire\Pages\Data;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class BrandComponent extends Component
{

    public $updateMode = false;
    protected $listeners = ['delete'];

    public $brand = [
        'id' => '',
        'brand_name' => '',
        'brand_code' => '',
        'created_by' => '',
        'is_active' => false,
    ];


    public function render()
    {
        $brands = Brand::paginate(25);
        return view('livewire.pages.data.brand-component',compact('brands'));
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $this->brand['id'] = $id;

        $brand = Brand::findOrFail($this->brand['id']);

        if ($brand) {
            # code...

            $this->brand = [
                'id' => $brand->id,
                'brand_name' =>$brand->brand_name,
                'brand_code' => $brand->brand_code,
                'created_by' =>  $brand->created_by,
                'is_active' => $brand->is_active,
            ];
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Brand Not Found']);
        }
    }


    public function save()
    {

        // Debugbar::info($this->location['id']);


        if (isset($this->location['id'])) {
            # code...
            $this->validate(
                [
                    'brand.brand_name' => 'required|string|max:255',
                    'brand.brand_code' => 'nullable|max:255',
                ],
                [
                    'location.brand_name.required' => 'The Name is a required.',
                ]
            );
        } else {
            $this->validate(
                [
                    'brand.brand_name' => 'required|string|max:255',
                    'brand.brand_code' => 'nullable|max:255',
                ],
                [
                    'location.brand_name.required' => 'The Name is a required.',
                ]
            );
        }

        try {

            $brand = $this->brand['id'] ? Brand::findOrFail($this->brand['id'])  : new Brand;

            $brand->brand_name = $this->brand['brand_name'];
            $brand->brand_code = $this->brand['brand_code'];
            $brand->created_by = $this->brand['created_by'] ? $this->brand['created_by'] : userID();
            $brand->is_active = $this->brand['is_active'];


            // Save the customer data here
            $brand->save();

            $this->clear();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Brand Successfully Saved']);
        } catch (\Throwable $th) {
            // Handle the exception
            $error_message = $th->getMessage();
            Log::error("Brand Saving Failed", ['process' => '[Brand]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
            // You may also provide user feedback here
        }
    }


    public function delete($id)
    {
        $location = Brand::find($id);
        if ($location) {
            $location->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Brand Successfully Deleted']);
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

        $this->brand = [
            'id' => '',
            'brand_name' => '',
            'brand_code' => '',
            'created_by' => '',
            'is_active' => false,
        ];
    }
}
