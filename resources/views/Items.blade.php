<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of Items:
            {{-- <h1>List of Categories</h1> --}}
        </h1>
        {{-- <img src="../../storage/app/public/00cf79ce8ba3adf9c3e0b06eaa10a7ba.jpeg" style="width: 50px;height:50px"> --}}
        <ul class=" text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 15px">
            @foreach ($Item as $item)
                <li style="color: rgb(255, 58, 58); font-size:30px"> {{ $item->name }} </li>
                <li> &nbsp; &nbsp; Price:   {{ $item->price }}</li>
                <li> &nbsp; &nbsp; Description:   {{ $item->description }}</li>
                <img src="{{ asset($item->imageURL) }}" alt="{{ $item->name }} image" style="width:150px;height:200px">
                <li>&nbsp; &nbsp;</li>

                <br>
                
                {{-- storage\app\admin\images\images\WhatsApp Image 2023-09-15 at 22.39.05.jpg --}}
                {{-- <li> ~  {{ $item->CategoryName }}</li> --}}
            @endforeach
        </ul>
    </x-slot>
    
</x-app-layout>
