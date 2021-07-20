<x-layout.page>

    <x-slot name="title">
        Kategorienwauswahl
    </x-slot>

    <x-slot name="heading">
    Kategorie {{ $category->shortname }}
    </x-slot>

    <x-slot name="desc">
        Wähle die passende Kategorie aus. 
    </x-slot>
    <div>
        <vue-results :runners="{{ $runners }}" :starts="{{ $category_starts }}" :results="{{ $results }}"></vue-results>
    </div>

</x-layout.page>