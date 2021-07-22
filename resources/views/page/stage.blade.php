<x-layout.page>
    <x-slot name="title">
        Kategorienwauswahl
    </x-slot>

    <x-slot name="heading">
    {{ $stage->shortname }} {{ $stage->name }}
    </x-slot>

    <x-slot name="desc">
        <a href="{{ route('competition') }}" class="flex flex-col justify-center h-24 p-4 text-3xl text-center text-white transition-all duration-200 bg-blue-500 rounded-md shadow-md hover:shadow-2xl">Alle Etappen</a>
    </x-slot>

    <div class="grid grid-cols-4 gap-8 mx-8">
    @foreach($categories->sortBy('order') as $category)
    
    <a href="{{ route('category', [$stage, $category]) }}" class="flex flex-col justify-center p-4 text-center transition-all duration-200 bg-gray-300 rounded-md shadow-md h-60 hover:shadow-2xl">
        <div class="mb-8 text-4xl">{{ $category->shortname }}</div>
    </a>
    @endforeach
    </div>
</x-layout.page>