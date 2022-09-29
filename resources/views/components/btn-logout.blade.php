<!-- Authentication -->
<form action="{{ route('logout') }}" method="POST">
		@csrf
		<button class="btn-primary btn" type="submit">Déconnexion</button>
</form>
