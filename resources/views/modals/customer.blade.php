<!-- Location Modal -->
<div class="modal fade" id="customermodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="customermodal"
    data-bs-keyboard="false" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="customermodal">{{ $updateMode == true ? 'Update' : 'Create' }} Customer</h6>
                <button type="button" wire:click.prevent="clear()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Customer Name</label>
                            <input type="text" class="form-control @error('customer.cus_name') is-invalid @enderror"
                                wire:model="customer.cus_name" placeholder="Customer Name">

                            @error('customer.cus_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-6">

                        <div class="mb-3">
                            <label for="location_id" class="form-label">Customer</label>
                            <select wire:model="customer.location_id"
                                class="form-select @error('customer.location_id') is-invalid @enderror"
                                id="location_id">
                                <option value="">Select Location</option>
                                @forelse ($locations as $id => $location)
                                <option value="{{ $id }}">{{ $location }}</option>
                                @empty

                                @endforelse

                            </select>

                            @error('customer.location_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Customer Code</label>
                            <input type="text" class="form-control @error('customer.cus_id') is-invalid @enderror"
                                wire:model="customer.cus_id" placeholder="Store Code">

                            @error('customer.cus_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div> --}}

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('customer.dob') is-invalid @enderror"
                                wire:model="customer.dob">

                            @error('customer.dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('customer.email') is-invalid @enderror"
                                wire:model="customer.email" placeholder="Email Address">

                            @error('customer.email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('customer.phone') is-invalid @enderror"
                                wire:model="customer.phone" placeholder="Phone Number">

                            @error('customer.phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                    </div>


                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control @error('customer.mobile') is-invalid @enderror"
                                wire:model="customer.mobile" placeholder="Mobile Number">

                            @error('customer.mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control @error('customer.address') is-invalid @enderror"
                                wire:model="customer.address" rows="1"></textarea>
                            @error('customer.address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

<hr>

                    <div class="col-12">

                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea class="form-control border-success @error('customer.remark') is-invalid @enderror"
                                wire:model="customer.remark" id="remark" rows="3"></textarea>
                            @error('customer.remark')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>









                    <div class="col-6">
                        <div class="form-check" style="font-size: 15px">
                            <input class="form-check-input" type="checkbox" id="active" value="1"
                                wire:model="customer.is_active">
                            <label class="form-label" for="active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click.prevent="clear()"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    wire:click="save()">{{ $updateMode == true ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </div>
</div>
