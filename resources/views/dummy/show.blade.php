<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Show Dummy') }}
    </h2>
  </x-slot>
  <p>Title: {{ $dummy->title }}</p>
  <p>Description: {{ $dummy->description }}</p>
</x-app-layout>
