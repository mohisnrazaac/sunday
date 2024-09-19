@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<style>
    .chat {
        background: radial-gradient(circle, #0D124A, #0A0D3A, #010310);
    }
    .chat-box {
        border: 1px solid #398FB4;
        font-family: 'Rajdhani';
    }
    .chat-top-left {
        background: #083D6F;
    }
    .bg-users {
        background: linear-gradient(to right, #02203A, #0C2955);
    }
    .chat-top-right {
        background: radial-gradient(circle, #0D2C62, #06416C, #02263E);
    }

    .chat-bg-cyan {
        background: #0D2A52 !important;
        cursor: pointer;
    }
    .chat-bg-cyan.active,  .chat-bg-cyan:hover {
        background: #203C61 !important;
    }
    .h-30 {
        height: 30px;
    }

    .h-530 {
        height: 530px;
    }

    .h-50 {
        height: 50px;
    }

    .b-cyan {
        border: 1px solid #0C4F7A;
    }
    .br-cyan {
        border-right: 1px solid #0C4F7A;
    }
    .chat-boxinc {
        overflow-y: scroll;
        height: 400px;
        padding-left: 45px;
        padding-right: 45px;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .chat-boxinc::-webkit-scrollbar {
        width: 6px;
        background-color: #010310; /* Match the outer dark color of the gradient */
    }

    .chat-boxinc::-webkit-scrollbar-thumb {
        background-color: #398FB4; /* Match the border color */
    }

    .chat-boxinc::-webkit-scrollbar-track {
        background-color: transparent; /* Match an intermediate color of the gradient */
    }
    .users-scroll::-webkit-scrollbar {
        width: 6px; /* Adjust width as needed */
    }

    .users-scroll::-webkit-scrollbar-thumb {
        background-color: #398FB4; /* Example color for the scrollbar thumb */
    }

    .users-scroll::-webkit-scrollbar-track {
        background-color: transparent; /* Example color for the scrollbar track */
    }

    .profile-circle.received {
        margin-left: auto;
    }
    .profile-circle {
        width: 40px; /* Diameter of the circle */
        height: 40px; /* Diameter of the circle */
        border-radius: 50%; /* Makes the element a circle */
        background-color: #01E5FF; /* Background color of the circle */
        display: flex; /* Center text horizontally and vertically */
        align-items: center; /* Center text vertically */
        justify-content: center; /* Center text horizontally */
        font-size: 20px; /* Size of the text */
        color: black; /* Text color */
        margin-right: 10px; /* Space between the circle and user name */
        font-family: 'Rajdhani';
    }
    .bg-users.br-cyan.h-530 {
        overflow-y: auto; 
        overflow-x: hidden;
    }

    .message-section textarea, .message-section textarea.form-control:focus{
        background: #3E4D54;
        height: 35px;
        color: grey;
        border-radius: 10px !important;
        overflow: hidden;
        width: 800px;
    }

    .w-900 {
        width: 900px
    }

    .chat .color-cyan {
        margin-right: auto;
    }

    .message-container {
        align-items: flex-start;
        margin-bottom: 15px; /* Space between messages */
    }

    .message-bubble.sent {
        background-color: #067AA1; /* Blue background for sent messages */
        color: #fff; /* White text color for sent messages */
    }

    .message-bubble.received {
        background-color: #3C3C48; /* Light gray background for received messages */
        margin-left: auto; /* Align to the right */
    }

    .message-container.received {
        flex-direction: row-reverse;
    }

    .message-bubble small {
        display: block; /* Ensure the timestamp is on a new line */
        margin-top: 5px; /* Space above the timestamp */
        color: #6c757d; /* Muted color for the timestamp */
    }

    .message-bubble:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 20px; /* Adjust according to bubble position */
        width: 0;
        height: 0;
        border-width: 10px;
        border-style: solid;
    }

    .message-bubble.sent:after {
        border-color: #067AA1 transparent transparent transparent; /* Triangle for the tail of sent messages */
        border-radius: 3px;
        left: auto;
        right: 20px; /* Tail on the right side for sent messages */
    }

    .message-bubble.received:after {
        border-color: #3C3C48 transparent transparent transparent; /* Triangle for the tail of received messages */
        left: 20px; /* Tail on the left side for received messages */
    }

</style>
@section('content')
<div class="container chat">
    <div class="row chat-box overflow-hidden">
        <div class="col-md-3 px-0">
            <h4 class="text-uppercase text-center color-cyan chat-top-left m-0 h-30 b-cyan">Chats</h4>
            <div class="d-flex">
                <div class="col-2 chat-top-left">
                    <ul class="list-group h-530">
                        <li class="list-group-item bg-transparent border-0 py-4 position-relative">
                            <i class="fa-regular fa-message color-cyan fs-4"></i>
                        </li>
                        <!-- Align bottom -->
                        <div class="mt-auto">
                            <li class="list-group-item bg-transparent border-0 py-3">
                                <i class="fa-regular fa-user color-cyan fs-4"></i>
                            </li>
                            <li class="list-group-item bg-transparent border-0 py-3">
                                <i class="fa-regular fa-rectangle-list color-cyan fs-4"></i>
                            </li>
                            <li class="list-group-item bg-transparent border-0 pt-3 pb-4">
                                <i class="fa-solid fa-gear color-cyan fs-4"></i>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-10 bg-users br-cyan h-530 users-scroll">
                    <ul class="list-group my-3">
                        @foreach($users as $user)
                            <li class="d-flex list-group-item mx-3 my-1 chat-bg-cyan h-50 align-items-center border-0 @if($selectedUser && $selectedUser->id == $user->id) active @endif">
                                <div class="profile-circle fw-bold">
                                    {{ strtoupper($user->name[0]) }} 
                                </div>
                                <a class="fw-bold" href="{{ route('chat.index', ['userId' => $user->id]) }}">{{ $user->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 px-0">
            <h4 class="text-end m-0 chat-top-right h-30 pe-3 b-cyan">
                <i id="maximizeIcon" class="fa-solid fa-maximize iconColor color-cyan me-2 fs-5"></i>
                <i class="fa-regular fa-circle-question color-cyan fs-5"></i>
            </h4>
            @if($selectedUser)
                <div id="chat-boxinc" class="chat-boxinc">
                    @foreach($messages as $message)
                        <div class="message-container d-flex mb-3 {{ $message->user->id == Auth::id() ? 'sent' : 'received' }}">
                            <div class="profile-circle fw-bold me-2 {{ $message->user->id == Auth::id() ? 'sent me-2' : 'received ms-2' }}">
                                {{ strtoupper($user->name[0]) }} 
                            </div>
                            <div class="message-bubble {{ $message->user->id == Auth::id() ? 'sent' : 'received' }} px-3">
                                <strong>{{ $message->user->id == Auth::id() ? 'You' : $message->user->name }}:</strong>
                                {{ $message->message }}
                                <small class="text-muted">
                                      {{ $message->created_at->diffForHumans() }}
                                @if(!$message->isRead() && $message->receiver_id == Auth::id())
                                    (Unread)
                                @endif
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    <hr class="w-900">
                </div>
                <form id="chat-form" class="d-flex message-section justify-content-center" action="{{ route('chat.send') }}" method="POST">
                    @csrf
                    <div class="form-group align-content-center">
                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Type your message..."></textarea>
                        <input type="hidden" name="receiver_id" value="{{ $selectedUser->id }}">
                    </div>
                    <button type="submit" class="btn px-2">
                        <i class="fa-solid fa-arrow-right color-cyan fs-2"></i>
                    </button>
                    <button class="btn px-2" type="button">
                        <span class="color-cyan fs-2">@</span>
                    </button>
                </form>
            @else
                <h4>Select a user to start chatting</h4>
            @endif
        </div>
    </div>
</div>
@endsection

<script>

function fetchMessages() {
        console.log("Fetching messages...");
        var userId = "{{ $selectedUser ? $selectedUser->id : null }}";
        
        if (userId) {
            $.ajax({
                url: "{{ url('chat/messages') }}/" + userId,
                method: "GET",
                success: function(data) {
                    console.log("Data received:", data);
                    var chatBox = $('#chat-boxinc');
                    chatBox.html(''); // Clear the chat box

                   

                    $.each(data, function(index, message) {
                        chatBox.append(
                                '<div class="message-container d-flex mb-3 ' + (message.user_id == "{{ Auth::id() }}" ? 'sent' : 'received') + '">' +
                                    '<div class="profile-circle fw-bold me-2 ' + (message.user_id == "{{ Auth::id() }}" ? 'sent me-2' : 'received ms-2') + '">' +
                                        message.user.name[0].toUpperCase() +
                                    '</div>' +
                                    '<div class="message-bubble ' + (message.user_id == "{{ Auth::id() }}" ? 'sent' : 'received') + ' px-3">' +
                                        '<strong>' + (message.user_id == "{{ Auth::id() }}" ? "You" : message.user.name) + ':</strong> ' +
                                        message.message + 
                                        ' <small class="text-muted">' + moment(message.created_at).fromNow() + '</small>' +
                                        (message.receiver_id == "{{ Auth::id() }}" && !message.read_at ? ' (Unread)' : '') +
                                    '</div>' +
                                '</div>'
                            );
                    });

                    chatBox.scrollTop(chatBox[0].scrollHeight); // Scroll to bottom
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", error); // Log any error
                }
            });
        }
    }

   $(document).ready(function() {
    var chatBox = $('#chat-boxinc');

   
    // Poll for new messages every 5 seconds
    setInterval(fetchMessages, 5000);

    // Scroll to the bottom of the chat box on page load
    chatBox.scrollTop(chatBox[0].scrollHeight);

    // Handle form submission via AJAX
    $('#chat-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                fetchMessages(); // Refresh the chat box after sending a message
                $('#message').val(''); // Clear the textarea
            }
        });
    });
});
</script>