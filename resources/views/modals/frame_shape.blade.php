<!-- Location Modal -->
<div class="modal fade" id="frameshapemodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="frameshapemodal"
    data-bs-keyboard="false" aria-hidden="true"  wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="frameshapemodal">{{ $updateMode == true ? 'Update' : 'Create' }} Frame Shape</h6>
                <button type="button"  wire:click.prevent="clear()" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Frame Shape Name</label>
                            <input type="text" class="form-control @error('frame_shape.name') is-invalid @enderror"
                                wire:model="frame_shape.name" placeholder="Frame Shape Name">

                            @error('frame_shape.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Frame Shape Code</label>
                            <input type="text"
                                class="form-control @error('frame_shape.code_no') is-invalid @enderror"
                                wire:model="frame_shape.code_no" placeholder="Frame Shape Code">

                            @error('frame_shape.code_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check" style="font-size: 15px">
                            <input class="form-check-input" type="checkbox" id="active" value="1"
                                wire:model="frame_shape.is_active">
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
