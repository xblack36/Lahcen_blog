<x-layout>
    <x-slot:title>
        show 
    </x-slot:title>
    <x-nav/>
    <div class="d-flex justify-content-center align-items-center mt-4 mb-5">
        <div class="card" style="width: 23rem;">
            @if (!$post->image)
                <div>
                    <img class="rounded-circle " style="width: 100% !important;height:380px !important"  src="{{asset('storage/' . $post->img_path ) }}" class="card-img-top" alt="...">
                </div>
            @endif
            
            <div class="card-body">
                <h5 class="card-title text-danger">id : <span class="text-black">{{ $post->id }}</span></h5> 
                <h5 class="card-title text-danger">title : <span class="text-black">{{ $post->title }}</span></h5>
                <h5 class="card-text text-danger">description : <span class="text-black">{{ $post->description }}.</span></h5>
                <a href="{{ route('postes.index') }}" class="btn btn-primary mt-2">Go back to all posts</a>
            </div>
        </div>
    </div>
</x-layout>