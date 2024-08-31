<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chatbot</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-iz9I8E4RrIjNu9Nv+pzX5Xg5ZBzq+AlW9gTYEh6htXaRLptVRU2Q1L5/VcDkrjb9RzGcF+R2ydG9Dc/BfLmE9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    body {
        background-color: #e3e3e3;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        transition: background-color 0.5s;
        position: relative;
    }
    .container {
        max-width: 1280px;
        margin: 50px auto;
        height:750px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
    }
    .chat-header {
        background-color: #b80257;
        color: #fff;
        padding: 10px;
        text-align: center;
        position: relative;
        font-size: 1.5rem;
        width:100% !important;
    }
    .chat-list {
        max-height: 300px;
        overflow-y: auto;
    }
    .chat-item {
        padding: 15px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
        transition: background-color 0.3s;
        display: flex;
        align-items: center;
    }
    .chat-item:hover {
        background-color: #f2f2f2;
    }
    .chat-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 15px;
    }
    .chat-body {
        padding: 20px;
        overflow-y: auto;
        max-height: 250px;
    }

    .chat-body-message{
        padding: 20px;
        overflow-y: auto;
        max-height: 450px;
    }

    .chat-message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
    }
    .chat-message-bot {
        background-color: #f95959;
        color: #fff;
        text-align: center;
        font-weight: bold;
        font-size:20px;
        text-transform: capitalize;
    }
    .chat-message-user {
        background-color: #233142;
        color: #fff;
        text-align: right;
    }
    .typing-indicator {
        color: #455d7a;
        font-style: italic;
    }
    .chat-footer {
        padding: 20px;
        border-top: 1px solid #ccc;
    }
    .form-control {
        border-radius: 20px;
    }
    .send-button {
        background-color: #b80257;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 8px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .send-button:hover {
        background-color: #8c003e;
    }
    .like-button, .dislike-button {
        border: none;
        background-color: transparent;
        cursor: pointer;
    }
    .like-button i, .dislike-button i {
        font-size: 1.5rem;
    }
    .mode-switch {
        position: absolute;
        right: 20px;
        top: 20px;
        z-index: 999;
    }
    .mode-switch input {
        height: 0;
        width: 0;
        visibility: hidden;
    }
    .slider {
        width: 50px;
        height: 25px;
        background-color: #ccc;
        border-radius: 25px;
        position: relative;
    }
    .slider:before { content: ""; position: absolute; height: 25px; width: 25px; left: -25px; bottom: 2px; background-color: #ffc107; border-radius: 50%; transition: transform 0.2s; }
    input:checked + .slider {
        background-color: #2196F3;
    }
    input:checked + .slider:before {
        transform: translateX(25px);
    }
    .dark-mode {
        color: #fff;
        background-color: #333;
    }

    .chat-message {
        margin-bottom: 10px;
    }

    .chat-message-sender {
        background-color: #EAEAEA;
        color: #333;
        text-align: left;
    }

    .chat-message-receiver {
        background: linear-gradient(174deg, rgba(0,106,255,0.5494572829131652) 0%, rgba(30,87,146,0.3533788515406162) 0%, rgba(30,87,146,0.0984768907563025) 100%);
        color: #333;
        text-align: right;
    }

    .timestamp{
        font-size:11px;
    }

    .text-right{
        float: right;
    }
    .text-left{
        float: left;
    }
</style>
</head>
<body>
<div class="container">
    <div class="chat-header">
        Messenger
        <div class="mode-switch" id="mode-switch">
            <label class="switch">
                <input type="checkbox" onclick="toggleDarkMode()" id="dark-mode-toggle">
                <span class="slider"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 border-end">
            <div class="chat-list">
                @foreach($users as $user)
                    <div class="chat-item" data-user-id="{{ $user->id }}" onclick="showChat('{{ $user->name }}', '{{ $user->id }}')">
                        <img src="https://miro.medium.com/v2/resize:fit:600/1*PiHoomzwh9Plr9_GA26JcA.png" class="chat-avatar" alt="John Avatar - Sales Manager">
                        {{ $user->name }} - {{ $user->email }}
                    </div>
                @endforeach
                {{-- <div class="chat-item" onclick="showChat('Alice')">
                    <img src="https://miro.medium.com/v2/resize:fit:2400/1*JZNTvEa6NLjf2oEsYucJ6Q.png" class="chat-avatar" alt="Alice Avatar - Accountant">
                    Alice - Accountant
                </div>
                <div class="chat-item" onclick="showChat('Bob')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYodX4PS5R7aKD07Tli-JcxLDvuKv5PZOFZHpuihWbTu63e-riirBBrvu8IqOJz7XjaSQ&usqp=CAU" class="chat-avatar" alt="Bob Avatar - Marketing">
                    Bob - Marketing
                </div> --}}
                <!-- Add more chat items here -->
            </div>
        </div>
        <div class="col-lg-8">
                <div class="chat-body" id="chat-body">
              <!-- Add more chat items here -->
                </div>
                <div class="chat-body-message" id="chat-body-message">
                    <!-- Chat messages will be displayed here -->
                </div>
                <div class="chat-footer" id="chat-footer" style="display: none;">
                    <form id="chat-form" action="{{ route('send') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="user-input" class="form-control" placeholder="Type your message..." name="message">
                            <input type="hidden" name="receiver_id" id="receiver_id">
                            <button type="submit" class="send-button">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- JavaScript -->

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c92892be366455aa8cb5', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('channel-name');
    channel.bind('my-event', function(data) {

        fetchData(data.message);
    });
  </script>
<script>
    const chatBody = document.getElementById('chat-body');
    const chatFooter = document.getElementById('chat-footer');
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const modeSwitch = document.getElementById('mode-switch');

    function showChat(userName, userId) {

        // Display chat options for the selected user
        const receiverIdInput = document.getElementById('receiver_id');
        receiverIdInput.value = userId; // This will alert the user ID
        fetchData(userId);
        chatFooter.style.display = 'block';
        chatBody.innerHTML = `<div class="chat-message chat-message-bot">Chatting with ${userName}</div>`;
    }

    // document.getElementById('chat-form').addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     sendMessage();
    // });

    // function sendMessage() {
    //     const userInput = document.getElementById('user-input').value;
    //     if (userInput.trim() === '') return;

    //     appendUserMessage(userInput);

    //     // Simulate bot typing
    //     showTypingIndicator();
    //     setTimeout(() => {
    //         hideTypingIndicator();
    //         appendBotMessage(getBotReply(userInput));
    //     }, 1000);
    // }

    // function appendBotMessage(message) {
    //     const messageElement = document.createElement('div');
    //     messageElement.classList.add('chat-message', 'chat-message-bot');
    //     messageElement.innerHTML = `<i class="fas fa-robot"></i> ${message}`;
    //     chatBody.appendChild(messageElement);
    //     chatBody.scrollTop = chatBody.scrollHeight;
    // }

    // function appendUserMessage(message) {
    //     const messageElement = document.createElement('div');
    //     messageElement.classList.add('chat-message', 'chat-message-user');
    //     messageElement.innerHTML = `<i class="fas fa-user"></i> ${message}`;
    //     chatBody.appendChild(messageElement);
    //     chatBody.scrollTop = chatBody.scrollHeight;
    // }

    // function showTypingIndicator() {
    //     const typingIndicator = document.createElement('div');
    //     typingIndicator.classList.add('chat-message', 'typing-indicator');
    //     typingIndicator.innerHTML = '<i class="fas fa-ellipsis-h"></i>';
    //     chatBody.appendChild(typingIndicator);
    //     chatBody.scrollTop = chatBody.scrollHeight;
    // }

    // function hideTypingIndicator() {
    //     const typingIndicator = document.querySelector('.typing-indicator');
    //     if (typingIndicator) {
    //         typingIndicator.remove();
    //     }
    // }

    // function getBotReply(userInput) {
    //     // Sample bot replies
    //     const replies = [
    //         "I'm sorry, I didn't understand that.",
    //         "That's interesting!",
    //         "How can I assist you further?",
    //         "I'm not sure what you mean.",
    //         "Can you please provide more details?",
    //         "Sure!",
    //         "No problem!",
    //         "Yes, that's correct.",
    //         "I appreciate your feedback!",
    //         "Thank you!"
    //     ];
    //     const randomIndex = Math.floor(Math.random() * replies.length);
    //     return replies[randomIndex];
    // }


    $('#chat-form').on('submit', function(e) {
        e.preventDefault();

        var receiveId = $("#receiver_id").val();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
                success:function(data){
                    $('#chat-form')[0].reset();
                    fetchData(receiveId);
                }
            });
    });

    function fetchData(receiveId) {
        $.ajax({
            url: "{{ route('fetch') }}",
            type: 'get',
            data: { userId: receiveId }, // Pass userId as data
            success: function(data) {
                $("#chat-body-message").html(data);
                $("#chat-body-message").scrollTop($("#chat-body-message")[0].scrollHeight);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }





    function toggleDarkMode() {
        const body = document.body;
        body.classList.toggle('dark-mode');
        if (body.classList.contains('dark-mode')) {
            modeSwitch.style.backgroundColor = '#333';
        } else {
            modeSwitch.style.backgroundColor = '#ccc';
        }
    }
</script>
</body>
