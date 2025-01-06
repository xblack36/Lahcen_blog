<x-layout>
    {{-- @section('title')
        create 
    @endsection --}}
    <x-slot:title>
        create                         
    </x-slot:title>
    <x-nav/>
    <div style="max-width:60%" class="d-flex justify-content-center mx-auto ">
        <form class="row g-3 mt-2 d-flex " action={{ route('postes.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-primary">Create Post :</h3>
            <div class="d-flex d-inline-block">
                <input type="text" class="form-control"  placeholder="title" value="{{ old('title') }}"  name="title" >
            </div>
            <div class="d-flex d-inline-block   ">
                <textarea rows="8" class="form-control"  placeholder="description" name="description"  >{{ old('description') }}</textarea>
            </div>
            <div class="">
                <label for="photo">Post image:</label>
                <input type="file" name="image" id="photo" value="choose image" >
                @error('image')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex d-inline-block  align-items-center ">
                <span class="d-inline-block mr-2" style="width: 15% !important;">Post creator :</span>
                <select name="user_id" id="" class="form-select">
                    <option selected>Choose...</option>
                    @foreach ($users as $user)
                        <option value={{ $user->id }}>{{ $user->firstname .' '. $user->lastname }}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
            <div class="text-danger d-block " style="padding-left: 15%">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-5">Create POST</button>
            </div>

        </form>
    </div>
</x-layout>