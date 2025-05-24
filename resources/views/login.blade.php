<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            background-color: #f3f4f8; /* Light grey background */
        }

        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        .card-header {
            background-color: #6f42c1; /* Deep purple */
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            border-radius: 12px 12px 0 0;
            padding: 1.5rem;
            text-align: center;
        }

        .card-body {
            padding: 2.5rem 3rem;
        }

        .form-label {
            font-weight: 600;
            color: #6f42c1; /* Deep purple */
        }

        .form-control {
            border-radius: 8px;
            border-color: #6f42c1;
        }

        .form-control:focus {
            border-color: #5a2a8c; /* Darker purple when focused */
            box-shadow: 0 0 5px rgba(95, 22, 141, 0.5);
        }

        .btn-primary {
            background-color: #6f42c1; /* Deep purple */
            border-color: #6f42c1;
            border-radius: 8px;
            font-weight: bold;
            padding: 0.75rem;
        }

        .btn-primary:hover {
            background-color: #5a2a8c; /* Darker purple */
            border-color: #5a2a8c;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        /* Responsive adjustments */
        @media (max-width: 575px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg" style="width: 400px;">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <!-- Form login -->
                <form action="/dashboard"method="GET" class="space-y-4">
                    @csrf  <!-- CSRF Token untuk melindungi form dari serangan CSRF -->
                    
                    <!-- Pesan error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Input untuk username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <!-- Input untuk email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Input untuk password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Tombol submit -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>