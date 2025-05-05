<!-- resources/views/user_pos/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
</head>
<body>
    <h1>Detail Pengguna</h1>

    <p><strong>Nama:</strong> {{ $userPos->name }}</p>
    <p><strong>Email:</strong> {{ $userPos->email }}</p>
    <p><strong>Role:</strong> {{ $userPos->role }}</p>
    <p><strong>Alamat:</strong> {{ $userPos->address }}</p>

    @if ($userPos->photo)
        <p><strong>Foto:</strong></p>
        <img src="{{ asset('storage/' . $userPos->photo) }}" alt="Foto Pengguna" width="150">
    @endif

    <br><a href="{{ route('user_pos.index') }}">Kembali</a>
</body>
</html>
