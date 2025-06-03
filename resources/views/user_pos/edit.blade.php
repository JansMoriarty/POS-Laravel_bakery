<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Poppins, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            background-color: #F97417;
            width: 35%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: white;
        }

        .left-panel img {
            width: 200px;
            margin-bottom: 20px;
        }

        .left-panel h2 {
            margin-bottom: 10px;
        }

        .left-panel p {
            text-align: center;
            font-size: 14px;
            line-height: 1.4;
        }

        .right-panel {
            width: 65%;
            padding: 40px;
        }

        .form-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            flex: 1 1 100%;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
        }

        input,
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-cancel {
            background: #444;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save {
            background-color: #F97417;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        .user-image {
            margin-top: 12px;
            border-radius: 10px;
            width: 100px;
            object-fit: cover;
        }

        .alert {
            background-color: #ffcdd2;
            color: #c62828;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <div class="card-container">
        <!-- Panel Kiri -->
        <div class="left-panel">
            <dotlottie-player
                src="https://lottie.host/49ed3c91-6fcf-403e-b5c4-531e5a4f6b22/gBMJBtQjlK.lottie"
                background="transparent"
                speed="1"
                style="width: 250px; height: 250px"
                loop
                autoplay></dotlottie-player>
            <h2>Edit Pengguna</h2>
            <p>Perbarui informasi akun pengguna agar tetap relevan dan akurat.</p>
        </div>

        <!-- Panel Kanan -->
        <div class="right-panel">
            @if ($errors->any())
            <div class="alert">
                <strong>Oops!</strong> Ada kesalahan saat input data:
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

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ old('name', $userPos->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', $userPos->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" required>
                            <option value="admin" {{ $userPos->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="kasir" {{ $userPos->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label>Alamat</label>
                        <textarea name="address">{{ old('address', $userPos->address) }}</textarea>
                    </div>

                    <div class="form-group full-width">
                        <label>Foto (Opsional)</label>
                        <input type="file" name="photo">
                        @if ($userPos->photo)
                        <img src="{{ asset('storage/' . $userPos->photo) }}" alt="Foto Pengguna" class="user-image">
                        @endif
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('user_pos.index') }}" class="btn-cancel">BATAL</a>
                    <button type="submit" class="btn-save">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</body>


<script
    src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
    type="module"></script>

</html>