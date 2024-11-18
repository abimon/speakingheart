@extends("layouts.app", ['title' => 'Music'])
@section('content')
<!-- Poems Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Music</h6>
            <h1 class="mb-5">It's like a symphony just keep listening.</h1>
        </div>
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp h-100" data-wow-delay="0.5s">
                    <div class="price-item">
                        <div class="border-bottom p-4 mb-4">
                            <h1 class="display-5 mb-0">{{$item->title}}</h1>
                            <h5 class="text-primary mb-1">{{$item->composer}}</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <div>{{$item->content}}</div>
                            <audio src="{{$item->cover}}" controls controlsList="nodownload"></audio>
                            <a href="" class="btn-slide mt-2">
                                <i class="fa fa-arrow-right"></i>
                                <span>Read details</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Poems End -->
@endsection