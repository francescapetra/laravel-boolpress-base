<h1>Nuovo commento</h1>
<div>
	il post commentato è: {{$post->title}} --}}
	<a href="{{route('admin.posts.show', ['post' => $post->id])}}">Visualizza il post</a>
</div>