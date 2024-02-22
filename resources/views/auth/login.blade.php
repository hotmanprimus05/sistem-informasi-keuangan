@extends('auth.layouts.main')

@section('container')
    <div class="row text-center justify-content-center">
        <div class="col-lg-6">
            <main class="form-signin w-100 m-auto">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="wrapper">
                    <div class="title">
                        Login Form
                    </div>
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="/" method="post">
                        @csrf
                        <div class="field">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            <label>Email Address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password">
                            <label>Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content">
                            <div class="checkbox">
                                <input type="checkbox" id="remember-me" name="remember" {{ session('remember') ? 'checked' : '' }}>
                                <label for="remember-me">Remember me</label>
                            </div>
                            <div class="pass-link">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                        <div class="field">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
