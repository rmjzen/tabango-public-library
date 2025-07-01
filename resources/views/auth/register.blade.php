<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register / Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c2f33;
            color: #ffffff;
        }
        .form-container {
            background-color: #3a3f44;
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
        }
        .form-control {
            font-size: 0.875rem;
            padding: 0.4rem 0.6rem;
        }
        .toggle-buttons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .toggle-buttons button {
            width: 48%;
        }
        #loginForm, #registerForm {
            display: none;
        }
        #registerForm.active, #loginForm.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <div class="toggle-buttons">
                <button class="btn btn-outline-light" onclick="showForm('register')">Register</button>
                <button class="btn btn-outline-light" onclick="showForm('login')">Login</button>
            </div>

            <!-- Register Form -->
            <form id="registerForm" class="active" method="POST" action="{{ route('register.post') }}">
                @csrf
                <h4 class="mb-3 text-center">Register</h4>
                <div class="mb-2">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="mb-2">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text"
                           class="form-control"
                           id="phone"
                           name="phone"
                           pattern="^09\d{9}$"
                           maxlength="11"
                           minlength="11"
                           title="Enter a valid 11-digit Philippine mobile number (e.g., 09123456789)"
                           required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="{{ route('login.post') }}">
                @csrf
                <h4 class="mb-3 text-center">Login</h4>
                <div class="mb-3">
                    <label for="login_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="login_username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="login_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="login_password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
        </div>
    </div>

    <script>
        function showForm(formType) {
            document.getElementById('registerForm').classList.remove('active');
            document.getElementById('loginForm').classList.remove('active');
            if (formType === 'register') {
                document.getElementById('registerForm').classList.add('active');
            } else {
                document.getElementById('loginForm').classList.add('active');
            }
        }
    </script>
</body>
</html>
