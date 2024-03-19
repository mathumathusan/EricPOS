<?php

namespace App\Livewire\Pages\Data;

use Livewire\Component;
use App\Models\FrameShape;
use Illuminate\Support\Facades\Log;

class FrameShapeComponent extends Component
{
    public $updateMode = false;
    protected $listeners = ['delete'];

    public $frame_shape = [
        'id' => '',
        'name' => '',
        'code_no' => '',
        'created_by' => '',
        'is_active' => false,
    ];



    public function render()
    {
        $frame_shapes = FrameShape::paginate(25);

        return view('livewire.pages.data.frame-shape-component',compact('frame_shapes'));
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $this->frame_shape['id'] = $id;

        $frame_shape = FrameShape::findOrFail($this->frame_shape['id']);

        if ($frame_shape) {
            # code...

            $this->frame_shape = [
                'id' => $frame_shape->id,
                'name' => $frame_shape->name,
                'code_no' => $frame_shape->code_no,
                'created_by' =>  $frame_shape->created_by,
                'is_active' => $frame_shape->is_active,
            ];
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Category Not Found']);
        }
    }


    public function save()
    {

        // Debugbar::info($this->location['id']);


        if (isset($this->frame_shape['id'])) {
            # code...
            $this->validate(
                [
                    'frame_shape.name' => 'required|string|max:255',
                    'frame_shape.code_no' => 'nullable|max:255',
                ],
                [
                    'frame_shape.name.required' => 'The Name is a required.',
                ]
            );
        } else {
            $this->validate(
                [
                    'frame_shape.name' => 'required|string|max:255',
                    'frame_shape.code_no' => 'nullable|max:255',
                ],
                [
                    'frame_shape.name.required' => 'The Name is a required.',
                ]
            );
        }

        try {

            $frame_shape = $this->frame_shape['id'] ? FrameShape::findOrFail($this->frame_shape['id'])  : new FrameShape;

            $frame_shape->name = $this->frame_shape['name'];
            $frame_shape->code_no = $this->frame_shape['code_no'];
            $frame_shape->created_by = $this->frame_shape['created_by'] ? $this->frame_shape['created_by'] : userID();
            $frame_shape->is_active = $this->frame_shape['is_active'];


            // Save the customer data here
            $frame_shape->save();

            $this->clear();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Frame Shape Successfully Saved']);
        } catch (\Throwable $th) {
            // Handle the exception
            $error_message = $th->getMessage();
            Log::error("Frame Shape Saving Failed", ['process' => '[FrameShape]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
            // You may also provide user feedback here
        }
    }


    public function delete($id)
    {
        $frame_shape = FrameShape::find($id);
        if ($frame_shape) {
            $frame_shape->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Frame Shape Successfully Deleted']);
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

        $this->frame_shape = [
            'id' => '',
            'name' => '',
            'code_no' => '',
            'created_by' => '',
            'is_active' => false,
        ];
    }
}
