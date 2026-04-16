<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Helpdesk</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 600;
        }

        .navbar-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .navbar-menu a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .navbar-menu a:hover {
            opacity: 0.8;
        }

        .logout-btn {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            color: white;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .welcome-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: 600;
        }

        .welcome-info h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 5px;
        }

        .welcome-info p {
            color: #666;
            font-size: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .info-card {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .info-card h3 {
            color: #333;
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .info-card p {
            color: #667eea;
            font-size: 20px;
            font-weight: 600;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .quick-link-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: transform 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .quick-link-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .role-badge {
            display: inline-block;
            background-color: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Helpdesk</div>
        <div class="navbar-menu">
            <a href="#dashboard">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <div class="welcome-header">
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                </div>
                <div class="welcome-info">
                    <h1>
                        Selamat Datang, {{ Auth::user()->nama }}!
                        <span class="role-badge">{{ ucfirst(Auth::user()->role) }}</span>
                    </h1>
                    <p>Anda berhasil login ke sistem Helpdesk</p>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-card">
                    <h3>Username</h3>
                    <p>{{ Auth::user()->username }}</p>
                </div>
                <div class="info-card">
                    <h3>Role</h3>
                    <p>{{ ucfirst(Auth::user()->role) }}</p>
                </div>
                <div class="info-card">
                    <h3>Bergabung Sejak</h3>
                    <p>{{ Auth::user()->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="quick-links">
                <a href="#" class="quick-link-btn">Buat Pengaduan</a>
                <a href="#" class="quick-link-btn">Lihat Pengaduan</a>
                <a href="#" class="quick-link-btn">Profil Saya</a>
            </div>
        </div>
    </div>
</body>
</html>
