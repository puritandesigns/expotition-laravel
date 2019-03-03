@extends('layout')

@section('content')
@if(! empty($setting->getTitle()))
<h1>{{ $setting->getTitle() }}</h1>
@endif

<p>{!! nl2br($setting->getDescription()) !!}</p>

<ul>
    @foreach($setting->getActions() as $index => $action)
    <li>
        <a href="{{ route('action', [
            $adventure->getSlug(),
            $setting->getSlug(),
            $index + 1
        ]) }}">
            {{ $action->getDescription() }}
        </a>
    </li>
    @endforeach
</ul>

@endsection
