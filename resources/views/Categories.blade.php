<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of Categories:
            {{-- <h1>List of Categories</h1> --}}
        </h2>
        <br>
        
        <ul class=" text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 15px">
            @foreach ($Category as $category)
                <li> &nbsp;&nbsp;<a href="{{ route('category.show', ['category' => $category->id]) }}">{{ $category->CategoryName }}</a></li>
                <br>
                @endforeach
        </ul>
    </x-slot>
    
</x-app-layout>

