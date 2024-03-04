<?php

namespace App\Livewire\Pages\User;

use Livewire\Component;
use App\Models\PermissionModule;
use Spatie\Permission\Models\Permission;

class UserPermissionComponent extends Component
{
    protected $listeners = ['delete'];
    public $updateMode = false;

    public $permission = [
        'id' => '',
        'permission_module_id' => '',
        'display_name' => '',
        'name' => ''
    ];

    public function render()
    {

        $permissions = Permission::select('permissions.*', 'permission_modules.name as permission_module')
        ->leftJoin('permission_modules', 'permissions.permission_module_id', '=', 'permission_modules.id')
        ->get();
    $PermissionModules = PermissionModule::get();

        return view('livewire.pages.user.user-permission-component', compact('permissions', 'PermissionModules'));
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->permission['id'] = $id;
        $this->permission['permission_module_id'] = Permission::find($this->permission['id'])->permission_module_id;
        $this->permission['display_name'] = Permission::find($this->permission['id'])->display_name;
        $this->permission['name'] = Permission::find($this->permission['id'])->name;
    }

    public function delete($id)
    {

        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Permission Successfully Deleted']);
            $this->clear();
        }
    }


    public function deleteConfirm($id)
    {
        $this->dispatch('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function clear()
    {
        $this->dispatch('table-updated');
        $this->updateMode = false;
        $this->dispatch('modalHide');

        $this->permission['name'] = '';
        $this->permission['display_name'] = '';
        $this->permission['permission_module_id'] = '';
        $this->permission['id'] = '';
        // notify Livewire to update the UI

    }


    public function save()
    {

        $this->validate([
            'permission.name' => 'required',
            'permission.permission_module_id' => 'required',
            'permission.display_name' => 'required',

        ]);

        Permission::updateOrCreate(['id' => $this->permission['id']], [
            'permission_module_id' => $this->permission['permission_module_id'],
            'display_name' => $this->permission['display_name'],
            'name' => $this->permission['name'],
        ]);

        $this->dispatch('alert', ['type' => 'success', 'message' => 'Permission Successfully Updated']);
        $this->clear();
        // return redirect()->route('categories')->with('success', 'Package Category Updated Successfully');

    }
}
