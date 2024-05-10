<main>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Customers </div>
                    <div class="d-flex">
                        @can('add_customer')
                        <button
                            class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"  data-bs-toggle="modal"
                            data-bs-target="#customermodal"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create Customer</button>
                                @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered  table-sm table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    @can('super-admin')
                                    <th scope="col">No</th>
                                    @endcan
                                    <th scope="col">Customer Code</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Location</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Location</th>

                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                    @can('super-admin')
                                    <td>{{ $customer->id }}</td>
                                    @endcan
                                    <td><h6><span class="badge bg-primary">{{ $customer->cus_code }}</span></h6></td>
                                    <td class="fw-bold">{{ $customer->cus_name   }}</td>
                                    <td>{{ $customer->location->name  }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td> <h6><span class="badge bg-{{ $customer->is_active ? 'success' : 'danger' }}">{{ $customer->is_active ? 'Active' : 'Inactive' }}</span></h6> </td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a> --}}
                                                    @can('edit_customer')
                                                      <span  wire:click.prevent="edit({{ $customer->id }})" data-bs-toggle="modal"
                                            data-bs-target="#customermodal" class="btn btn-icon btn-sm btn-info"><i
                                                    class="ri-edit-line"></i></span>
                                                    @endcan
                                                    @can('delete_customer')
                                            <span class="btn btn-icon btn-sm btn-danger"  wire:click.prevent="deleteConfirm({{ $customer->id }})"><i
                                                    class="ri-delete-bin-6-line"></i></span>
                                                    @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can(['add_customer', 'edit_customer'])
@include('modals.customer')
@endcan
</main>
@section('title', 'Customers')


@push('custom-style')
@endpush

@push('custom-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {

            Livewire.on('modalHide', () => {
                $('#customermodal').modal('hide');
            });

        });
        document.addEventListener('livewire:initialized', () => {

            window.addEventListener('swal:modal', event => {

                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });

            });

            window.addEventListener('swal:confirm', event => {
                swal({
                        title: event.detail[0].title,
                        text: event.detail[0].text,
                        icon: event.detail[0].type,
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            @this.dispatch('delete', {
                                id: event.detail[0].id
                            });
                        }
                    });
            });
        });
    </script>
@endpush
