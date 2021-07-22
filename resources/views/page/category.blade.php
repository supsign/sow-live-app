<x-layout.page>

    <x-slot name="title">
        Kategorienwauswahl
    </x-slot>

    <x-slot name="heading">
    Kategorie {{ $category->shortname }}
    </x-slot>

    <x-slot name="desc">
        <a href="{{ route('competition') }}" class="flex flex-col justify-center h-24 p-4 text-3xl text-center text-white transition-all duration-200 bg-blue-500 rounded-md shadow-md hover:shadow-2xl">Alle Etappen</a>
        <a href="{{ route('stage', [$stage]) }}" class="flex flex-col justify-center h-24 p-4 text-3xl text-center text-white transition-all duration-200 bg-blue-500 rounded-md shadow-md hover:shadow-2xl">{{ $stage->shortname }}</a>
    </x-slot>
    <div>
        <vue-results :runners="{{ $runners }}" :starts="{{ $category_starts }}" :init-results="{{ $results }}"></vue-results>
    </div>

</x-layout.page>