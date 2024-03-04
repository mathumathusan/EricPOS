<main>
    <div class="row">
        <div class="col-12">
            <div class="row mb-4 g-3">

                <div class="col-auto">
                    <input wire:model="role.name" type="text" id="simpleinput" class="form-control">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary"
                        wire:click.prevent="save()">{{ $roleId ? 'Update' : 'Create' }}
                    </button>
                    </div>
            </div>
            <div class="row mb-2">

                @forelse ($permissionGroups as $permissionGroup)
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <b class="card-title mb-0">{{ $permissionGroup->name }}</b>
                        </div>
                        <div class="card-body">
                            @forelse ($permissionGroup->permissions as $permission)
                            <div class="form-check">
                                <input wire:model="permissions" class="form-check-input" type="checkbox"
                                    value="{{ $permission->id }}" id="{{ $permission->id }}">
                                <label class="form-label pb-1" for="{{ $permission->id }}">
                                    {{-- {{ ucfirst(str_replace("_", " ", $permission->name)) }} --}}
                                    {{ $permission->display_name }}
                                </label>
                            </div>


                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                @empty


                @endforelse
            </div>
        </div>
    </div>

</main>
@section('title', ($roleId ? ucwords($role['name']) : 'User') .' Role Permissions')


@push('custom-style')
<style>
    .form-check {
        font-size: 15px
    }

</style>
@endpush

@push('custom-script')

@endpush
