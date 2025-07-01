<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">

    <div class="bg-gray-800 p-6 sm:p-8 rounded-xl w-full max-w-md shadow-lg">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <h4 class="text-xl font-semibold text-center text-teal-400 mb-4">Register</h4>

            <div class="mb-3">
                <label for="firstname" class="block mb-1 text-sm font-medium">First Name</label>
                <input type="text" id="firstname" name="firstname"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('firstname') }}" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="block mb-1 text-sm font-medium">Last Name</label>
                <input type="text" id="lastname" name="lastname"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('lastname') }}" required>
            </div>

            <div class="mb-3">
                <label for="username" class="block mb-1 text-sm font-medium">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="block mb-1 text-sm font-medium">Email address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="block mb-1 text-sm font-medium">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                    required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block mb-1 text-sm font-medium">Phone Number</label>
                <input type="text" id="phone" name="phone" pattern="^09\d{9}$" maxlength="11" minlength="11"
                    title="Enter a valid 11-digit Philippine mobile number (e.g., 09123456789)"
                    value="{{ old('phone') }}"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-teal-400"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-teal-500 hover:bg-teal-600 text-white text-sm font-semibold py-2 rounded-md mb-2 transition">
                Register
            </button>
            <a href="{{ route('login') }}"
               class="block w-full text-center text-sm text-gray-300 hover:text-white">
                Go to Login
            </a>
        </form>
    </div>

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
                        confirmButtonText: 'OK',
                        width: '300px',
                        customClass: {
                            popup: 'text-sm p-2',
                            title: 'text-base',
                            confirmButton: 'text-sm px-3 py-1'
                        }
                    });
                    form.trigger('reset');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, message) {
                            let field = $('[name="' + key + '"]');
                            field.addClass('is-invalid');
                            field.after('<div class="text-danger text-xs mt-1">' + message[0] + '</div>');
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An unexpected error occurred.',
                            icon: 'error',
                            confirmButtonText: 'Close',
                            width: '300px',
                            customClass: {
                                popup: 'text-sm p-2',
                                title: 'text-base',
                                confirmButton: 'text-sm px-3 py-1'
                            }
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
