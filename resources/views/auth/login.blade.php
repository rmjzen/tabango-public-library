<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    </style>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    

    <div class="container mt-5">
        <div class="form-container">
           
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <h4 class="mb-3 text-center">Login</h4>
                <div class="mb-3">
                    <label for="login_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="login_username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                    <label for="login_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="login_password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success w-100 mb-2">Login</button>
                <a href="{{ route('register') }}" class="btn btn-outline-light w-100">Go to Register</a>
            </form>
            
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
    
        form.addEventListener('submit', function (e) {
            e.preventDefault();
    
            // Remove previous error messages
            document.querySelectorAll('.text-danger').forEach(el => el.remove());
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    
            const formData = new FormData(form);
    
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
            .then(async response => {
                if (response.ok) {
                    const data = await response.json();
                    await Swal.fire({
                        title: 'Success!',
                        text: data.message || 'Login successful!',
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    });
                    window.location.href = "{{ route('admin') }}"; // redirect after login
                } else if (response.status === 422) {
                    const { errors } = await response.json();
                    for (const key in errors) {
                        const input = document.querySelector(`[name="${key}"]`);
                        if (input) {
                            input.classList.add('is-invalid');
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'text-danger';
                            errorDiv.innerText = errors[key][0];
                            input.after(errorDiv);
                        }
                    }
                } else if (response.status === 401) {
                    const result = await response.json();
                    Swal.fire({
                        title: 'Login Failed',
                        text: result.message || 'Invalid credentials',
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                } else {
                    Swal.fire({
                        title: 'Unexpected Error',
                        text: 'Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    title: 'Network Error',
                    text: 'Please check your internet connection.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    });
    </script>
    
</html>
