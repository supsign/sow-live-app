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

    <div class="flex flex-col mx-8">
    @foreach($category_starts as $starts)
    <div>
    {{ $starts->runner->name }}
    </div>
    @endforeach
    </div>

</x-layout.page>