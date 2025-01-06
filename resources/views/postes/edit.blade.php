<x-layout>
  {{-- @section('title')
    edit 
  @endsection --}}
    <x-slot:title>
        edit
    </x-slot:title>
    <x-nav/>
    <div style="max-width:60%" class="d-flex justify-content-center mx-auto ">
        <form class="row g-3 mt-2 d-flex " action={{ route('postes.update',$post->id) }} method="POST" enctype="multipart/formdata">
          @method('PUT')
            @csrf
            <h3 class="text-primary">Update Post :</h3>
            <div class="">
              <label for="" class="mr-2 mb-2">title:</label>
                <input type="text" class="form-control" id="inputCity" placeholder="title"  name="title" required="true" value={{ $post->title }}>
            </div>
            <div >
              <label for="" class="mr-2 mb-2">description:</label>
                <textarea rows="4" class="form-control" id="inputAddress2" placeholder="description" name="description" required="true" >{{ $post->description }}</textarea>
            </div>
            <div class="d-flex justify-content-center align-items-center mx-auto ">
              <div>
                <label >image :</label>
                <img  src="{{asset('/storage/'.$post->img_path)  }}" style="height:100px;width:100px !important">
                <label style="margin-right: 10px !important" for="img">change image </label>
                <input id="img" name="image" type="file">
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary px-5">Update POST</button>
            </div>
        </form>
    </div>
</x-layout>