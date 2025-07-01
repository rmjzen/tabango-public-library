<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/js/auth/login.js"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen px-4">

  <div class="bg-gray-800 p-5 sm:p-6 rounded-lg shadow-md w-full max-w-sm">
    <h2 class="text-lg sm:text-xl font-semibold text-center text-teal-400 mb-4">Login to Your Account</h2>
    <form method="POST" action="{{ route('login.post') }}" class="space-y-3" data-redirect="{{ route('admin') }}">
      @csrf

      <div>
        <label for="login_username" class="block text-sm mb-1">Username</label>
        <input type="text" id="login_username" name="username" value="{{ old('username') }}"
          class="w-full px-3 py-1.5 text-sm bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-teal-400 outline-none"
          required />
      </div>

      <div class="relative">
        <label for="login_password" class="block text-sm mb-1">Password</label>
        <input type="password" id="login_password" name="password"
          class="w-full px-3 py-1.5 pr-10 text-sm bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-teal-400 outline-none"
          required />
        <button type="button" onclick="togglePassword()"
          class="absolute top-7 right-3 text-gray-400 hover:text-white">
          <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </button>
      </div>

      <button type="submit"
        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 rounded-md transition duration-200">
        Login
      </button>

      <a href="{{ route('register') }}"
        class="block text-center text-sm text-gray-300 hover:text-white">
        Don't have an account? Register
      </a>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById("login_password");
      const eyeIcon = document.getElementById("eyeIcon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.965 9.965 0 012.432-4.247m2.054-2.01A9.953 9.953 0 0112 5c4.478 0 8.27 2.943 9.544 7a9.973 9.973 0 01-4.264 5.225M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />`;
      } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
      }
    }
  </script>

</body>
</html>
