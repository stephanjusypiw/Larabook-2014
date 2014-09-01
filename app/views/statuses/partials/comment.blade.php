<article class="comments__comment media status-media">
    <div class="pull-left">
        @include ('users.partials.avatar', ['user' => $comment->owner, 'class' => 'media-object'])
    </div>

    <div class="media-body">
        <a href="{{ route('profile_path', $comment->owner->username) }}"><h4 class="media-heading">{{ $comment->owner->username }}</h4></a>
        {{ $comment->body }}
    </div>
</article>