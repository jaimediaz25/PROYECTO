<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .pagination-container {
            padding: 10px;
            background-color: #e0f7fa;
            border-radius: 12px;
        }

        .pagination .page-item .page-link {
            background-color: #0288d1;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            margin: 0 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .pagination .page-item .page-link:hover {
            background-color: #01579b;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #b0bec5;
            color: #ffffff;
            pointer-events: none;
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>
