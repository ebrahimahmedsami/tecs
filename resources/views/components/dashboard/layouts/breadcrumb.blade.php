<section id="default-breadcrumb">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Default</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb default-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('dashboard.dashboard')}}</a></li>
                                {{$slot}}
                                <li class="breadcrumb-item active" aria-current="page">{{$now}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
