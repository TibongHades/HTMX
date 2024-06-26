<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@2.0.0"></script>
    <style>
        .sidebar {
            min-width: 200px; 
            max-width: 200px; 
            width: 200px; 
        }
    </style>
</head>
<body class="bg-gray-100 flex">

    <nav class="sidebar h-screen bg-blue-800 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold">My Website</div>
        <div class="flex-grow">
            <a href="/home" class="block p-4 hover:bg-blue-600">Home</a>
            <a href="/about" class="block p-4 hover:bg-blue-600">About</a>
            <a href="/products" class="block p-4 hover:bg-blue-600">Products</a>
            <a href="/contact" class="block p-4 hover:bg-blue-600">Contact Us</a>
        </div>
    </nav>
    <div class="flex-grow p-6">
        <article id="content">
            @yield('content')
        </article>
    </div>
</body>
</html>
