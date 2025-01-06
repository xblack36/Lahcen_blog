<x-layout>
    <x-slot:title>register</x-slot:title>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid d-flex justify-content-end">
                <a href="{{ route('auth.home') }}" class="btn btn-outline-primary ">Sign in</a>
            </div>
        </nav>
    <div class="d-flex justify-content-center align-items-center mt-3" style="max-height: calc(100vh -120px); ">
        <div class="card " style="height: ;width:55% !important;border-radius:20px">
            <h2 class="mx-5 mt-3 mb-4 text-center">Register a new account</h2>
    
            <form action="{{ route('auth.store') }}" method="POST" class="form-horizontal">
                @csrf
                <!-- firstname Field -->
                <div class="form-group mb-3 mx-4">
                    <label for="firstname" class=" control-label">Firstname</label>
                    <div class="">
                        <input type="text" class="form-control" id="name" name="firstname" value="{{ old('firstname') }}" >
                        @error('firstname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- lastname Field -->
                <div class="form-group mb-3 mx-4">
                    <label for="lastname" class=" control-label">Lastname</label>
                    <div class="">
                        <input type="text" class="form-control" id="name" name="lastname" value="{{ old('lastname') }}" >
                        @error('lastname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Email Field -->
                <div class="form-group mb-3 mx-4">
                    <label for="email" class=" control-label">Email</label>
                    <div class="">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <!-- Password Field -->
                <div class="form-group mb-3 mx-4">
                    <label for="password" class=" control-label">Password</label>
                    <div class="">
                        <input type="password" class="form-control" id="password" name="password" >
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <!-- Confirm Password Field -->
                <div class="form-group mb-3 mx-4">
                    <label for="password_confirmation" class=" control-label">Confirm Password</label>
                    <div class="">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div class="form-group">
                    <div class="d-flex justify-content-center mb-3" >
                        <button type="submit" class="btn btn-primary" style="width:50%">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>