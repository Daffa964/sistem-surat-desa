@props(['url', 'size' => 100])

<div class="inline-block p-2 bg-white">
    {!! QrCode::size($size)->generate($url) !!}
</div>