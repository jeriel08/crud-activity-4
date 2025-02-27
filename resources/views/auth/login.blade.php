<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 border-0" style="width: 400px;">
            <h3 class="text-center mb-3">{{ __('Login') }}</h3>

            <!-- Session Status -->
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email Address">
                    @if ($errors->has('email'))
                        <div class="text-danger small">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password" placeholder="Password">
                    @if ($errors->has('password'))
                        <div class="text-danger small">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                    <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class='bx bx-log-in fs-4'></i>
                        {{ __('Log in') }}
                    </button>
                
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
