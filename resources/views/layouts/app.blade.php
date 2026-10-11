
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduSpace Campus')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fc;
            color: #172554;
        }
        .brand {
            font-size: 23px;
            font-weight: 800;
            color: #3157d5;
        }
        .brand span { color: #172554; }
        .btn-primary {
            background: #3157d5;
            border-color: #3157d5;
            border-radius: 10px;
            padding: 12px 20px;
        }
        .btn-primary:hover {
            background: #2445b5;
        }
        .form-control {
            padding: 12px;
            border-radius: 10px;
        }
        .card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 8px 35px rgba(30, 50, 100, .07);
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
