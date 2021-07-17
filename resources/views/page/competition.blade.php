<x-layout.page>

    <x-slot name="title">
        Etappenauswahl
    </x-slot>

    <x-slot name="heading">
    Startlisten
    </x-slot>

    <x-slot name="desc">
        Wähle die passende Etappe aus. 
    </x-slot>

    <div class="grid grid-cols-2 gap-8 mx-8">
    @foreach($stages as $stage)
    
    <a href="{{ route('stage', [$stage]) }}" class="flex flex-col justify-center p-4 text-center transition-all duration-200 bg-gray-300 rounded-md shadow-md h-60 hover:shadow-2xl">
        <div class="mb-8 text-8xl">{{ $stage->shortname }}</div>
        <div class="text-4xl">{{ $stage->name }}</div>
    </a>
    @endforeach
    </div>

</x-layout.page>