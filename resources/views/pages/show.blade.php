<x-layouts.main-layout :title="$post->title">
		<div class="container mb-10">
				<img alt="{{ $post->title }}" class="max-w-lg" src="{{ asset('storage/' . $post->url_img) }}">
				<div class="">
						<p class="py-8 text-3xl font-black">{{ $post->title }}</p>
						<p>{!! nl2br(e($post->content)) !!}</p>
						<div class="pt-6">
								<x-btn-delete :post="$post" />
								<a class="btn-success btn" href="{{ $post->id }}/edit">Modifier</a>
						</div>
				</div>
		</div>
</x-layouts.main-layout>
