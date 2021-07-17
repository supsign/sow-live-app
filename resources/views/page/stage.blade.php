<x-layout.page>
    <x-slot name="title">
        Kategorienwauswahl
    </x-slot>

    <x-slot name="heading">
    Startlisten {{ $stage->shortname }} {{ $stage->name }}
    </x-slot>

    <x-slot name="desc">
        Wähle die passende Kategorie aus. 
    </x-slot>

    <div class="grid grid-cols-2 gap-8 mx-8">
    @foreach($categories as $category)
    
    <a href="{{ route('category', [$stage, $category]) }}" class="flex flex-col justify-center p-4 text-center transition-all duration-200 bg-gray-300 rounded-md shadow-md h-60 hover:shadow-2xl">
        <div class="mb-8 text-8xl">{{ $category->shortname }}</div>
    </a>
    @endforeach
    </div>
</x-layout.page>