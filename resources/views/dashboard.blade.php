@php
$styleLink = 'hover:text-blue-600 hover:underline underline-offset-4 block pb-3';
@endphp
<x-layouts.main-layout title="Dashboard">

		<div class="container">
				<h1 class="mt-10 text-4xl font-black underline underline-offset-8">
						Bienvenue <span class="text-blue-500">{{ Auth::user()->name }}</span> sur ton Dashboard
				</h1>
				<div class="py-12">
						<a class="{{ $styleLink }}" href="{{ route('posts.create') }}">New post</a>
						<a class="{{ $styleLink }}" href="{{ route('posts.all') }}">La liste des post</a>
						<a class="{{ $styleLink }}" href="{{ route('users.all') }}">La liste des users</a>
						<a class="{{ $styleLink }}" href="{{ route('categories.home') }}">Gérer les catégories</a>
				</div>
		</div>
</x-layouts.main-layout>
