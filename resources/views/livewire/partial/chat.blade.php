<div class="chat {{ auth()->id() == $discussion->user_id ? 'chat-start' : 'chat-end' }}">
    <div class="chat-image avatar">
        <div class="w-16 rounded-full">
            <img src="{{ $discussion->user->image_url }}" />
        </div>
    </div>
    <div class="chat-header mb-2">
        {{ $discussion->user->name }}
        <time class="text-xs opacity-50">{{ $discussion->created_at->format('H:i') }}</time>
    </div>
    <div class="chat-bubble">{!! Str::markdown($discussion->chat) !!}</div>
</div>
