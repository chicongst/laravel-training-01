chao mung den voi Bai Viet

@foreach($posts as $post)
<div>
    id: <a>{{ $post->id }}</a>
    tieu de: <h4><a href="{{ route('post-details', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
</div>
<hr/>
@endforeach()
