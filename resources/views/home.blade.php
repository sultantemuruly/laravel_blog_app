<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <div>
        <h2>Welcome, {{ auth()->user()->name }}</h2>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <div>
        <h2>Create a blog post</h2>
        <form action="/create-post" method="POST" style="display: flex; flex-direction: column; gap: 10px; max-width: 400px;">
            @csrf
            <input name="title" type="text" placeholder="Title" />
            <textarea name="body" placeholder="content..."></textarea>
            <button type="submit">Create Post</button>
    </div>

    <div style="margin-top: 50px;">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px; max-width: 600px;">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach

    </div>
    @else
    <div style="display: flex; justify-content: center; align-items: flex-start; margin-top: 10%; gap: 50px;">
        <!-- Register Form -->
        <div style="flex: 1; max-width: 300px; text-align: center;">
            <h2>Register</h2>
            <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 10px;">
                @csrf
                <input name="name" type="text" placeholder="Name" />
                <input name="email" type="email" placeholder="Email" />
                <input name="password" type="password" placeholder="Password" />
                <button type="submit">Register</button> 
            </form>
        </div>

        <!-- Login Form -->
        <div style="flex: 1; max-width: 300px; text-align: center;">
            <h2>Log in</h2>
            <form action="/login" method="POST" style="display: flex; flex-direction: column; gap: 10px;">
                @csrf
                <input name="loginemail" type="email" placeholder="Email" />
                <input name="loginpassword" type="password" placeholder="Password" />
                <button type="submit">Log in</button> 
            </form>
        </div>
    </div>
    
    @endauth
</body>
</html>