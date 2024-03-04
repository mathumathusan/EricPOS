<?php

namespace App\Livewire\Pages\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRoleComponent extends Component
{
    protected $listeners = ['delete'];

    public function render()
    {
        $roles = Role::with('permissions')->get();
        return view('livewire.pages.user.user-role-component',compact('roles'));
    }

    public function delete($id)
    {

        $permission = Role::find($id);
        if ($permission) {
            $permission->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Role Successfully Deleted']);
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
}
