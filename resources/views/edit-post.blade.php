<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST" style="display: flex; flex-direction: column; gap: 10px; max-width: 400px;">
        @csrf
        @method('PUT')
        <input name="title" type="text" placeholder="Title" value="{{ $post->title }}" />
        <textarea name="body" placeholder="content...">{{ $post->body }}</textarea>
        <button type="submit">Update Post</button>
    </form>
</body>
</html>