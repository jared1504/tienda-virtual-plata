<section class="">
    @foreach ($items as $item)
    <div class="">
        <a href="{{ $item['route'] }}">
            <p>{{ $item['text'] }}</p>
        </a>
    </div>
    @endforeach
</section>