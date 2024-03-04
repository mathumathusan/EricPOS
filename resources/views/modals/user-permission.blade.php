<!-- Location Modal -->
<div class="modal fade" id="permissionmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="permissionmodal"
    data-bs-keyboard="false" aria-hidden="true"  wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="permissionmodal">{{ $updateMode == true ? 'Update' : 'Create' }} Permission</h6>
                <button type="button"  wire:click.prevent="clear()" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="permission_module_id" class="form-label">Permission Module</label>
                        <select wire:model="permission.permission_module_id" class="form-select @error('permission.permission_module_id') is-invalid @enderror"
                            id="permission_module_id">
                            <option>Select Permission Module</option>

                            @forelse ($PermissionModules as $permissionModule)
                                <option value="{{ $permissionModule->id }}">{{ $permissionModule->name }}</option>
                            @empty
                            @endforelse
                        </select>



                        @error('permission.permission_module_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Permission Display Name</label>
                        <input type="text"
                            class="form-control @error('permission.display_name') is-invalid @enderror"
                            wire:model="permission.display_name" placeholder="Enter Name">

                            @error('permission.display_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Permission Name</label>
                        <input type="text"
                            class="form-control @error('permission.name') is-invalid @enderror"
                            wire:model="permission.name" placeholder="Enter Name">

                            @error('permission.name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
