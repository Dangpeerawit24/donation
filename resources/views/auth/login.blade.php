<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-500 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-sm">
        <div class="text-center">
            <img src="{{asset('img/Adminlogo.png')}}" alt="Logo" class="mx-auto w-20 h-20 mb-4">
            <h1 class="text-xl font-bold text-gray-700">ระบบจัดการกองบุญ</h1>
            <h2 class="text-lg font-semibold text-gray-600">Kuanim_Tungpichai</h2>
            <p class="text-gray-500 mb-6">Please Login</p>
        </div>
        <form method="POST" action="/login">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="mb-4 relative">
                <input type="text" name="email" placeholder="email" 
                       class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <div class="absolute inset-y-0 right-3 flex items-center">
                    <i class="text-gray-400 fas fa-user"></i>
                </div>
            </div>
            
            <div class="mb-4 relative">
                <input type="password" name="password" placeholder="Password" 
                       class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <div class="absolute inset-y-0 right-3 flex items-center">
                    <i class="text-gray-400 fas fa-lock"></i>
                </div>
            </div>
            
            <button type="submit" 
                    class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Login
            </button>
        </form>
    </div>
</body>
</html>
