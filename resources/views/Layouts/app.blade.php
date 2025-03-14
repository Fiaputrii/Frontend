<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perwalian Mahasiswa')</title>

    <!-- Link untuk Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif; /* Apply Roboto font globally */
            background-color: #f4f7fa;
            color: #333;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background-color: #2b3e50;
            color: white;
            padding-top: 40px;
            transition: width 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif; /* Apply Poppins font to sidebar */
        }

        .sidebar-title {
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            color: #1abc9c;  /* Ganti warna oranye dengan warna tosca */
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #1abc9c;  /* Ganti garis bawah dengan warna tosca */
            padding-bottom: 10px; /* Menambahkan ruang antara teks dan garis */
        }

        .sidebar .nav-item {
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            color: #bbb;
            padding: 15px;
            font-size: 1.1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif; /* Apply Poppins font to nav links */
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #1abc9c;  /* Ganti warna hover dan aktif dengan warna tosca */
            color: white;
        }

        .sidebar .nav-link i {
            margin-right: 15px;
        }

        /* Content Area */
        .main-content {
            margin-left: 260px;
            padding: 40px;
            transition: margin-left 0.3s ease;
            font-family: 'Roboto', sans-serif; /* Apply Roboto font to content */
        }

        .content-section {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .content-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #2c3e50;
        }

        .content-section p {
            font-size: 1.1rem;
            color: #7f8c8d;
        }

        /* Sidebar toggle for mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding-top: 10px;
            }

            .main-content {
                margin-left: 0;
                padding-left: 20px;
                padding-right: 20px;
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar.open {
                width: 250px;
                padding-top: 40px;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-title">Sistem Perwalian</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('mahasiswa.index') }}" class="nav-link">
                        <i class="bi bi-person-fill"></i> Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dosenwali.index') }}" class="nav-link">
                        <i class="bi bi-person-check-fill"></i> Dosen Wali
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pertemuanperwalian.index') }}" class="nav-link">
                        <i class="bi bi-calendar-check-fill"></i> Pertemuan Perwalian
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notifikasi.index') }}" class="nav-link">
                        <i class="bi bi-calendar-check-fill"></i> Notifikasi
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container-fluid">
                    <button class="btn btn-outline-primary d-lg-none" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
            </nav>

            <div class="content-section">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JS and Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
    </script>

</body>

</html>
