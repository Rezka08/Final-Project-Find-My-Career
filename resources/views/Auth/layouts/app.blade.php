<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find My Career | {{ $title }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Styles -->
    {{-- <style>
        body {
            font-family: 'Heebo', sans-serif;
            background: linear-gradient(135deg, #f6f8fb 0%, #f1f4f8 100%);
            min-height: 100vh;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 500px;
        }

        .brand-text {
            background: linear-gradient(45deg, #F29F58, #e67e22);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Inter', sans-serif;
            font-weight: 800;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #e9ecef;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #F29F58;
            box-shadow: 0 0 0 0.25rem rgba(242, 159, 88, 0.1);
        }

        .input-group-text {
            border-radius: 10px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
        }

        .btn-primary {
            background: linear-gradient(135deg, #F29F58, #e67e22);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(242, 159, 88, 0.2);
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
        }
    </style> --}}
</head>
<body>
    <div class="auth-container">
        <div class="auth-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>