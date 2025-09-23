@props(['items' => []])

<ul {{ $attributes->merge(['class' => 'timeline']) }}>
    @foreach($items as $item)
        <li class="timeline-item">
            <div class="timeline-marker"></div>
            <div class="timeline-content">
                <h3 class="font-medium">{{ $item['title'] ?? '' }}</h3>
                <p class="text-sm text-gray-500">{{ $item['description'] ?? '' }}</p>
                <time class="text-xs text-gray-400">{{ $item['date'] ?? '' }}</time>
            </div>
        </li>
    @endforeach
</ul>

<style>
.timeline {
    position: relative;
    list-style: none;
    padding: 0;
    margin: 0;
}

.timeline:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e5e7eb;
    left: 20px;
    margin-left: -1px;
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
}

.timeline-marker {
    position: absolute;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #4f46e5;
    left: 20px;
    top: 0;
    margin-left: -6px;
}

.timeline-content {
    margin-left: 50px;
}
</style>