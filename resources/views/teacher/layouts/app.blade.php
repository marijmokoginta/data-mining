@include('teacher.layouts.header')
<div id="app">
    @include('teacher.layouts.navbar')

    <div class="container">
        <main class="main" id="main">
            @yield('content')
        </main>
    </div>
</div>
@include('teacher.layouts.footer')
