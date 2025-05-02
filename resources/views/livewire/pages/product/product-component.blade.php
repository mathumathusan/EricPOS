<main>
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Product Name</label>
                                                <input type="text" wire:model="product.product_name" class="form-control @error('product.product_name') is-invalid @enderror" id="product-name-add" placeholder="Product Name">
                                                @error('product.product_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product_code" class="form-label">Product Code</label>
                                                <input type="text" wire:model="product.product_code" class="form-control  @error('product.product_code') is-invalid @enderror" id="product_code" placeholder="Product Code">
                                                @error('product.product_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="type" class="form-label">Type</label>
                                                <input type="text" wire:model="product.type" class="form-control  @error('product.type') is-invalid @enderror" id="type" placeholder="Product type">
                                                @error('product.type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="sub_category_id" class="form-label">SubCategoryId</label>
                                                <input type="text" wire:model="product.sub_category_id" class="form-control  @error('product.sub_category_id') is-invalid @enderror" id="sub_category_id" placeholder="SubCategoryId">
                                                @error('product.sub_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="alert_quantity" class="form-label">Alert Quantity</label>
                                                <input type="text" wire:model="product.alert_quantity" class="form-control  @error('product.alert_quantity') is-invalid @enderror" id="alert_quantity" placeholder="Alert Quantity">
                                                @error('product.alert_quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6" wire:ignore>
                                                <label for="product-size-add" class="form-label">Barcode Type</label>
                                                <select class="form-control @error('product.barcode_type') is-invalid @enderror" wire:model="product.barcode_type" id="product-size-add">
                                                    <option value="">Please Select</option>
                                                    @foreach(\App\Enums\BarcodeType::cases() as $status)
                                                    <option value="{{ $status->value }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('product.barcode_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6" wire:ignore>
                                                <label for="product-size-add" class="form-label">Unit</label>
                                                <select wire:model="product.unit_id" class="form-control @error('product.unit_id') is-invalid @enderror">
                                                    <option value="">Please Select</option>
                                                    @forelse ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->actual_name.' ('.$unit->short_name.')' }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @error('product.unit_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6" wire:ignore>
                                                <label for="product-category-add" class="form-label">Brand</label>
                                                <select class="form-control @error('product.brand_id') is-invalid @enderror" wire:model="product.brand_id" id="product-category-add">
                                                    <option value="">Please Select</option>
                                                    @forelse ($brands as $brandId => $brand)
                                                    <option value="{{ $brandId}}">{{ $brand}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @error('product.brand_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-category-add" class="form-label">Category</label>
                                                <select class="form-control" id="product-category-add" wire:model="product.category_id">
                                                    <option value="">Please Select</option>
                                                    @forelse ($categories as $categoryId => $category)
                                                    <option value="{{ $categoryId}}">{{ $category }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-md-6 ">
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" id="enable_stock" value="1" wire:model="product.enable_stock">
                                                    <label class="form-check-label" for="enable_stock">Enable Stock</label>
                                                </div>
                                                @error('product.enable_stock')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6 ">
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" id="active" value="1" wire:model="product.is_active">
                                                    <label class="form-check-label" for="active">Is Active</label>
                                                </div>
                                                @error('product.is_active')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-start">
                        <button class="btn btn-success m-1" wire:click="updateData()">{{ $product['id'] ? 'Update' : 'Create' }} Product</button>
                        <button class="btn btn-primary m-1">{{ $product['id'] ? 'Update' : 'Create' }} Product & Create Another</button>
                        <button class="btn btn-dark m-1" wire:click="cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
</main>

@section('title', ($product['id'] ? 'Update' : 'Create').' Product')

@push('custom-style')
@endpush

@push('custom-script')
<script src="{{ asset('assets/js/add-products.js') }}"></script>
@endpush
