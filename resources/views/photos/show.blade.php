<x-app-layout>
  <h1 class="text-2xl text-center my-4">Photo Details</h1>

  <div class="max-w-2xl mx-auto p-4 bg-white shadow-sm rounded-lg">
    <h2 class="text-xl font-semibold mb-4">{{ $photo->title }}</h2>
    <img src="{{ asset('storage/' . $photo->image_path) }}" class="w-full h-auto mb-4 rounded-lg">
    <h3 class="text-lg font-semibold mb-2">Comment</h3>

    @if ($photo->comments->isEmpty())
      <p class="text-gray-500 text-sm">No comments yet. Be the first to comment!</p>
    @else
      @foreach ($photo->comments as $comment)
        @include('photos.comment-card', ['comment' => $comment])
      @endforeach
    @endif



    <form action="{{ route('comments.store', $photo->id) }}" method="POST" class="mt-2">
      @csrf
      @method('POST')
      <input type="text" name="comment" placeholder="Add a comment..." class="w-full p-2 border rounded-lg mb-2"
        required>
      <input type="hidden" name="photo_id" value="{{ $photo->id }}">
      @if ($errors->any())
        <div class="text-red-500 mb-2">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        <h3 class="text-lg font-semibold mb-2">Add a Comment</h3>
      </button>
    </form>
  </div>
</x-app-layout>
