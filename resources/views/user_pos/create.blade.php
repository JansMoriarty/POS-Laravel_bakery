<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User POS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
    </style>
</head>

<body>
    <div class="card-container">
        <!-- Panel Kiri -->
        <div class="left-panel">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/49ed3c91-6fcf-403e-b5c4-531e5a4f6b22/gBMJBtQjlK.lottie" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay></dotlottie-player>
            <h2>Tambah Pengguna</h2>
            <p>Lengkapi form di samping untuk menambahkan pengguna baru ke sistem POS.</p>
        </div>

        <!-- Panel Kanan -->
        <div class="right-panel">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada kesalahan input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('user_pos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div style="position: relative;">
                            <input type="password" name="password" id="password" required>
                            <i class="bi bi-eye-slash" onclick="togglePassword('password', this)" style="position:absolute; right:10px; top:10px; cursor:pointer;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <div style="position: relative;">
                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                            <i class="bi bi-eye-slash" onclick="togglePassword('password_confirmation', this)" style="position:absolute; right:10px; top:10px; cursor:pointer;"></i>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label>Foto (opsional)</label>
                        <input type="file" name="foto">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" required>
                            <option value="kasir">Kasir</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label>Alamat</label>
                        <textarea name="address" rows="3">{{ old('address') }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('user_pos.index') }}" class="btn-cancel">BATAL</a>
                    <button type="submit" class="btn-save">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el;
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                input.type = "password";
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        }
    </script>
</body>

</html>