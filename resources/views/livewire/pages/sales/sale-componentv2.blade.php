

<main>
    <div class="row">
        <div class="col-xl-8 " >
            <div class="card custom-card " style="background-color:#b9bce2">
                <div class="card-body add-products p-0">
                    <h1 class="text-center "><span class="badge  bg-primary text-black"  >Ericanesh Sales</span></h1>
                    <div class="row">
                        <div class="d-flex justify-content-between mx-4">
                            <label for="product-size-add" class="form-label">Customer
                                <button class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#customermodal">
                                    <i class='bx bx-plus'></i>
                                </button>
                            </label>
                            <select class="form-control" wire:model="job.customer_id" id="product-size-add" style="width: 25%;margin-right:5%;background-color:#b9bce2;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                                <option value="">WalkingCustomer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->cus_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row overflow-auto" style="max-height: 400px; overflow-y: auto;overflow-x: hidden;">
    @foreach ($products as $index => $product)
        <div class="col-xl-3 p-4" wire:click="createProduct({{ $product->id }})" style="cursor:pointer;">
            <div class="card custom-card d-flex justify-content-center align-items-center" 
                 style="height: 15vh; background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230519/pngtree-picture-of-a-pair-of-black-sunglasses-on-black-image_2630422.jpg'); background-size: cover; background-position: center;">
                <h5 class="text-center text-white">
                    <div class="badge">{{ $product->product_name }}</div>
                </h5>
                <h6>
                    <!-- <div class="badge">{{ $product->price == null ? 0.00 : $product->price }}</div> -->
                </h6>
            </div>
        </div>
    @endforeach
</div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 overflow-auto" style="max-height:495px; overflow-y: auto;overflow-x: hidden;">
            <div class="card custom-card p-4" style="background-color:#b9bce2">
                <h2 class="text-center text-black">Total: <span id="total" class="text-black">{{ $total }}</span></h2>
                <h2 class="text-center text-black">Discount: <span class="text-black">{{ $discount }}</span></h2>
                <span class="text-center text-black">Items: <span class="text-black">{{ $count }}</span></span>
            </div>
            <div style="background-color:#b9bce2; margin-top: -30px;">
                <div id="container">
                    @if(is_array($selectedProducts))
                        @foreach ($selectedProducts as $productId => $product)
                            <div class="card custom-card" style="background-color:#d5d7f3;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                                <div class="p-2 d-flex justify-content-between">
                                    <h6>{{ $product['name'] }}</h6>
                                    <input type="text" wire:model="selectedProducts.{{ $productId }}.price" placeholder="unit_amt" class="form-control input-sm w-25">
                                    <input type="text" wire:model="selectedProducts.{{ $productId }}.discount" placeholder="discount" class="form-control input-sm w-25">
                                </div>
                                <div class="p-2 d-flex justify-content-between">
                                    <button class="btn btn-icon btn-sm btn-danger" wire:click="cancelProduct({{ $product['id'] }})">
                                        <i class='bx bx-trash-alt'></i>
                                    </button>
                                    <div class="d-flex justify-content-between gap-3">
                                        <button class="btn btn-icon btn-sm btn-primary" wire:click="decrement({{ $product['id'] }})">
                                            <i class='bx bx-minus'></i>
                                        </button>
                                        <span class="btn btn-icon btn-sm btn-info">{{ $product['quantity'] }}</span>
                                        <button class="btn btn-icon btn-sm btn-primary" wire:click="increment({{ $product['id'] }})">
                                            <i class='bx bx-plus'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="d-flex justify-content-between mt-5">
                    <button class="btn btn-success m-1" wire:click="updateData()">Save</button>
                    <button class="btn btn-danger m-1" wire:click="cancel()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @include('modals.customer')
</main>
