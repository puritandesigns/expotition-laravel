@extends('layout')

@section('content')
<h1>Thank you for playing</h1>

<p>
    Would you like to

    <a href="{{ route('adventure', $adventure->getSlug()) }}">play again?</a>

    <br/>Or<br/>

    <a href="{{ route('home') }}">go back to the adventure list?</a>
</p>
@endsection
