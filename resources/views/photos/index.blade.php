<x-app-layout>
  <div class="flex flex-col items-center">
    <h1 class="text-center my-4 text-2xl">Photo Gallery</h1>
    <a href="{{ route('photos.create') }}" class="bg-blue-500 text-white px-2 py-4 rounded-lg hover:bg-blue-600 ">Upload
      Photo</a>
  </div>
  <div class="flex flex-wrap gap-4 max-w-7xl mx-auto p-4">
    @foreach ($photos as $photo)
      <div class="border p-4 mb-4 w-fit bg-white shadow-sm rounded-lg">
        <h3>{{ $photo->title }}</h3>
        <img src="{{ asset('storage/' . $photo->image_path) }}" width="300">
        <div class="flex flex-col items-center">
          <a href={{ route('photos.show', $photo->id) }}
            class="mt-2 bg-green-500 text-white w-fit p-2 mx-auto rounded-lg hover:bg-green-600">
            Comments
          </a>
          <form action="{{ route('photos.destroy', $photo->id) }}" method="POST"
            class="mt-2 bg-red-500 text-white w-fit p-2 mx-auto rounded-lg hover:bg-red-600">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</x-app-layout>
