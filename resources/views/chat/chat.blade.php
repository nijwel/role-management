@foreach ($messages as $message)
    <div>
        @if($message->sender_id == Auth::id())
        <p class=" chat-message chat-message-sender">{{ $message->message }} <span class="timestamp text-right" >{{ $message->created_at->format('h:i a') }}</span></p>
        @else
        <p class=" chat-message chat-message-receiver"><span class="timestamp text-left" style="color: #fff;" >{{ $message->created_at->format('h:i a') }}</span> {{ $message->message }}</p>
        @endif
    </div>
@endforeach