@extends("layouts/app", ['title' => 'Books'])
@section('content')
<!-- Books Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Free Books</h6>
            <h1 class="mb-5">The power of change is within a paper full in ink</h1>
        </div>
        <div class="row">
            @foreach($books as $book)
                <div class="col-lg-4 col-md-6 wow fadeInUp h-100 mb-2">
                    <div data-wow-delay="0.3s">
                        <embed src="{{asset('storage/books/' . $book->path)}}" alt=""
                            style="width: 100%; height: 40vh; object-fit: cover;">
                    </div>
                    <div class="price-item" data-wow-delay="0.5s">
                        <div class="border-bottom p-4 mb-4 h-100">
                            <h5 class="text-primary mb-1 overflow-hidden text-uppercase">
                                <?php    echo substr($book->title, 0, 35)?>...</h5>
                            <h6 class="mb-0">By {{$book->author}}</h6>
                        </div>
                        <div class="p-4 pt-0">

                            <a class="btn-slide mt-2" href="/storage/books/{{$book->path}}" onclick="" download>
                                <i class="fa fa-arrow-right"></i>
                                <span>Download Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Books End -->
@endsection