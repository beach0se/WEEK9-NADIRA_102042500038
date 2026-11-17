<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }} (role: {{ auth()->user()->role }})</p>

    <h3>Uji akses</h3>
    <ul>
        <li><a href="/materi">/materi</a></li>
        <li><a href="/admin">/admin</a></li>
        <li><a href="/dosen">/dosen</a></li>
        <li><a href="/mahasiswa">/mahasiswa</a></li>
        <li><a href="/pengguna">/pengguna</a></li>
        <li><a href="/kelola-materi">/kelola-materi</a></li>
        <li><a href="/kelola-nilai">/kelola-nilai</a></li>
        <li><a href="/nilai-saya">/nilai-saya</a></li>
    </ul>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>