<x-layouts.main-layout title="Création article">
		<div class="container pb-24">
				<h1 class="pt-10 pb-10 text-4xl font-bold">New Post</h1>
				<form action="{{ route('posts.store') }}" method="POST">
						@csrf
						<div class="max-w-md">
								{{-- title --}}
								<input class="block w-full rounded-lg border-gray-400" name="title" placeholder="Titre du post" type="text">
								{{-- content --}}
								<textarea class="mt-5 block w-full rounded-lg border-gray-400" cols="30" name="content"
								  placeholder="Votre contenu ...." rows="10"></textarea>
								{{-- image  --}}
								<input class="mt-5 block w-full rounded-lg border-gray-400" name="url_img" placeholder="Url de votre image"
										type="text" value="https://source.unsplash.com/640x480/?person?1">
								<button class="btn-primary btn mt-6 w-full" type="submit">Envoyer</button>
						</div>

				</form>

		</div>

</x-layouts.main-layout>
