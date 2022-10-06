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

		<div class="container breadcrumbs pt-7 text-sm">
				<ul>
						<li>
								<a href="/">Accueil</a>
						</li>
						<?php $link = ''; ?>
						@for ($i = 1; $i <= count(Request::segments()); $i++)
								@if (($i < count(Request::segments())) & ($i > 0))
										<?php $link .= '/' . Request::segment($i); ?>
										<li><a href="<?= $link ?>">{{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a> </li>
								@else
										<li class="text-blue-500">{{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</li>
								@endif
						@endfor
				</ul>
		</div>
		{{ $slot }}

		@vite('resources/js/app.js')
</body>

</html>
