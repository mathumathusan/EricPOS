<main>
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card custom-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Personal info</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" wire:model="user.name" @error('user.name')
                                        is-invalid @enderror id="name" placeholder="Name">

                                    @error('user.name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('user.username') is-invalid @enderror"
                                        id="username" wire:model="user.username" placeholder="User Name">
                                    @error('user.username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="text" class="form-control @error('user.email') is-invalid @enderror"
                                        id="email" wire:model="user.email" placeholder="youremail@email.com">
                                    @error('user.email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @role(['super-admin'])
                                <div class="row">

                                    <div class="col-auto">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">User Role</label>
                                            <select id="role" wire:model="user.role"
                                                class="form-control @error('user.role') is-invalid @enderror">
                                                <option value="">Choose Role</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ ucfirst($role->name) }}</option>
                                                @endforeach
                                            </select>

                                            @error('user.role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="mb-3">
                                            <label for="login_attempt" class="form-label">Login
                                                Attempt</label>
                                            <input type="number"
                                                class="form-control @error('user.login_attempts') is-invalid @enderror"
                                                id="login_attempt" wire:model="user.login_attempts">

                                            @error('user.login_attempts')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Is Blocked</label>

                                            <h5><input id="role" class="form-check-input" type="checkbox"
                                                    wire:model="user.is_blocked" wire:model="user.is_blocked"
                                                    {{ $user['is_blocked'] ? 'checked' : '' }}>
                                            </h5>


                                            @error('user.role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                @endrole


                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    @if ($user['id'])
                                    <img alt="Chris Wood" src="{{ $user['profile_pic'] }}"
                                        class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                        @else
                                        <img alt="Chris Wood" src="{{ asset('assets/images/apps/figma.png') }}"
                                        class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                    @endif
                                    @if (false)
                                    <div class="mt-2">
                                        <span class="btn btn-primary"><i class="fas fa-upload"></i>
                                            Upload</span>
                                    </div>
                                    <small>For best results, use an image at least 128px by 128px in .jpg
                                        format</small>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <button type="button" wire:click="updateData()" class="btn btn-primary">Save
                            changes</button>
                        <button type="button" wire:click="cancel" class="btn btn-dark">Cancel</button>

                    </form>
                    @if ($user['id'])
                    <small class="mt-3 fw-bold text-danger d-block">Last Login At: {{ $user['last_login_at']  }}</small>
                    <small> <a href="https://whatismyipaddress.com/ip/{{ $user['last_login_ip']  }}" target="_blank" class="mt-1 fw-bold  d-block"> Last Login IP: {{ $user['last_login_ip']  }}</a>   </small>
            @endif
                </div>

            </div>

        </div>
        <div class="col-md-6 col-xl-6">

            <div class="card custom-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Password</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form>
                            <button type="button" wire:click.prevent="updatePw()"
                                class="btn btn-{{ $changePw ? 'dark' : 'primary' }}">Click to change password</button>

                            <div class="mt-3">
                                <label for="password" class="form-label">New password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror "
                                    id="password" wire:model="password" {{ $changePw ? '' : 'disabled' }}>


                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>

</main>
@section('title', ($user['id'] ? 'Update' : 'Create').' User')


@push('custom-style')

@endpush

@push('custom-script')

@endpush
