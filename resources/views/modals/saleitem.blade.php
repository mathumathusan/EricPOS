
<div class="modal fade" id="saleitemmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="saleitemmodal"
    data-bs-keyboard="false" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="saleitemmodal"> Add Sale item</h6>
                <button type="button" wire:click.prevent="" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Sales</label>
                            <select wire:model=""
                                class="form-select @error('sale.location_id') is-invalid @enderror" id="location_id">
                                <option value="">Select Saleid</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach


                            </select>

                            @error('sale.location_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-6">
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <select wire:model="" class="form-select @error('sale.customer_id') is-invalid @enderror"
                                id="customer_id">
                                <option value="">Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->cus_name }} </option>
                                @endforeach



                            </select>

                            @error('sale.customer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Product</label>
                            <select wire:model="" class="form-select @error('sale.customer_id') is-invalid @enderror"
                                id="product_id">
                                <option value="">Select Products</option>
                                @forelse ($customers2 as $id => $customer_name)
                                    <option value="{{ $id }}"> {{ $customer_name }}</option>
                                @empty
                                @endforelse

                            </select>

                            @error('sale.customer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Qantity</label>
                            <input type="text" class="form-control @error('sales.sales_date') is-invalid @enderror"
                                wire:model="">

                            @error('sales.sales_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
              

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Unit amount</label>
                            <input type="text" class="form-control @error('sale.discount') is-invalid @enderror"
                                wire:model="sale.discount" placeholder="Discount">

                            @error('sale.discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
               
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Sub_Total</label>
                            <input type="text" class="form-control @error('sale.discount') is-invalid @enderror"
                                wire:model="sale.discount" placeholder="Discount">

                            @error('sale.discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Discount</label>
                            <input type="text" class="form-control @error('sale.discount') is-invalid @enderror"
                                wire:model="sale.discount" placeholder="Discount">

                            @error('sale.discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Total</label>
                            <input type="text" class="form-control @error('sale.discount') is-invalid @enderror"
                                wire:model="sale.discount" placeholder="Discount">

                            @error('sale.discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                  
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="job_order_id" class="form-label">Job order id</label>
                            <select wire:model="sale.job_order_id" class="form-select @error('sale.job_order_id') is-invalid @enderror"
                                id="job_order_id">
                                <option value="">Select Job</option>
                                @forelse ($joborderid as $id)
                                    <option value="{{ $id }}">{{ $id}} </option>\
                                    @empty
                                @endforelse



                            </select>

                            @error('sale.customer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>  

                   
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click.prevent=""
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="">Save</button>
            </div>
        </div>
    </div>
</div>
