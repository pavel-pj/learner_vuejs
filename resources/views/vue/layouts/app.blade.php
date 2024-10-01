@include('vue.partical.header')

@include('vue.partical.menu')



<div class=" md:container mx-auto md:px-32 mt-4">

    @yield('bread-crumb')


    @yield('content')




</div>


@include('vue.partical.footer')