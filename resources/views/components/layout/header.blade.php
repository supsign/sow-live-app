<div class="flex w-full px-8 mb-24">
    <img src="{{ asset('img/logo_SOW2021_cmyk_NEU.jpeg') }}" class="h-48">
    <div class="w-full pt-4 ml-16">
        
        <div class="mb-4 text-6xl">
            {{ $attributes['heading'] }}
        </div>
        <div class="mb-4 text-3xl">
            {{ $attributes['title'] }}
        </div>

        <div class="grid grid-cols-4 gap-4">
            {!! $attributes['desc'] !!}
        </div>
    </div>
</div>