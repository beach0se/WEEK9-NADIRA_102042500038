<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login Aplikasi Akademik</h1>

    <form method="POST" action="/login">
        @csrf
        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </p>
        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>
        @error('email')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button type="submit">Login</button>
    </form>
</body>
</html>