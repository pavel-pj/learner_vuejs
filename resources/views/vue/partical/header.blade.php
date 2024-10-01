<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >

    <title>Learner</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" sizes="32x32" href="{{url('/storage/hexagon.png')}}"  >
   <link rel="apple-touch-icon"  type="image/png" sizes="32x32" href="{{url('/storage/hexagon.png')}}" >

   

    @vite([
    'resources/css/choices.css',
    'resources/css/vue-multiselect.css',
    'resources/css/app.css',
    'resources/js/app.js'
    ])

    <style>
       .body {
            font-family: 'Commissioner', sans-serif;
            font-weight: 400;
            margin: 0px;
            padding: 0px;
        }

    </style>
</head>
<body id='body-page' class="bg-stone-100">
