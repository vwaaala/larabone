@extends('layouts.app')
<!-- include summernote css/js -->
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6 message-container" style="height:300px;overflow-y:scroll;">
                            <ul>
                                @foreach($messages as $message)
                                    <li>{!! $message->message  !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6 send-message-container">
                            <textarea id="messageTextArea" name="message"></textarea>
                            <button class="btn btn-sm btn-primary" onclick="sendMessage()">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>


        var ENDPOINT = "{{ route('home') }}";

        var page = 1;


        /*------------------------------------------

        --------------------------------------------

        Call on Scroll

        --------------------------------------------

        --------------------------------------------*/
        var $messageContainer = $(".message-container");

        $messageContainer.scroll(function () {
            if ($messageContainer.scrollTop() + $messageContainer.height() >= ($messageContainer[0].scrollHeight - 20)) {
                page++;
                infinteLoadMore(page);
            }
        });


        /*------------------------------------------

        --------------------------------------------

        call infinteLoadMore()

        --------------------------------------------

        --------------------------------------------*/

        function infinteLoadMore(page) {

            $.ajax({

                url: ENDPOINT + "?page=" + page,

                datatype: "json",

                type: "get",

                beforeSend: function () {

                    $('.auto-load').show();

                }

            })

                .done(function (response) {
                    var messages = response.html.data;
                    console.log(messages);
                    messages.forEach(function (message) {
                        $(".message-container ul").append('<li>' + message.message + '</li>');
                    });

                    if (response.html == '') {

                        $('.auto-load').html("We don't have more data to display :(");

                        return;

                    }


                    $('.auto-load').hide();


                })

                .fail(function (jqXHR, ajaxOptions, thrownError) {

                    console.log('Server error occured');

                });

        }

    </script>
    <script>
        $(document).ready(function () {
            // $('#messageTextArea').summernote();
        });

        function sendMessage() {
            var message = $('#messageTextArea').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token from meta tag

            $.ajax({
                url: '/message/store', // Replace with your actual URL
                method: 'POST',
                data: {
                    message: message,
                    // Include CSRF token in the request data
                    _token: csrfToken
                },
                success: function (response) {
                    if (response.status == "success") {
                        $('#messageTextArea').val('');
                    } else if (response.status == "error") {
                    }
                },
                error: function (xhr, status, error) {
                }
            });
        }
    </script>
@endpush
