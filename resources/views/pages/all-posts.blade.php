<x-layouts.main-layout title="Tous mes articles">
		<div class="container pt-14">
				<h1 class="pb-4 text-3xl font-black">Tous mes articles</h1>
				@include('partials._table-allPosts')
				<div class="my-12 flex justify-end">
						{{ $posts->links('pagination::tailwind') }}
				</div>
		</div>

</x-layouts.main-layout>
