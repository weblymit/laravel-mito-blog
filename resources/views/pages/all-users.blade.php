<x-layouts.main-layout title="Tous mes users">
		<div class="container pt-14">
				<h1 class="pb-4 text-3xl font-black">Tous mes Users</h1>
				@include('partials._table-allUsers')
				<div class="my-12 flex justify-end">
						{{ $users->links('pagination::tailwind') }}
				</div>
		</div>

</x-layouts.main-layout>
