@include('layouts.header')
<div id="app">
    @include('layouts.navbar')

    <div class="container">
        <main class="main" id="main">
            @yield('content')
        </main>
    </div>
</div>
@include('layouts.footer')
