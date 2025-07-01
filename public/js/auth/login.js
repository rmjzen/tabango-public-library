document.addEventListener('DOMContentLoaded', function () {
      const form = document.querySelector('form');

      form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            const redirectTo = form.dataset.redirect || '/';
            fetch(form.action, {
                  method: 'POST',
                  headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                  },
                  body: formData
            })
                  .then(async response => {
                        const data = await response.json();

                        if (response.ok) {
                              Swal.fire({
                                    title: 'Success!',
                                    text: data.message || 'Login successful!',
                                    icon: 'success',
                                    confirmButtonText: 'Continue',
                                    width: '300px',
                                    customClass: {
                                          popup: 'text-sm p-2',
                                          title: 'text-base',
                                          confirmButton: 'text-sm px-3 py-1'
                                    }
                              }).then(() => {

                                    window.location.href = redirectTo;
                              });
                        } else {
                              Swal.fire({
                                    title: 'Error',
                                    text: data.message || 'Something went wrong.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    width: '300px',
                                    customClass: {
                                          popup: 'text-sm p-2',
                                          title: 'text-base',
                                          confirmButton: 'text-sm px-3 py-1'
                                    }
                              });
                        }
                  })
                  .catch(() => {
                        Swal.fire({
                              title: 'Network Error',
                              text: 'Please check your internet connection.',
                              icon: 'error',
                              confirmButtonText: 'OK',
                              width: '300px',
                              customClass: {
                                    popup: 'text-sm p-2',
                                    title: 'text-base',
                                    confirmButton: 'text-sm px-3 py-1'
                              }
                        });
                  });
      });
});
