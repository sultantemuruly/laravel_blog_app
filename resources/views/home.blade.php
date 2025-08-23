<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center; margin-top: 20%;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" placeholder="Name" /><br /><br />
            <input type="email" placeholder="Email" /><br /><br />
            <input type="password" placeholder="Password" /><br /><br />
            <button type="submit">Register</button> 
        </form>
    </div>
</body>
</html>