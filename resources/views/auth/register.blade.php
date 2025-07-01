<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
</head>
<body>
    <div class="container mt-1">
        <div class="form-container">
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <h4 class="mb-2 text-center">Register</h4>
            
                <div class="mb-2">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                </div>
            
                <div class="mb-2">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                </div>
            
                <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                </div>
            
                <div class="mb-2">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    {{-- No old() for password for security reasons --}}
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
                           value="{{ old('phone') }}"
                           required>
                </div>
            
                <button type="submit" class="btn btn-primary w-100 mb-2">Register</button>
                <a href="{{ route('login') }}" class="btn btn-outline-light w-100">Go to Login</a>
            </form>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('form').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let formData = form.serialize();

        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: formData,
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    title: 'Success!',
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                form.trigger('reset');
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, message) {
                        let field = $('[name="' + key + '"]');
                        field.addClass('is-invalid');
                        field.after('<div class="text-danger">' + message[0] + '</div>');
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An unexpected error occurred.',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    });
                }
            }
        });
    });
</script>


</body>
</html>
