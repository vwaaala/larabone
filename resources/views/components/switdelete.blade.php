
<!-- Include SweetAlert2 -->
@can('user_delete')
    <script>
        function confirmDelete(userid=null) {
            
            var formaction = '{{ request()->has('show_deleted') ? route('users.forceDelete', '') : route('users.destroy', '') }}'+'/'+userid;
            
            Swal.fire({
                title: '{{ __('global.areYouSure') }}',
                text: "{{ __('global.willNotBeAbleToRevert') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--bs-danger)',
                cancelButtonColor: 'var(--bs-primary)',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a form dynamically
                    let form = document.createElement('form');

                    // Use DELETE method
                    form.method = 'POST';

                    // Add a hidden input field to specify the method override
                    form.innerHTML = '<input type="hidden" name="_method" value="DELETE">' +
                        '<input type="hidden" name="_token" value="{{ csrf_token() }}">';

                    // Determine action based on show_deleted query parameter
                    form.action = formaction;

                    document.body.appendChild(form);

                    // Submit the form
                    form.submit();
                }

            });
        }
    </script>
@endcan
