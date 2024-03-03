<!-- Location Modal -->
<div class="modal fade" id="locationmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="locationmodal"
    data-bs-keyboard="false" aria-hidden="true"  wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="locationmodal">{{ $updateMode == true ? 'Update' : 'Create' }} Location</h6>
                <button type="button"  wire:click.prevent="clear()" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Location Name</label>
                            <input type="text" class="form-control @error('location.name') is-invalid @enderror"
                                wire:model="location.name" placeholder="Location Name">

                            @error('location.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Store Code</label>
                            <input type="text"
                                class="form-control @error('location.store_code') is-invalid @enderror"
                                wire:model="location.store_code" placeholder="Store Code">

                            @error('location.store_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email"
                                class="form-control @error('location.email') is-invalid @enderror"
                                wire:model="location.email" placeholder="Email Address">

                            @error('location.email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('location.phone') is-invalid @enderror"
                                wire:model="location.phone" placeholder="Phone Number">

                            @error('location.phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                    </div>


                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control @error('location.mobile') is-invalid @enderror"
                                wire:model="location.mobile" placeholder="Mobile Number">

                            @error('location.mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control @error('location.address') is-invalid @enderror" wire:model="customer.address"
                                id="address" rows="3"></textarea>
                            @error('location.address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>




                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input type="text" class="form-control @error('location.website') is-invalid @enderror"
                                wire:model="location.website" placeholder="Website">

                            @error('location.website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                         <div class="col-6">

                        <div class="mb-3">
                            <label for="language" class="form-label">Language</label>
                            <select wire:model="location.default_language"
                                class="form-select @error('location.default_language') is-invalid @enderror" id="country">
                                <option value="">Select Language</option>
                                <option value="en">English</option>
                                <option value="ta">Tamil</option>
                                <option value="si">Sinhala</option>
                            </select>

                            @error('location.default_language')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="form-check" style="font-size: 15px">
                            <input class="form-check-input" type="checkbox" id="active" value="1"
                                wire:model="location.is_active">
                            <label class="form-label" for="active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  wire:click.prevent="clear()" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="save()">{{ $updateMode == true ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </div>
</div>
