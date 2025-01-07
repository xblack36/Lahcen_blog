<x-layout>
    {{-- @section('title')
        index 
    @endsection --}}
    <x-slot:title>
        index 
    </x-slot:title>
    <x-nav/>
    @if(session('success'))    
        <div class="d-flex justify-content-center">
            <div id="session" class="text-success fw-bold mt-3 bg-dark text-center" style="max-width: 50% !important">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center mt-5">
        <table class="table table-responsive mx-auto mt-5" style="max-width: 70%">
            <thead>
                <tr>
                    {{-- <th scope="col">Id</th> --}}
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Created at</th>
                    <th scope="col" class="action">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                    {{-- @dd($posts ) --}}
                        @foreach ($posts as $post) 
                        <tr>
                            {{-- <td>{{ $post->id }}</td> --}}
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->user->firstname .' '.$post->user->lastname }}</td>
                            <td>{{ $post->created_at !== null ? $post->created_at->diffForHumans() : "" }}</td>
                            {{-- diffForHUmans() to make date like '2 hour ago' --}}
                            <td class="d-flex justify-content-center ">
                            <a class="btn btn-info " href="/postes/{{ $post->id  }}">view</a>
                            {{-- <a class="btn btn-warning mx-1" href="/postes/{{ $post->id  }}/edit">Edit</a> --}}
                            <a class="btn btn-warning mx-1" href="/postes/{{ $post->id  }}/edit">Edit</a>
                            <form class="" action="{{ route('postes.destroy', $post) }}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-auto">Delete</button>
                            </form>
                            </td> 
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <a href={{ route('postes.create') }} class="btn btn-primary px-5 text-align-center">Create POST</a>
            </div>
            <div class="">
                {{-- php artisan vendor:publish --tag=laravel-pagination then --}}
                {{-- {{ $posts->links('vendor.pagination.bootstrap-5') }} --}}
            </div>
            <script>
                setTimeout(() => {
                    const alert = document.getElementById('session');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 5000); // Adjust time as needed
            </script>
</x-layout>