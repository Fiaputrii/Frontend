<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perwalian Mahasiswa')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #2b3e50;
            color: white;
            padding-top: 40px;
        }

        .sidebar-title {
            text-align: center;
            font-size: 1.5rem;
            color: #1abc9c;
            margin-bottom: 30px;
        }

        .sidebar .nav-link {
            color: #ccc;
            padding: 10px 20px;
            display: block;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #1abc9c;
            color: #fff;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .content-section {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
    

    <div class="sidebar">
        <div class="sidebar-title">Sistem Perwalian2</div>
        <nav class="nav flex-column">
            <a href="/dosen/mahasiswa" class="nav-link"><i class="bi bi-person-fill"></i> Mahasiswa</a>
            <a href="{{ route('dosen.perwalian.index') }}" class="nav-link"><i class="bi bi-person-check-fill"></i> Jadwal Perwalian</a>
			<a href="{{ route('logout') }}" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </nav>
    </div>

    <div class="main-content">
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
			<div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <div class="content-section">
            @yield('content')
        </div>
    </div>

    
    
</body>
</html>
