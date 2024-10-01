@extends('vue.layouts.app')

@section('bread-crumb')
    <x-bread-crumb nameLink1="Words"
                   pathLink1="{{route('vue.words.index')}}"
                   currentName="Options"

    />
@endsection
@section('content')

    <div id="word-options">
     
    </div>
@endsection
