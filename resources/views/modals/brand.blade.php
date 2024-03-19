<!-- Location Modal -->
<div class="modal fade" id="brandmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="brandmodal"
    data-bs-keyboard="false" aria-hidden="true"  wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="brandmodal">{{ $updateMode == true ? 'Update' : 'Create' }} Brand</h6>
                <button type="button"  wire:click.prevent="clear()" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Brand Name</label>
                            <input type="text" class="form-control @error('brand.brand_name') is-invalid @enderror"
                                wire:model="brand.brand_name" placeholder="Brand Name">

                            @error('brand.brand_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Brand Code</label>
                            <input type="text"
                                class="form-control @error('brand.brand_code') is-invalid @enderror"
                                wire:model="brand.brand_code" placeholder="Brand Code">

                            @error('brand.brand_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check" style="font-size: 15px">
                            <input class="form-check-input" type="checkbox" id="active" value="1"
                                wire:model="brand.is_active">
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
