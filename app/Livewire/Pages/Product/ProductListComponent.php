<?php

namespace App\Livewire\Pages\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProductListComponent extends Component
{
    use WithPagination;
    protected $listeners = ['delete'];

    public function render()
    {
        $products = Product::get();
        return view('livewire.pages.product.product-list-component',compact('products'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Product Successfully Deleted']);
            cache()->flush();
        }
    }



    public function deleteConfirm($id)
    {
        $this->dispatch('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }
}
