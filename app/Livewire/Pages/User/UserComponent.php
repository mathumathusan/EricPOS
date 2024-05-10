<?php

namespace App\Livewire\Pages\User;

use App\Models\Location;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserComponent extends Component
{
    public $changePw = false;
    public $user = [
        'id' => '',
        'name' => '',
        'username'=> '',
        'email' => '',
        'login_attempts' => '',
        'profile_pic' => '',
        'is_blocked' => '',
        'last_login_at' => '',
        'last_login_ip' => '',

        'role' => '',
        'locations' => [],
    ];

    public $password;


    public function mount($id = null)
    {
        try {
            if ($id) {
                if ($user = User::whereId($id)->firstOrFail()) {
                    $this->user['id'] = $user->id;
                    $this->user['name'] = $user->name;
                    $this->user['username'] = $user->username;
                    $this->user['email'] = $user->email;
                    $this->user['profile_pic'] = $user->image;
                    $this->user['login_attempts'] = $user->login_attempts;
                    $this->user['is_blocked'] = $user->is_blocked;
                    $this->user['last_login_ip'] = $user->last_login_ip;
                    $this->user['last_login_at'] = $user->last_login_at;

                    $this->user['role'] = $user->roles()->first()->id ?? '';
                }
            } else {
                $this->changePw = true;
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404, 'This User Not Found. Please Contact Admin');
        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }

    protected function rules()
    {
        $userId = $this->user['id'];

        return [
            'user.name' => 'required',
            'user.username' => 'required|unique:users,username,' . $userId,
            'user.email' => 'email|nullable',
            'password' => $userId ? 'nullable|min:8' : 'required|min:8',
            'user.role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user.name.required' => 'The name field is required.',
            'user.username.required' => 'The username field is required.',
            'user.username.unique' => 'The username has already been taken.',
            'user.email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
            'user.role.required' => 'The role field is required.',
        ];
    }

    public function render()
    {
        if (Auth::check() && Auth::user()->hasRole('super-admin')) {
            $roles = Role::get();
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get();
        }
         
        $locations=Location::all();

        return view('livewire.pages.user.user-component', compact('roles','locations'));
    }

    public function updateData()
    {
        $this->validate();

        // dd($this->user);
        $user = $this->user['id'] ? User::findOrFail($this->user['id']) : new User;

        $user->name = $this->user['name'];
        $user->email = $this->user['email'];
        $user->username = $this->user['username'];

        $user->is_blocked = $this->user['is_blocked'] ? $this->user['is_blocked'] : 0;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        if ($this->user['role'] == null) {
            $this->user['role'] = Role::where('name', 'staff')->first()->id;
        }
        $user->syncRoles([(int)$this->user['role']]);


 


        // $user->syncRoles((int)$this->user['role']);
        $user->save();

        $user->locations()->sync($this->user['locations']);

        return redirect()->route('users')->with('success', 'User' . ($this->user['id'] ? ' Updated' : ' Created') . ' Successfully');
    }

    public function cancel()
    {
        return redirect()->route('users');
    }

    public function updatePw()
    {
        if ($this->changePw == true) {
            $this->changePw = false;
        } else {
            $this->changePw = true;
        }
    }
}
