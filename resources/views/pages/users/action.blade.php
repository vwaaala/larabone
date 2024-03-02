<div class="btn-group">
    @if(Route::currentRouteName() == 'users.index' && !request()->has('show_deleted'))
        @can('user_show')
            <a href="{{ route('users.show', $id ?? $user->id) }}" class="btn btn-sm btn-primary" title="{{ __('global.show') }}">
                <span class="bi bi-eye"></span> <!-- Bootstrap eye icon -->
            </a>
        @endcan
        @can('user_edit')
            <a href="{{ route('users.edit', $id ?? $user->id) }}" class="btn btn-sm btn-warning" title="{{ __('global.edit') }}">
                <span class="bi bi-pencil"></span> <!-- Bootstrap pencil icon -->
            </a>
        @endcan
    @else
        <!-- Display "Retrieve" button if show_deleted parameter is set -->
        @can('user_delete')
            <a href="{{ route('users.retrieveDeleted', $id ?? $user->id) }}" class="btn btn-sm btn-success"
               title="{{ __('global.restore') }}">
                <span class="bi bi-arrow-return-left"></span> <!-- Bootstrap arrow-return-left icon -->
            </a>
        @endcan
    @endif

    @can('user_delete')
        <a onclick="confirmDelete()" href="#" class="btn btn-sm btn-danger"
           title="{{ __('global.delete') }}">
            <span class="bi bi-trash"></span> <!-- Bootstrap arrow-return-left icon -->
        </a>
    @endcan
</div>

<!-- Include SweetAlert2 -->
@can('user_delete')
    <script>
        function confirmDelete() {
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
                    form.action = '{{ request()->has('show_deleted') ? route('users.forceDelete', $id) : route('users.destroy', $id) }}';

                    document.body.appendChild(form);

                    // Submit the form
                    form.submit();
                }

            });
        }
    </script>
@endcan
