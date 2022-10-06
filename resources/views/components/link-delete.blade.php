@props(['routeName', 'itemId', 'linkName'])
@auth
		<a class="btn-outline-error btn-xs btn" href="{{ route($routeName, $itemId) }}">{{ $linkName }}</a>
@endauth
