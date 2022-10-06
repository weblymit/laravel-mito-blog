@props(['url_img', 'title', 'content'])
<div class="max-w-md shadow-xl">
		<div class="shadowp">
				<img alt="{{ $title }}" class="h-56" src="{{ asset('storage/' . $url_img) }}">
		</div>
		<div class="min-h-[220px] bg-gray-200 p-4">
				<p class="pb-4 text-xl font-bold">{{ $title }}</p>
				<p>{{ Str::substr($content, 0, 90) }}...</p>
		</div>
</div>
