<main>
    <div class="card custom-card">
        <div class="card-body p-4">
            <p class="h5 fw-semibold mb-2 text-center">Sign In</p>
            {{-- <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back !</p> --}}
            <div class="row">

                <form wire:submit.prevent="login">
                    @csrf
                    <div class="col-xl-12  mb-2">
                        <label for="username" class="form-label text-default">User Name</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" wire:model="username" placeholder="user name">
                        @error('username')
                        <div  class="invalid-feedback">{{ $message }}</div >
                    @enderror
                    </div>
                    <div class="col-xl-12 mb-2 ">
                        <label for="signin-password" class="form-label text-default d-block">Password

                          @if (false)
                          <a href="reset-password-basic.html" class="float-end text-danger">Forget password ?</a>
                          @endif

                        </label>
                        <div class="input-group">
                            <input type="password"  wire:model="password"  class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="password">
                            <button class="btn btn-light" type="button" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>

                            @error('password')
                            <div  class="invalid-feedback">{{ $message }}</div >
                        @enderror
                        </div>

                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                    Remember password ?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 d-grid mt-4">
                        <button type="submit" class="btn btn-primary" >Sign In</button>
                    </div>

                </form>

            </div>

            @if (false)
            <div class="text-center">
                <p class="fs-12 text-muted mt-3">Dont have an account? <a href="sign-up-basic.html" class="text-primary">Sign Up</a></p>
            </div>
            <div class="text-center my-3 authentication-barrier">
                <span>OR</span>
            </div>
            <div class="btn-list text-center">
                <button class="btn btn-icon btn-light">
                    <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                </button>
                <button class="btn btn-icon btn-light">
                    <i class="ri-google-line fw-bold text-dark op-7"></i>
                </button>
                <button class="btn btn-icon btn-light">
                    <i class="ri-twitter-x-line fw-bold text-dark op-7"></i>
                </button>
            </div>

            @endif
        </div>
    </div>
<a class="d-block text-muted text-center fw-bold" href='https://www.lonceytech.com'
     target="_blank"> Developed by : Loncey Tech (Pvt) Ltd</a>

</main>
@section('title','Login')
