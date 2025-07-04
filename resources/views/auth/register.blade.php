<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistem Pengaduan Masyarakat') }} - Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 20px 40px;
        }

        .gov-header {
            background: #1e40af;
            color: white;
            padding: 8px 0;
            text-align: center;
            font-size: 0.8rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .gov-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #1f2937;
            color: #9ca3af;
            text-align: center;
            padding: 8px;
            font-size: 0.75rem;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 500px;
        }

        .info-section {
            background: linear-gradient(135deg, #1e40af, #2563eb);
            color: white;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 2rem;
            margin-right: 15px;
            color: #dbeafe;
        }

        .logo h1 {
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .info-text h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #f1f5f9;
        }

        .info-text p {
            font-size: 1rem;
            line-height: 1.6;
            color: #cbd5e1;
            margin-bottom: 30px;
        }

        .features {
            list-style: none;
        }

        .features li {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            color: #e2e8f0;
        }

        .features li i {
            margin-right: 12px;
            color: #60a5fa;
            width: 16px;
        }

        .login-section {
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h3 {
            font-size: 1.6rem;
            color: #1e293b;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .login-header p {
            color: #64748b;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #374151;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            background: #f9fafb;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }

        .login-btn:hover {
            background: #2563eb;
        }

        .login-btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }

        .register-text {
            text-align: center;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .register-text a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }

        .register-text a:hover {
            color: #2563eb;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 10px;
        }

        .alert-danger {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }

        .alert-success {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #16a34a;
        }

        .error-text {
            color: #dc2626;
            font-size: 0.8rem;
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                max-width: 400px;
            }

            .info-section {
                padding: 30px 25px;
                order: 2;
            }

            .login-section {
                padding: 30px 25px;
                order: 1;
            }

            .info-text h2 {
                font-size: 1.5rem;
            }

            .features {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="gov-header">
        <i class="fas fa-flag"></i> Pemerintah Daerah - Sistem Pengaduan Masyarakat
    </div>

    <div class="container">
        <!-- Info Section -->
        <div class="info-section">
            <div class="logo">
                <i class="fas fa-user-plus"></i>
                <div>
                    <h1>Pengaduan<br>Masyarakat</h1>
                </div>
            </div>
            <div class="info-text">
                <h2>Buat Akun Baru</h2>
                <p>Daftarkan diri Anda untuk menyampaikan pengaduan dengan mudah dan cepat.</p>
            </div>
            <ul class="features">
                <li><i class="fas fa-check-circle"></i> Mudah dan gratis</li>
                <li><i class="fas fa-shield-alt"></i> Aman dan terpercaya</li>
                <li><i class="fas fa-phone-volume"></i> Respon cepat</li>
            </ul>
        </div>

        <!-- Register Section -->
        <div class="login-section">
            <div class="login-header">
                <h3>Daftar Akun Baru</h3>
                <p>Isi data Anda dengan benar</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        placeholder="Masukkan nama lengkap">
                    @error('name') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        placeholder="Masukkan email aktif">
                    @error('email') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password">
                    @error('password') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        placeholder="Ulangi password">
                </div>

                <!-- <div class="form-group">
                    <label for="role">Daftar Sebagai</label>
                    <select id="role" name="role" required>
                        <option value="">-- Pilih Peran --</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Pengguna</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role') <div class="error-text">{{ $message }}</div> @enderror
                </div> -->

                <button type="submit" class="login-btn" id="registerBtn">Daftar</button>
            </form>

            <div class="register-text">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>

    <div class="gov-footer">
        © 2025 Pemerintah Daerah. Hak cipta dilindungi undang-undang.
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function () {
            const btn = document.getElementById('registerBtn');
            btn.textContent = 'Memproses...';
            btn.disabled = true;
        });

        const inputs = document.querySelectorAll('input[required], select[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', function () {
                this.style.borderColor = this.value ? '#16a34a' : '#dc2626';
            });
        });
    </script>
</body>

</html>