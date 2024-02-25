<div class="btn-group">
    @if(Route::currentRouteName() == 'users.index' && !request()->has('show_deleted'))
        @can('user_show')
            <a href="{{ route('users.show', $id ?? $user->id) }}" class="btn btn-sm btn-info" title="{{ __('global.show') }}">
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
        <button type="button" class="btn btn-sm btn-danger" title="{{ __('global.delete') }}" onclick="confirmDelete()">
            <span class="bi bi-trash"></span> <!-- Bootstrap trash icon -->
        </button>
    @endcan
</div>

<!-- Include SweetAlert2 -->
@can('user_delete')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a form dynamically
                    let form = document.createElement('form');
                    @if(request()->has('show_deleted'))
                        form.action = '{{ route('users.forceDelete', $id) }}'
                    @else
                        form.action = '{{ route('users.destroy', $id) }}'
                    @endif
                    form.method = 'POST'; // Use POST method for delete to comply with RESTful conventions
                    form.innerHTML = '<input type="hidden" name="_token" value="{{ csrf_token() }}">';

                    document.body.appendChild(form);

                    // Submit the form
                    form.submit();
                }
            });
        }
    </script>
@endcan
