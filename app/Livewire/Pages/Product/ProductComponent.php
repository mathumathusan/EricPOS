<?php

namespace App\Livewire\Pages\Product;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $product = [
        'id' => '',
        'name' => '',
        'username'=> '',
        'email' => '',
        'login_attempts' => '',
        'profile_pic' => '',
        'is_blocked' => '',
        'last_login_at' => '',
        'last_login_ip' => '',

        'role' => '',
    ];


    public function mount($id = null)
    {
        try {
            if ($id) {
                if ($product = Product::whereId($id)->firstOrFail()) {
                    $this->product['id'] = $product->id;

                }
            } else {

            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404, 'This Product Not Found. Please Contact Admin');
        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.pages.product.product-component');
    }
}
