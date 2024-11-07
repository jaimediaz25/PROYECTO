<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .menu-container {
            text-align: center;
        }
        .menu-button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background-color: #4A90E2; 
            color: #fff; 
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 50px;
            margin-right: 50px;
        }
        .menu-button:hover {
            background-color: #357ABD;
        }
        .logout-button {
            background-color: #E74C3C; 
        }

        .logout-button:hover {
            background-color: #C0392B; 
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>
