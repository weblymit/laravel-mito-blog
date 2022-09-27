<x-layouts.main-layout :title="$post->title">
		<div class="container">
				<img alt="{{ $post->title }}" class="max-w-lg" src="{{ $post->url_img }}">
				<div class="">
						<p class="py-8 text-3xl font-black">{{ $post->title }}</p>
						<p>{{ $post->content }}</p>
				</div>
		</div>
</x-layouts.main-layout>
