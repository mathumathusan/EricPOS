<main>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Permissions </div>
                    <div class="d-flex">
                        @can('add_permission')
                        <button class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#permissionmodal"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create Permission</button>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered  table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Group Name</th>
                                    @role('super-admin')
                                    <th>Created Date</th>
                                    @endrole
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>

                                    <td class="fw-bold">{{ $permission->name }}</td>
                                    <td><span class="badge bg-primary">{{ $permission->permission_module }}</span></td>

                                    @can('super-admin')
                                    <td>{{ $permission->created_at->diffForHumans() }}</td>
                                    @endcan
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a> --}}
                                            @can('edit_permission')
                                            <span wire:click.prevent="edit({{ $permission->id }})" data-bs-toggle="modal"
                                                data-bs-target="#permissionmodal" class="btn btn-icon btn-sm btn-info"><i
                                                    class="ri-edit-line"></i></span>
                                            @endcan
                                            @can('delete_permission')
                                            <span class="btn btn-icon btn-sm btn-danger"
                                                wire:click.prevent="deleteConfirm({{ $permission->id }})"><i
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
    @can(['add_permission', 'edit_permission'])
    @include('modals.user-permission')
@endcan
</main>
@section('title', 'User Permissions')


@push('custom-style')
@endpush

@push('custom-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {

        Livewire.on('modalHide', () => {
            $('#permissionmodal').modal('hide');
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
