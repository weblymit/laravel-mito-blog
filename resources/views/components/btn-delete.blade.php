@props(['post'])
<div class="">
		<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button class="btn-error btn">Supprimer</button>
		</form>
</div>
