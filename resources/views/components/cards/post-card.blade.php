@props(['url_img', 'title', 'content'])
<div class="">
		<img alt="{{ $title }}" src="{{ $url_img }}">
		<div class="">
				<p class="text-2xl font-bold">{{ $title }}</p>
				<p>{{ $content }}</p>
		</div>
</div>
