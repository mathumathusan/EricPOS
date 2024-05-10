<?php

namespace App\Livewire\Pages\Data;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Facades\Log;
use Barryvdh\Debugbar\Facades\Debugbar;

class LocationComponent extends Component
{

    public $updateMode = false;
    protected $listeners = ['delete'];

    public $location = [
        'id' => '',
        'name' => '',
        'store_code' => '',
        'address' => '',
        'phone' => '',
        'mobile' => '',
        'email' => '',
        'website' => '',
        'social_media' => [],
        'default_language' => 'en',
        'created_by'=> '',
        'is_active' => false,
    ];

    public function render()
    {
        $locations = Location::paginate(25);
        return view('livewire.pages.data.location-component',compact('locations'));
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $this->location['id'] = $id;

        $location = Location::findOrFail($this->location['id']);

        if ($location) {
            # code...

            $this->location = [
                'id' => $location->id,
                'name' => $location->name,
                'store_code' => $location->store_code,
                'address' => $location->address,
                'phone' => $location->phone,
                'mobile' => $location->mobile,
                'email' =>$location->email,
                'website' =>$location->website,
                'social_media' => $location->social_media,
                'default_language' => $location->default_language,
                'created_by' => $location->created_by,
                'is_active' => $location->is_active,
            ];
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Location Not Found']);
        }
    }


    public function save()
    {

        // Debugbar::info($this->location['id']);


        if (isset($this->location['id'])) {
            # code...
            $this->validate(
                [
                    'location.name' => 'required|string|max:255',
                    'location.store_code' => 'required|string|max:50',
                    'location.address' => 'nullable|string|max:255',
                    'location.phone' => 'nullable|string|max:20',
                    'location.mobile' => 'nullable|string|max:20',
                    'location.email' => 'nullable|max:255',
                    'location.website' => 'nullable|max:255',
                    'location.default_language' => 'required|string|in:en,ta,si',
                ],
                [
                    'location.name.required' => 'The Name is a required.',
                ]
            );
        } else {
            $this->validate(
                [
                    'location.name' => 'required',
                ],
                [
                    'location.name.required' => 'The Name is a required.',
                ]
            );
        }

        try {

            $location = $this->location['id'] ? Location::findOrFail($this->location['id'])  : new Location;
            $location->name = $this->location['name'];
            $location->store_code = $this->location['store_code'];
            $location->address = $this->location['address'];
            $location->phone = $this->location['phone'];
            $location->mobile = $this->location['mobile'];
            $location->email = $this->location['email'];
            $location->website = $this->location['website'];
            $location->default_language = $this->location['default_language'];
            $location->created_by = $this->location['created_by'] ? $this->location['created_by'] : userID();
            $location->is_active = $this->location['is_active'];


            // Save the customer data here
            $location->save();

            $this->clear();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Location Successfully Saved']);
        } catch (\Throwable $th) {
            // Handle the exception
            $error_message = $th->getMessage();
            Log::error("Location Saving Failed", ['process' => '[Location]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
            // You may also provide user feedback here
        }
    }


    public function delete($id)
    {
        $location = Location::find($id);
        if ($location) {
            $location->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Location Successfully Deleted']);
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

        $this->location = [
            'id' => '',
            'name' => '',
            'store_code' => '',
            'address' => '',
            'phone' => '',
            'mobile' => '',
            'email' => '',
            'website' => '',
            'social_media' => [],
            'default_language' => '',
            'created_by' => '',
            'is_active' => false,
        ];
    }
}
