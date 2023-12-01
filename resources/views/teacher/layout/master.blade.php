<!DOCTYPE html>
<html lang="en">
   <!--*******************
        Head
    ********************-->
@include('teacher.layout.head')

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
        @include('teacher.layout.header')


        <!--**********************************
           Side Nav
        ***********************************-->
        @include('teacher.layout.sidenav')


        <!--**********************************
            Content body
        ***********************************-->
        @yield('content')



        <!--**********************************
            Footer
        ***********************************-->
        @include('teacher.layout.footer')




    </div>

    <!--**********************************
        Scripts
    ***********************************-->


    @include('teacher.layout.script')

</body>

</html>
