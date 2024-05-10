<div class="modal fade" id="prescriptionmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="prescriptionmodal" data-bs-keyboard="false" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="prescriptionmodal">prescriptions</h6>
                <button type="button" wire:click.prevent="" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">job_order_id</label>
                            <select wire:model="prescriptions.job_order_id" class="form-select @error('prescriptions.job_order_id') is-invalid @enderror" id="location_id">
                                <option value="">Select JobOrderId</option>
                                @forelse ($jobs as $id)
                                <option value="{{ $id }}">{{ $id }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('prescriptions.right_sph')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">right_sph</label>
                            <input type="text" class="form-control @error('prescriptions.right_sph') is-invalid @enderror" wire:model="prescriptions.right_sph" placeholder="right_sph">
                            @error('prescriptions.right_sph')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">right_cyl</label>
                            <input type="text" class="form-control @error('prescriptions.right_sph') is-invalid @enderror" wire:model="prescriptions.right_cyl" placeholder="right_cyl">
                            @error('prescriptions.right_sph')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">right_axis</label>
                            <input type="text" class="form-control @error('prescriptions.right_sph') is-invalid @enderror" wire:model="prescriptions.right_axis" placeholder="right_axis">
                            @error('prescriptions.right_axis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">right_add</label>
                            <input type="text" class="form-control @error('prescriptions.right_add') is-invalid @enderror" wire:model="prescriptions.right_add" placeholder="right_add">
                            @error('prescriptions.right_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">right_pd</label>
                            <input type="text" class="form-control @error('prescriptions.right_pd') is-invalid @enderror" wire:model="prescriptions.right_pd" placeholder="right_pd">
                            @error('prescriptions.right_pd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">left_sph</label>
                            <input type="text" class="form-control @error('prescriptions.left_sph') is-invalid @enderror" wire:model="prescriptions.left_sph" placeholder="left_sph">
                            @error('prescriptions.left_sph')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">left_cyl</label>
                            <input type="text" class="form-control @error('prescriptions.left_cyl') is-invalid @enderror" wire:model="prescriptions.left_cyl" placeholder="left_cyl">
                            @error('prescriptions.left_cyl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">left_axis</label>
                            <input type="text" class="form-control @error('prescriptions.left_axis') is-invalid @enderror" wire:model="prescriptions.left_axis" placeholder="left_axis">
                            @error('prescriptions.left_axis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">left_add</label>
                            <input type="text" class="form-control @error('prescriptions.left_add') is-invalid @enderror" wire:model="prescriptions.left_add" placeholder="left_add">
                            @error('prescriptions.left_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">left_pd</label>
                            <input type="text" class="form-control @error('prescriptions.left_pd') is-invalid @enderror" wire:model="prescriptions.left_pd" placeholder="left_pd">
                            @error('prescriptions.left_pd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">of_sf</label>
                            <input type="text" class="form-control @error('prescriptions.of_sf') is-invalid @enderror" wire:model="prescriptions.of_sf" placeholder="of_sf">
                            @error('prescriptions.of_sf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">professional_type</label>
                            <input type="text" class="form-control @error('prescriptions.professional_type') is-invalid @enderror" wire:model="prescriptions.professional_type" placeholder="professional_type">
                            @error('prescriptions.professional_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">professional_name</label>
                            <input type="text" class="form-control @error('prescriptions.professional_name') is-invalid @enderror" wire:model="prescriptions.professional_name" placeholder="professional_name">
                            @error('prescriptions.professional_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">hospital_name</label>
                            <input type="text" class="form-control @error('prescriptions.hospital_name') is-invalid @enderror" wire:model="prescriptions.hospital_name" placeholder="hospital_name">
                            @error('prescriptions.hospital_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-">
                        <div class="mb-3">
                            <label class="form-label">product_id</label>
                            <select wire:model="prescriptions.product_id" class="form-select @error('prescriptions.product_id') is-invalid @enderror" id="location_id">
                                <option value="">Select Products</option>
                                @foreach ($products as $productName => $productId)
                                <option value="{{ $productId }}">{{ $productName }}</option>
                                @endforeach
                            </select>
                            @error('prescriptions.product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click.prevent="" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="savePrescription()">save</button>
            </div>
        </div>
    </div>
</div>