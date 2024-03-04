<?php

namespace App\Livewire\Pages\User;

use Livewire\Component;
use App\Models\PermissionModule;
use Spatie\Permission\Models\Role;

class UserRolePermissionComponent extends Component
{
    public $permissions = [];
    public $role = [
        'name' => ''
    ];
    public $roleId;




    public function mount($id = null)
    {
        $this->roleId = $id;

        if ($this->roleId) {
            $this->role['name'] = Role::findOrFail($this->roleId)->name;
            $this->permissions = Role::findById($id)->permissions->pluck('id')->toArray();
        }
    }

    public function render()
    {
        $permissionGroups = PermissionModule::with('permissions')->get();
        return view('livewire.pages.user.user-role-permission-component', compact('permissionGroups'));
    }


    public function save()
    {
        if ($this->roleId )
        {
               $role =  Role::findOrFail($this->roleId);
               $role->name = $this->role['name'];
               $role->save();
        }
        else {
            $role = new Role();
            $role->name = $this->role['name'];
            $role->save();
        }
        $role->syncPermissions($this->permissions);
        return redirect()->route('user-roles')->with('success', 'Role' . ($this->roleId ? ' Updated' : ' Created') . ' Successfully');
    }
}
