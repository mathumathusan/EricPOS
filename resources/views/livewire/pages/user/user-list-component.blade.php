<main>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Users </div>
                    <div class="d-flex">
                        @can('add_users')


                        <a href="{{ route('users.add') }}"
                            class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create User</a>

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
                                    <th scope="col">User Name</th>
                                    <th scope="col">Locations</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Last Login</th>
                                    @can('super-admin')
                                    <th scope="col">Created Date</th>
                                    @endcan
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td class="fw-bold">{{ $user->name }}</td>
                                    <td><span class="badge bg-primary">{{ $user->username }}</span></td>
                                    <td></td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $role)
                                        <h6>
                                            <span
                                                class="badge bg-{{ $role == 'admin' ? 'success' : ($role == 'author' ? 'danger' : 'dark') }}">{{ ucfirst($role)}}</span>
                                        </h6>
                                        @endforeach
                                    </td>

                                    <td>{{ $user->last_login_at }}</td>
                                    @can('super-admin')
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    @endcan
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                    class="ri-eye-line"></i></a> --}}
                                            @can('edit_users')
                                            <a href="{{ route('users.edit',$user->id) }}"
                                                class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                            @endcan
                                            @can('delete_users')
                                            <span class="btn btn-icon btn-sm btn-danger"
                                                wire:click.prevent="deleteConfirm({{ $user->id }})"><i
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

</main>
@section('title', 'Users')


@push('custom-style')
@endpush

@push('custom-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {

        Livewire.on('modalHide', () => {
            $('#locationmodal').modal('hide');
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
