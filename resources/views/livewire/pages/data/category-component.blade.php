<main>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Categories </div>
                    <div class="d-flex">
                        @can('add_category')
                        <button
                            class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"  data-bs-toggle="modal"
                            data-bs-target="#categorymodal"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create Category</button>
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
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>

                                    <td class="fw-bold">{{ $category->category_name }}</td>
                                    <td><span class="badge bg-primary-transparent">{{ $category->category_code }}</span></td>
                                    <td> <h6><span class="badge bg-{{ $category->is_active ? 'success' : 'danger' }}">{{ $category->is_active ? 'Active' : 'Inactive' }}</span></h6> </td>


                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a> --}}
                                                    @can('edit_category')
                                                      <span  wire:click.prevent="edit({{ $category->id }})" data-bs-toggle="modal"
                                            data-bs-target="#categorymodal" class="btn btn-icon btn-sm btn-info"><i
                                                    class="ri-edit-line"></i></span>
                                                    @endcan
                                                    @can('delete_category')
                                            <span class="btn btn-icon btn-sm btn-danger"  wire:click.prevent="deleteConfirm({{ $category->id }})"><i
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
    @can(['add_category', 'edit_category'])
@include('modals.category')
@endcan
</main>
@section('title', 'Categories')


@push('custom-style')
@endpush

@push('custom-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {

            Livewire.on('modalHide', () => {
                $('#categorymodal').modal('hide');
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
