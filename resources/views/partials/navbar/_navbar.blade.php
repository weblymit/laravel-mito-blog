@php
$styleLink = 'hover:text-blue-600 hover:underline underline-offset-4';
@endphp
<nav class="bg-gray-100 py-4 shadow-lg shadow-blue-100">
		<div class="container flex items-center justify-between">
				<div class="" id="logo">
						<a class="font-semibold uppercase text-blue-500" href="/">
								MitoBlog
						</a>
				</div>
				<div class="flex items-center space-x-5 font-semibold uppercase" id="navitem">
						@guest
								<a class="{{ $styleLink }}" href="{{ route('login') }}">Connexion</a>
								<a class="{{ $styleLink }}" href="{{ route('register') }}">Inscription</a>
						@endguest
						@auth
								<a class="{{ $styleLink }}" href="{{ route('dashboard') }}">Dashboard</a>
								<x-btn-logout />
								<span>hello, {{ Auth::user()->name }}</span>
						@endauth
				</div>
		</div>
</nav>
