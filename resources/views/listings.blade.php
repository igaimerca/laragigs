<h1>{{ $heading }}</h1>

@php
    $test = 1;
@endphp
{{-- {{ $test }} --}}

@unless (count($listings) == 0)
    @foreach ($listings as $listing)
        <a href="/listings/{{$listing['id']}}">{{ $listing['title'] }}</a>
        <p>{{ $listing['description'] }}</p>
    @endforeach
@else
    <p>No listings found</p>
@endunless
