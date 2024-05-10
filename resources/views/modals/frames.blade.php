<div class="modal fade" id="framemodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="framemodal" data-bs-keyboard="false" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="framemodal">Frames</h6>
                <button type="button" wire:click.prevent="" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">job_order_id</label>
                            <select wire:model="frames.job_id" class="form-select @error('frames.job_id') is-invalid @enderror" id="job_id">
                                <option value="">Select JobOrderId</option>
                                @forelse ($jobs as $id)
                                <option value="{{ $id }}">{{ $id }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('frames.job_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">brand</label>
                            <select wire:model="frames.brand_id" class="form-select @error('frames.brand_id') is-invalid @enderror" id="frames.brand_id">
                                <option value="">Select Brand</option>
                                @forelse ($brands as $id => $brand)
                                <option value="{{ $id }}">{{ $brand }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('frames.brand_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">frame shape</label>
                            <select wire:model="frames.shape_id" class="form-select @error('frames.shape_id') is-invalid @enderror" id="shape_id">
                                <option value="">Select frame shape</option>
                                @forelse ($shapes as $id => $shape)
                                <option value="{{ $id }}">{{ $shape}}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('frames.shape_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Model_No</label>
                            <select wire:model="frames.model_no" class="form-select @error('frames.model_no') is-invalid @enderror" id="model_no">
                                <option value="">Select Model No</option>
                                <option value="001">001</option>
                                <option value="002">002</option>
                                <option value="003">003</option>
                                <option value="004">004</option>
                                <option value="005">005</option>
                            </select>
                            @error('frames.model_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select wire:model="frames.type" class="form-select @error('frames.type') is-invalid @enderror" id="type">
                                <option value="">Select Type</option>
                               <option value="test1">test1</option>
                               <option value="test1">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Option</label>
                            <select wire:model="frames.option" class="form-select @error('frames.option') is-invalid @enderror" id="option">
                              <option value="">select option</option>
                            <option value="test1">test1</option>
                               <option value="test1">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.option')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">lense_variety</label>
                            <select wire:model="frames.lens_variety" class="form-select @error('frames.lens_variety') is-invalid @enderror" id="lense_variety">
                                <option value="">Select lense_variety</option>
                                <option value="test1">test1</option>
                               <option value="test1">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.lense_variety')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">lense_index</label>
                            <select wire:model="frames.lens_index" class="form-select @error('frames.lens_index') is-invalid @enderror" id="lense_index">
                                <option value="">Select lense index</option>
                                <option value="test1">test1</option>
                               <option value="test1">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.lense_index')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">lense_type</label>
                            <select wire:model="frames.lens_type" class="form-select @error('frames.lens_type') is-invalid @enderror" id="lense_type">
                                <option value="">Select lense type</option>
                                <option value="test1">test1</option>
                               <option value="test1">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.lense_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">coating_brand</label>
                            <select wire:model="frames.coating_brand" class="form-select @error('frames.coating_brand') is-invalid @enderror" id="coating_brand">
                                <option value="">Select coating brand</option>
                                <option value="test1">test1</option>
                               <option value="test2">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.coating_brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">coating_brand_id</label>
                            <select wire:model="frames.coating_brand_id" class="form-select @error('frames.coating_brand_id') is-invalid @enderror" id="coating_brand_id">
                                <option value="">Select coating brand</option>
                                <option value=1>test1</option>
                               <option value=2>test2</option>
                               <option value=3>test3</option>
                               <option value=4>test4</option>
                            </select>
                            @error('frames.coating_brand_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">coating_option_id</label>
                            <select wire:model="frames.coating_option_id" class="form-select @error('frames.coating_option_id') is-invalid @enderror" id="coating_option_id">
                                <option value="">Select coating_option_id</option>
                                <option value="1">test1</option>
                               <option value="2">test2</option>
                               <option value="3">test3</option>
                               <option value="4">test4</option>
                            </select>
                            @error('frames.coating_option_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Tint</label>
                            <select wire:model="frames.tint" class="form-select @error('frames.tint') is-invalid @enderror" id="tint">
                                <option value="">Select tint</option>
                                <option value="test1">test1</option>
                               <option value="test1">test2</option>
                               <option value="test3">test3</option>
                               <option value="test4">test4</option>
                            </select>
                            @error('frames.tint')
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
                <button type="button" class="btn btn-primary" wire:click="saveFrame()">save</button>
            </div>
        </div>
    </div>
</div>