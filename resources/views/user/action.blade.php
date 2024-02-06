<div class="btn-group">
    <a href="{{ route('user.view', $id) }}" class="btn btn-sm btn-info" title="View">
        <span class="bi bi-eye"></span> <!-- Bootstrap eye icon -->
    </a>
    <a href="{{ route('user.edit', $id) }}" class="btn btn-sm btn-primary" title="Edit">
        <span class="bi bi-pencil"></span> <!-- Bootstrap pencil icon -->
    </a>
    <button type="button" class="btn btn-sm btn-danger" title="Delete" onclick="confirmDelete({{ $id }})">
        <span class="bi bi-trash"></span> <!-- Bootstrap trash icon -->
    </button>
</div>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmDelete(userId) {
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
                var form = document.createElement('form');
                form.action = '/users/' + userId;
                form.method = 'POST'; // Use POST method for delete to comply with RESTful conventions
                form.innerHTML = '<input type="hidden" name="_method" value="DELETE">' +
                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">';

                document.body.appendChild(form);

                // Submit the form
                form.submit();
            }
        });
    }
</script>
