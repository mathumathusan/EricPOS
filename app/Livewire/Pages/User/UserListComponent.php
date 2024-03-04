<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserListComponent extends Component
{
    use WithPagination;
    protected $listeners = ['delete'];

    public function render()
    {
        if (Auth::check() && Auth::user()->hasRole('super-admin')) {
            $users = User::paginate(10);
        } else {
            $users = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super-admin');
            })->paginate(10);
        }



        return view('livewire.pages.user.user-list-component', compact('users'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'User Successfully Deleted']);
            cache()->flush();
        }
    }



    public function deleteConfirm($id)
    {

        if (Auth::id() == $id) {
            $this->dispatch('alert', ['type' => 'error', 'message' => "You Can't Delete Your Account"]);
            return;
        }

        $this->dispatch('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }
}
