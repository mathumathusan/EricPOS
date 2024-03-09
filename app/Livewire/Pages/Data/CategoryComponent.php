<?php

namespace App\Livewire\Pages\Data;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryComponent extends Component
{
    public $updateMode = false;
    protected $listeners = ['delete'];

    public $category = [
        'id' => '',
        'category_name' => '',
        'category_code' => '',
        'is_active' => false,
    ];


    public function render()
    {
        $categories = Category::paginate(25);
        return view('livewire.pages.data.category-component', compact('categories'));
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $this->category['id'] = $id;

        $category = Category::findOrFail($this->category['id']);

        if ($category) {
            # code...

            $this->category = [
                'id' => $category->id,
                'category_name' => $category->category_name,
                'category_code' => $category->category_code,
                'is_active' => $category->is_active,
            ];
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Category Not Found']);
        }
    }


    public function save()
    {

        // Debugbar::info($this->location['id']);


        if (isset($this->category['id'])) {
            # code...
            $this->validate(
                [
                    'category.category_name' => 'required|string|max:255',
                    'category.category_code' => 'nullable|max:255',
                ],
                [
                    'location.category_name.required' => 'The Name is a required.',
                ]
            );
        } else {
            $this->validate(
                [
                    'category.category_name' => 'required|string|max:255',
                    'category.category_code' => 'nullable|max:255',
                ],
                [
                    'location.category_name.required' => 'The Name is a required.',
                ]
            );
        }

        try {

            $category = $this->category['id'] ? Category::findOrFail($this->category['id'])  : new Category;

            $category->category_name = $this->category['category_name'];
            $category->category_code = $this->category['category_code'];
            $category->is_active = $this->category['is_active'];


            // Save the customer data here
            $category->save();

            $this->clear();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Category Successfully Saved']);
        } catch (\Throwable $th) {
            // Handle the exception
            $error_message = $th->getMessage();
            Log::error("Category Saving Failed", ['process' => '[Category]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
            // You may also provide user feedback here
        }
    }


    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Category Successfully Deleted']);
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

        $this->category = [
            'id' => '',
            'category_name' => '',
            'category_code' => '',
            'is_active' => false,
        ];
    }
}
