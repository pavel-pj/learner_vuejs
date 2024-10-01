@extends('vue.layouts.app')

@section('bread-crumb')
    <x-bread-crumb nameLink1="Words"
                   pathLink1="{{route('vue.words.index')}}"
                   currentName="Easy start"

    />
@endsection
@section('content')

    <div id="easy-start">

    </div>
@endsection
