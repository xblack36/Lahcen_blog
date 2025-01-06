<x-layout>
    <x-slot:title>Login</x-slot:title>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid d-flex justify-content-end">
            <a href="{{ route('auth.register') }}" class="btn btn-outline-primary ">Sign up</a>
        </div>
    </nav>
    <form action={{ route('auth.login') }} method="POST">
        @csrf
        <div class="d-flex justify-content-center align-items-center" style="height: 90vh;width:100vw;">
            <div class="card " style="height: 80vh !important;override:hidden !important;width:55% !important;border-radius:20px">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    @if(session('errorGoogle'))
                    <div class="alert alert-danger">{{ session('errorGoogle') }}</div>
                    @endif
                <h1 class="d-block text-center mt-5 ">Sign in</h1>
                <!-- Email Field -->
                <div class="form-group mx-5 mb-2">
                    <label for="email" class=" control-label">Email</label>
                    <div class="">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        
                <!-- Password Field -->
                <div class="form-group mx-5 mb-4">
                    <label for="password" class=" control-label">Password</label>
                    <div class="">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" >remember me</label>
                    </div>
                    @error('failed')
                        <div class="text-danger text-center mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary fw-bold" style="width: 40%">Log in</button>
                </div>
                
                <span class="pt-2 pb-2 text-center fw-bold">-OR-</span>
                <div style="width: 100%;display:flex;justify-content:center" >
                    @error('error')<div class="text-danger text-center mt-2">{{ $message }}</div>@enderror
                   
                        <a href="http://127.0.0.1:8000/auth/google" class="btn btn-outline-dark fw-bold px-3" style="min-width: 40%;border-radius: 25px !important">
                            <img src="{{ asset('google.png') }}" width='25px' height="25px" style="padding-right: 4px !important" alt="google icon">sign in with google
                        </a>
                    
                </div>
            </div>
        </div>
    </form>
</x-layout>
