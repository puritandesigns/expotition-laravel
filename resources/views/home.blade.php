@extends('layout')

@section('content')
<h1>Gamebook Web App</h1>

<p>Welcome! Here's a list of available adventures</p>
    
<ul>
    <li>
        <a href="{{ route('adventure', 'test') }}">
            Test
        </a>
    </li>
</ul>
@endsection
