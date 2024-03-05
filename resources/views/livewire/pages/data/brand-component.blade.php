<main>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Brands </div>
                    <div class="d-flex">
                        @can('add_brand')
                        <button
                            class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"  data-bs-toggle="modal"
                            data-bs-target="#brandmodal"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create Brand</button>
                                @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered  table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>

                                    <td class="fw-bold">{{ $brand->brand_name }}</td>
                                    <td><span class="badge bg-primary-transparent">{{ $brand->brand_code }}</span></td>
                                    <td> <h6><span class="badge bg-{{ $brand->is_active ? 'success' : 'danger' }}">{{ $brand->is_active ? 'Active' : 'Inactive' }}</span></h6> </td>


                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a> --}}
                                                    @can('edit_brand')
                                                      <span  wire:click.prevent="edit({{ $brand->id }})" data-bs-toggle="modal"
                                            data-bs-target="#brandmodal" class="btn btn-icon btn-sm btn-info"><i
                                                    class="ri-edit-line"></i></span>
                                                    @endcan
                                                    @can('delete_brand')
                                            <span class="btn btn-icon btn-sm btn-danger"  wire:click.prevent="deleteConfirm({{ $brand->id }})"><i
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
    @can(['add_brand', 'edit_brand'])
@include('modals.brand')
@endcan
</main>
@section('title', 'Brands')


@push('custom-style')
@endpush

@push('custom-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {

            Livewire.on('modalHide', () => {
                $('#brandmodal').modal('hide');
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
