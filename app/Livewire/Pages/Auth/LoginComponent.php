<?php

namespace App\Livewire\Pages\Auth;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginComponent extends Component
{

    public $username;
    public $password;

    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
    ];

    #[Layout('layouts.auth')]


    public function mount()
    {
        $this->dispatch('alert', ['type' => 'error', 'message' => 'Your account is blocked. Please contact the administrator for assistance.']);

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        if (app()->environment('local')) {
            $this->username = 'lonceytech';
            $this->password = 'lonceytech';
        }
    }


    public function render()
    {
        return view('livewire.pages.auth.login-component');
    }

    public function login(Request $request)
    {

        $this->validate();

        try {
            $user = User::where('username', $this->username)->first();
            if ($user) {
                if ($user->is_blocked) {
                    $this->dispatch('alert', ['type' => 'error', 'message' => 'Your account is blocked. Please contact the administrator for assistance.']);
                    $this->clear();
                    return;
                    //   return redirect()->route('login')->with('error','Your account is blocked. Please contact the administrator for assistance.');
                } else {

                    $credentials = [
                        'username'    => $this->username,
                        'password' => $this->password,
                    ];

                    if (Auth::attempt($credentials)) {
                        $user->last_login_ip = $request->ip();
                        $user->last_login_at = now();
                        $user->login_attempts = 0;
                        $user->save();
                        return redirect()->route('dashboard')->with('success', 'You are successfully logged in!');
                    } else {
                        $this->password = '';
                        $this->dispatch('alert', ['type' => 'error', 'message' => 'The password is incorrect. Please enter a valid password.']);
                        $user->increment('login_attempts');

                        if ($user->login_attempts >= 3) {
                            $user->is_blocked = true;
                            // Optionally, you can add a field to track the blocked timestamp:
                            // $user->blocked_at = now();
                            $user->save();
                            $this->dispatch('alert', ['type' => 'error', 'message' => 'Your account is blocked. Please contact the administrator for assistance.']);
                            $this->clear();
                            return;
                        }
                        $user->save();
                        return;
                    }
                }
            }
            $this->dispatch('alert', ['type' => 'error', 'message' => 'These credentials do not match our records']);
            $this->clear();
        } catch (\PDOException $e) {
            // Handle the database connection error
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Database connection refused. Please contact the administrator.'
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Something ent wring. plz contact admin']);
        }

    }

    public function clear()
    {
        $this->username = '';
        $this->password = '';
    }
}
