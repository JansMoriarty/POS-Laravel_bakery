<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional CSS -->
</head>
<body>
    <div class="container">
        <h1>Edit Pengguna</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada kesalahan saat input data:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user_pos.update', $userPos->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $userPos->name) }}" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $userPos->email) }}" required>
            </div>

            <div>
                <label>Role</label>
                <select name="role" required>
                    <option value="admin" {{ $userPos->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="kasir" {{ $userPos->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                </select>
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="address">{{ old('address', $userPos->address) }}</textarea>
            </div>

            <div>
                <label>Foto (Opsional)</label>
                <input type="file" name="photo">
                @if ($userPos->photo)
                    <p>Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $userPos->photo) }}" alt="Foto Pengguna" width="100">
                @endif
            </div>

            <div>
                <button type="submit">Update</button>
                <a href="{{ route('user_pos.index') }}">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
