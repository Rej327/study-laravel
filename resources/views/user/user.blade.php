<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{ __("You're logged in!") }}
        </div>
        <div>
          <p class="text-gray-600 text-lg text-center">
            {{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}
            {{ __('You are a regular user.') }}
            {{ __('Email: :email', ['email' => Auth::user()->email])}}
          </p>
        </div>
      </div>
    </div>
</x-app-layout>
