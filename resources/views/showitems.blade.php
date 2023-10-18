<h2>Items in Category: {{ $category->name }}</h2>
<ul>
    @forelse ($items as $item)
        <li>{{ $item->name }} - Price: {{ $item->price }}</li>
    @empty
        <li>No items available in this category.</li>
    @endforelse
</ul>
