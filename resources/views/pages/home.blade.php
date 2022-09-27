<x-layouts.main-layout title="Accueil">
		<p class="text-red-500">Hello world</p>
		@foreach ($posts as $post)
				<div class="pb-5">
						<p class="text-2xl font-black">{{ $post->title }}</p>
						<p>{{ $post->content }}</p>
				</div>
		@endforeach
</x-layouts.main-layout>
