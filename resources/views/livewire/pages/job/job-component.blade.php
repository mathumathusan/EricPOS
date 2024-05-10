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
                                                <label for="job-no-add" class="form-label">Job No</label>
                                                <input type="text" wire:model="job.job_no" class="form-control @error('job.job_no') is-invalid @enderror" id="job-no-add" placeholder="Job No">
                                                @error('job.job_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Job Code</label>
                                                <input type="text" wire:model="job.job_code" class="form-control @error('job.job_code') is-invalid @enderror" id="product-name-add" placeholder="Job code">
                                                @error('job.job_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Take by</label>
                                                <input type="text" wire:model="job.take_by" class="form-control @error('job.take_by') is-invalid @enderror" id="product-name-add" placeholder="take By">
                                                @error('job.take_by')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-xl-4 col-md-6" wire:ignore>
                                                <label for="location-size-add" class="form-label">Location</label>
                                                <select class="form-control @error('job.location_id') is-invalid @enderror" wire:model="job.location_id" id="location-size-add">
                                                    <option value="">Please Select</option>
                                                    @forelse ($locations as $locationId => $locationName)
                                                    <option value="{{ $locationId}}">{{ $locationName }}</option>
                                                    @empty
                                                    <option value="">No locations found</option>
                                                    @endforelse
                                                </select>

                                                @error('job.location_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6" wire:ignore>
                                                <label for="product-size-add" class="form-label">Customer</label>
                                                <select class="form-control @error('job.customer_id') is-invalid @enderror" wire:model="job.customer_id" id="product-size-add">
                                                    <option value="">Please Select</option>
                                                    @forelse ($customers as $customerId => $customerName)
                                                    <option value="{{$customerId}}">{{ $customerName }}</option>
                                                    @empty
                                                    <option value="">No customers found</option>
                                                    @endforelse
                                                </select>
                                                @error('job.customer_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Job date</label>
                                                <input wire:model="job.job_date" type="date" class="form-control @error('job.job_date') is-invalid @enderror" id="product-name-add" placeholder="Job date">
                                                @error('job.job_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Due Date</label>
                                                <input wire:model="job.due_date" type="date" class="form-control @error('job.due_date') is-invalid @enderror" id="product-name-add" placeholder="Due Date">
                                                @error('job.due_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Frame Amount</label>
                                                <input wire:model="job.frame_amount" type="text" class="form-control @error('job.frame_amount') is-invalid @enderror" id="product-name-add" placeholder="Frame Amount">
                                                @error('job.frame_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Lense Amount</label>
                                                <input wire:model="job.lens_amount" type="text" class="form-control @error('job.lens_amount') is-invalid @enderror" id="product-name-add" placeholder="Lense Amount">
                                                @error('job.lens_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Paid Amount</label>
                                                <input wire:model="job.paid_amount" type="text" class="form-control @error('job.paid_amount') is-invalid @enderror" id="product-name-add" placeholder="Paid Amount">
                                                @error('job.paid_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Discount Amount</label>
                                                <input wire:model="job.discount_amount" type="text" class="form-control @error('job.discount_amount') is-invalid @enderror" id="product-name-add" placeholder="Discount Amount">
                                                @error('job.discount_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">test by</label>
                                                <input wire:model="job.test_by" type="text" class="form-control @error('job.test_by') is-invalid @enderror" id="product-name-add" placeholder="test by">
                                                @error('job.test_by')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Remarks</label>
                                                <input wire:model="job.remarks" type="text" class="form-control @error('job.remarks') is-invalid @enderror" id="product-name-add" placeholder="Remarks">
                                                @error('job.remarks')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-xl-4 col-md-6">
                                                <label for="product-name-add" class="form-label">Status</label>
                                                <input type="text" wire:model="job.status" class="form-control @error('job.status') is-invalid @enderror" id="product-name-add" placeholder="Status">
                                                @error('job.status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- job prescriptions below -->
                                        <button onclick="toggle()" class="btn btn-info mt-5">Job Prescriptions</button>
                                        <div id="myDIV" class="mt-5" style="display: none;">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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

                                        <!-- job prescriptions below -->
                                        <button onclick="toggle2()" class="btn btn-info mt-5">Job Frames</button>
                                        <div id="myDIV2" class="mt-5" style="display: none;">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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
                                                <div class="col-xl-4 col-md-6">
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


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-start">
                        <button class="btn btn-success m-1" wire:click="updateData()"> Job</button>
                        <button class="btn btn-dark m-1" wire:click="cancel()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
    @include('modals.prescription')
    @include('modals.frames')
</main>

@push('custom-style')
@endpush
@push('custom-script')
<script src="{{ asset('assets/js/add-products.js') }}"></script>
<script>
    function toggle() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function toggle2() {
        var x = document.getElementById("myDIV2");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

@endpush