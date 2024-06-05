<div class="page-wrapper">
    <article class="prose mx-auto">
        <h1>{{ $post->title }}</h1>
        <img src="{{ $post->image_url }}" alt="">
        {!! Str::markdown($post->body) !!}
    </article>
</div>
