<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create Dummy') }}
    </h2>
  </x-slot>

  <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

      {{-- Display Validation Errors --}}
      @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('dummy.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="title" class="block font-medium text-gray-700">Title</label>
          <input type="text" name="title" id="title" value="{{ old('title') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        </div>

        <div>
          <label for="description" class="block font-medium text-gray-700">Description</label>
          <textarea name="description" id="description" rows="4" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
        </div>


        <x-primary-button class="mt-4">
          {{ __('Create Dummy') }}
        </x-primary-button>


      </form>

    </div>
  </div>
</x-app-layout>
