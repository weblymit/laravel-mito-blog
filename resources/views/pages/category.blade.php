<x-layouts.main-layout title="Liste des catégories">
		<div class="container">
				<h1 class="pt-10 pb-10 text-4xl font-bold">Gérer les catégories</h1>
				<form action="{{ route('category.store') }}" method="POST">
						@csrf
						<div class="">
								<input class="@error('category') border-red-500 @enderror my-3" name="category" placeholder="" type="text">
								<button class="btn-primary btn" type="submit">Enregister</button>
								<x-error-msg name="category" />
						</div>
				</form>

				<div class="py-10">
						<p class="pb-5 text-2xl">Mes catégories actuelles</p>
						@forelse ($categories as $category)
								<div class="flex items-center space-x-4 border-b py-3">
										<p class="font-bold uppercase">{{ $category->category }}</p>
										<div class="">
												<a class="btn-success btn-sm btn" href="">modifier</a>
												<a class="btn-error btn-sm btn" href="">delete</a>
										</div>
								</div>
						@empty
								<p>Pas de catégorie enregistrée actuellement</p>
						@endforelse
				</div>


		</div>
</x-layouts.main-layout>
