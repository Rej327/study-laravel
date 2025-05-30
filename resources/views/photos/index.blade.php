<!DOCTYPE html>
<html>
<head>
    <title>Photo Gallery</title>
</head>
<body>
    <h1>Photo Gallery</h1>
    <a href="{{ route('photos.create') }}">Upload Photo</a>
    @foreach ($photos as $photo)
        <div>
            <h3>{{ $photo->title }}</h3>
            <img src="{{ asset('storage/' . $photo->image_path) }}" width="300">
            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>
