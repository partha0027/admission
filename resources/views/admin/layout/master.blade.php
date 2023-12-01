<!DOCTYPE html>
<html lang="en">
<!--*******************
        Head
    ********************-->
@include('admin.layout.head')

<body>

    <!--*******************
        Preloader
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>


    <!--**********************************
        Main wrapper
    ***********************************-->
    <div id="main-wrapper">



        <!--**********************************
           Header
        ***********************************-->
        @include('admin.layout.header')


        <!--**********************************
           Side Nav
        ***********************************-->
        @include('admin.layout.sidenav')


        <!--**********************************
            Content body
        ***********************************-->
        @yield('content')



        <!--**********************************
            Footer
        ***********************************-->
        @include('admin.layout.footer')




    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    @yield('js')


    @include('admin.layout.script')

</body>

</html>
