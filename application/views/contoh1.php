<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cashflow</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col h-screen">
    <!-- Navbar -->
    <nav class="bg-green-600 p-4">
        <div class="container mx-auto flex items-center px-4">
            <div class="flex items-center mr-4">
                <div class="bg-white rounded-full p-2 shadow-md">
                    <span class="text-green-600 font-bold text-lg">A</span> <!-- Ganti dengan inisial atau logo -->
                </div>
                <h1 class="text-white text-lg font-bold ml-2">AdminLTE 3</h1>
            </div>
            <h1 class="text-white text-lg font-bold">CASHFLOW</h1>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-96">
            <h2 class="text-2xl font-bold text-center mb-6">AdminLTE</h2>
            <h3 class="text-center text-gray-600 mb-4">Sign in to start your session</h3>
            <form action="/your-login-endpoint" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Email">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Password">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600">Sign In</button>
            </form>
            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-blue-500 hover:underline">I forgot my password</a>
            </div>
            <div class="mt-2 text-center">
                <a href="#" class="text-sm text-blue-500 hover:underline">Register a new membership</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <div class="container mx-auto">
            <p class="text-sm">Copyright © 2024 Cashflow. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
