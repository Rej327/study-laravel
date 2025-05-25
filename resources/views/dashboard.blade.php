<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
      </h2>
      <a href="{{ route('dummy.create') }}">Create</a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{ __("You're logged in!") }}
        </div>
        <div>
          <p class="text-gray-600 text-sm">
            @if (Auth::user()->isAdmin())
              {{ __('You are an admin user.') }}
            @else
              {{ __('You are a regular user.') }}
            @endif
          </p>
        </div>
        @include('card.form')
        @forelse ($dummies as $dummy)
          @include('card.card', ['dummy' => $dummy])
        @empty
          <div class="p-6 text-gray-900">
            <p class="text-gray-600 text-sm italic">Data is Empty</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</x-app-layout>
