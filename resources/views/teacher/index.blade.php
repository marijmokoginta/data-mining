<div class="pagetitle">
    <h5>{{ __('navbar.dashboard') }}</h5>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    @foreach ($dashboard_features as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card rounded-4" style="min-height: 40vh">
                <div class="card-body">
                   <h5 class="card-title">{{ $item->name }}</h5>
                </div>
            </div>
        </div>
    @endforeach
</div>