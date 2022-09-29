@props(['title'])
<!DOCTYPE html>
<html lang="fr">

<head>
		<meta charset="UTF-8">
		<meta content="IE=edge" http-equiv="X-UA-Compatible">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<script src="https://unpkg.com/scrollreveal"></script>
		<title>Blog Mito | {{ $title }}</title>
		<!-- import Tailwind -->
		@vite('resources/css/app.css')
</head>

<body>
		@include('partials.navbar._navbar')
		@include('partials._session')
		{{ $slot }}

		@vite('resources/js/app.js')
</body>

</html>
