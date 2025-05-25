<form method='GET' action="{{ route('dashboard') }}" class="my-4">
  <input type="text" name="search" value="{{ request('search') }}">

  <select name="sort_by">
    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
    <option value="description" {{ request('sort_by') == 'description' ? 'selected' : '' }}>Description</option>
  </select>

  <select name="sort_order">
    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
  </select>

  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
    Search
  </button>
  <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
    Reset
  </a>
</form>
