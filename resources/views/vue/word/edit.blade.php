@extends('vue.layouts.app')

@section('bread-crumb')
    <x-bread-crumb nameLink1="Words"
                   pathLink1="{{route('vue.words.index')}}"
                   currentName="Edit Word"

    />
@endsection
@section('content')

    <div id="edit-word-app">
        <component-edit-word :id="{{$id}}" />
    </div>
@endsection
