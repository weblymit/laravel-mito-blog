<x-layouts.main-layout title="Création article">
		<div class="container pb-24">
				<h1 class="pt-10 pb-10 text-4xl font-bold">Update Post</h1>
				<form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
						@csrf
						@method('PUT')
						<div class="max-w-md">
								{{-- title --}}
								<input class="block w-full rounded-lg border-gray-400" name="title" placeholder="Titre du post" type="text"
										value="{{ old('title', $post->title) }}">
								<x-error-msg name="title" />
								{{-- content --}}
								<textarea class="mt-5 block w-full rounded-lg border-gray-400" cols="30" name="content"
								  placeholder="Votre contenu ...." rows="10">{{ old('content', $post->content) }}</textarea>
								<x-error-msg name="content" />
								{{-- is_published --}}
								<div class="">
										<label for="">Publication</label>
										<input @checked(old('is_published', $post->is_published)) name="is_published" type="checkbox" value="is_published">
								</div>
								{{-- image  --}}
								<div class="">
										<label for="">Choisir une image:</label>
										<input class="block" id="" name="url_img" type="file">
										<x-error-msg name="url_img" />
								</div>
								{{-- Other images  --}}
								<div class="">
										<label for="">Other images:</label>
										<input class="block" id="" multiple name="images[]" type="file">
										<x-error-msg name="images" />
								</div>

								<button class="btn-primary btn mt-6 w-full" type="submit">Envoyer</button>
						</div>

				</form>

		</div>

</x-layouts.main-layout>
