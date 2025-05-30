<!DOCTYPE html>
<html>
<head>
    <title>Upload Photo</title>
</head>
<body>
    <h1>Upload New Photo</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required><br><br>
        <label>Photo:</label>
        <input type="file" name="image" required><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
