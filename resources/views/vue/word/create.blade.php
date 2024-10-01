@extends('vue.layouts.app')

@section('bread-crumb')
    <x-bread-crumb nameLink1="Words"
                   pathLink1="{{route('vue.words.index')}}"
                   currentName="Create Word"

    />
@endsection
@section('content')
 
    <div id="create-word">



    </div>

@endsection
