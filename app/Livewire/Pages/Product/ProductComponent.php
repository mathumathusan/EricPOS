<?php

namespace App\Livewire\Pages\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Unit;

class ProductComponent extends Component
{
    public $product = [
        'id' => '',
        'product_code' => '',
        'product_name' => '',
        'type' => '',
        'unit_id' => '',
        'product_img' => '',
        'brand_id' => '',
        'category_id' => '',
        'sub_category_id' => '',
        'enable_stock' => '',
        'alert_quantity' => '',
        'barcode_type' => '',
        'created_by' => '',
        'is_active' => 'false',
    ];


    public function mount($id = null)
    {
        try {
            if ($id) {
                if ($product = Product::whereId($id)->firstOrFail()) {
                    $this->product['id'] = $product->id;
                    $this->product['product_code'] = $product->product_code;
                    $this->product['product_name'] = $product->product_name;
                    $this->product['type'] = $product->type;
                    $this->product['unit_id'] = $product->unit_id;
                    $this->product['product_img'] = $product->product_img;
                    $this->product['brand_id'] = $product->brand_id;
                    $this->product['category_id'] = $product->category_id;
                    $this->product['sub_category_id'] = $product->sub_category_id;
                    $this->product['enable_stock'] = $product->enable_stock;
                    $this->product['alert_quantity'] = $product->alert_quantity;
                    $this->product['barcode_type'] = $product->barcode_type;
                    $this->product['created_by'] = $product->created_by;
                    $this->product['is_active'] = $product->is_active;
                }
            } else {

            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404, 'This Product Not Found. Please Contact Admin');
        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    protected function rules()
    {
        $productId = $this->product['id'];

        return [
            'product.product_name' => 'required',
            'product.product_code' => 'required|unique:products,product_code,' . $productId,
            'product.type' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'product.product_name.required' => 'The product name field is required.',
            'product.product_code.required' => 'The product code field is required.',
            'product.product_code.unique' => 'The product code has already been taken.',

        ];
    }



    public function render()
    {
        $categories = Category::whereIsActive(true)->pluck('category_name','id');
        $brands = Brand::whereIsActive(true)->pluck('brand_name','id');
        $units = Unit::get();

        return view('livewire.pages.product.product-component',compact('categories','brands','units'));
    }

    public function updateData()
    {
        dd($this->product);
        $this->validate();

        $product = $this->product['id'] ? Product::findOrFail($this->product['id']) : new Product;

        $product->product_name = $this->product['product_name'];
        $product->product_code = $this->product['product_code'];
        $product->type = $this->product['type'];
        $product->unit_id = $this->product['unit_id'];
        $product->product_img = $this->product['product_img'];
        $product->brand_id = $this->product['brand_id'];
        $product->category_id = $this->product['category_id'];
        $product->sub_category_id = $this->product['sub_category_id'];
        $product->enable_stock = $this->product['enable_stock'];
        $product->alert_quantity = $this->product['alert_quantity'];
        $product->barcode_type = $this->product['barcode_type'];
        $product->created_by = $this->product['created_by'];
        $product->is_active = $this->product['is_active'];

        $product->save();

        return redirect()->route('users')->with('success', 'Product' . ($this->user['id'] ? ' Updated' : ' Created') . ' Successfully');
    }


    public function cancel()
    {
        return redirect()->route('products');
    }
}
