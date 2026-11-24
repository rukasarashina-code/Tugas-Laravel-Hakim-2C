<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Apps Student</title>
    <style type="text/css">
        body { font-family: sans-serif; }
        h2 { text-align: center; color: salmon; font-weight: bolder; }
        .form-login { border: 2px solid skyblue; width: 30%; min-width: 280px; border-radius: 30px; box-shadow: 5px 8px 3px 2px navy; padding: 15px 0; }
        .input { width: 80%; height: 40px; border-radius: 20px; font-size: 15px; padding: 2px 10px; }
        .tombol { width: 50%; height: 50px; border-radius: 20px; background-color: lightsalmon; color: white; font-weight: bolder; border: none; cursor: pointer; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Login Admin</h2>
    <center>
        <form method="POST" action="/login">
            @csrf
            <div class="form-login">
                @if (session('error'))
                    <p class="error">{{ session('error') }}</p>
                @endif
                <p><input type="text" class="input" name="username" placeholder="Username" value="{{ old('username') }}"></p>
                <p><input type="password" class="input" name="password" placeholder="Password"></p>
                <p><button class="tombol" type="submit">LOGIN</button></p>
            </div>
        </form>
    </center>
</body>
</html>
