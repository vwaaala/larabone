@extends('layouts.app', ['pageName' => config('pages.support_ticket.show')])
@push('styles')
    <style>

    </style>
@endpush
@section('content')

@endsection
@push('script')
    <script>

        // // Add event listener for form submission
        // document.getElementById('ticketReplyForm').addEventListener('submit', function (event) {
        //     // Prevent default form submission
        //     event.preventDefault();

        //     // Collect form data
        //     let formData = new FormData(this);

        //     // Make a POST request using Axios
        //     axios.post(this.action, formData)
        //         .then(function (response) {
        //             // Handle success response
        //             // console.log(response.data);
        //             // Optionally, you can redirect the user or show a success message
        //         })
        //         .catch(function (error) {
        //             // Handle error
        //             console.error(error);
        //             // Optionally, you can show an error message to the user
        //         });
        // });
    </script>
@endpush
