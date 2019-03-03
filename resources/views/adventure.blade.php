@extends('layout')

@section('content')
<h1>{{ $adventure->getTitle() }}</h1>

<p>{!! nl2br($adventure->getDescription()) !!}</p>
<p>
    <a href="{{ route('setting', [
        $adventure->getSlug(),
        $adventure->getFirstSetting()
    ]) }}">
        Let's begin!
    </a>
</p>

@endsection
