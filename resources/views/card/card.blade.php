  <div class="p-6 text-gray-900 border-1 border-gray-200">
    <p class="text-gray-600 text-sm">
      From: {{ $dummy->name }}
    </p>
    <p class="text-gray-600 text-sm">
      Title: {{ $dummy->title }}
    </p>
    <p class="text-gray-600 text-sm">
      Description: {{ $dummy->description }}
    </p>

    @if (Auth::user()->isAdmin())
      <form action="{{ route('dummy.destroy', $dummy->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')

        <x-danger-button class="mt-4"
          onclick="event.preventDefault();
                            this.closest('form').submit();">
          Delete
        </x-danger-button>
      </form>
      <a href="{{ route('dummy.update', $dummy) }}">Update</a>
      <a href="{{ route('dummy.show', $dummy) }}">Show</a>
    @endif
  </div>
