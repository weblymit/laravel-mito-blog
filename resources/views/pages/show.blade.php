@php
dd($post->images);
@endphp
<x-layouts.main-layout :title="$post->title">
		<div class="container my-14">
				<div class="flex space-x-4">
						@if (count($post->images) > 0)
								<div class="space-y-2 bg-gray-200 p-3">
										@foreach ($post->images as $image)
												<img
														alt="{{ $post->title }}"
														class="w-20"
														src="{{ asset($image->slug) }}"
												>
												{{-- @auth
														<a class="btn-outline-error btn-xs btn" href="{{ route('delete.img', $image->id) }}">X</a>
												@endauth --}}
												<x-link-delete
														:itemId="$image->id"
														linkName="X"
														routeName="delete.img"
												/>
										@endforeach
								</div>
						@endif
						<img
								alt="{{ $post->title }}"
								class="max-w-[220px]"
								src="{{ asset('storage/' . $post->url_img) }}"
						>
				</div>
				<div class="">
						<p class="py-8 text-3xl font-black">{{ $post->title }}</p>
						@if ($post->category)
								<span class="btn-primary btn">{{ $post->category->name }}</span>
						@endif

						<p>{!! nl2br(e($post->content)) !!}</p>
						@auth
								@if (Auth::user()->is_admin == 1)
										<div class="pt-6">
												<x-btn-delete :post="$post" />
												<a
														class="btn-success btn"
														href="{{ $post->id }}/edit"
												>Modifier</a>
										</div>
								@endif
						@endauth
				</div>
				<div class="my-14 bg-blue-100 p-5">
						<h2 class="text-2xl font-black">Commentaires</h2>
						@guest
								<p class="py-6 text-center">Connecte toi pour poster un commentaire </p>
						@endguest
						@auth
								<form
										action="{{ route('comment.store', $post->id) }}"
										class="my-5"
										method="POST"
								>
										@csrf
										<input
												name="content"
												placeholder="Votre commentaire"
												type="text"
										>
										<button
												class="btn-primary btn"
												type="submit"
										>Envoyer</button>
										<x-error-msg name="content" />
								</form>
						@endauth

						<div class="bg-gray-50 p-5">
								@forelse ($post->comments as $comment)
										<div class="my-2 bg-gray-200 p-2">
												<p class="">{{ $comment->content }}</p>
												<p class="text-xs text-gray-500">crée le {{ $comment->created_at->format('d/m/y') }}</p>
										</div>
								@empty
										<p>Soyez le premier à écrire un commentaire </p>
								@endforelse
						</div>
				</div>
		</div>
</x-layouts.main-layout>
