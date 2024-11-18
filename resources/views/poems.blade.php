@extends("layouts/app",['title'=>'Poems'])
@section('content')
<!-- Poems Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Poems</h6>
            <h1 class="mb-5">The Rhyme in Poetry</h1>
        </div>
        <div class="row">
        @foreach($poems as $poem)
      <div class="col-lg-4 col-md-6 wow fadeInUp h-100 mb-2">
        <div data-wow-delay="0.3s">
          <img src="{{asset('storage/poetry/'.$poem->cover)}}" alt="" style="width: 100%; height: 40vh; object-fit: cover;">
        </div>
        <div class="price-item" data-wow-delay="0.5s">
          <div class="border-bottom p-4 mb-4 h-100">
            <h5 class="text-primary mb-1 overflow-hidden text-uppercase" ><?php echo substr($poem->title,0,30)?>...</h5>
            <h6 class="mb-0"> {{$poem->created_at->diffForHumans()}} by {{$poem->author->name}}</h6>
          </div>
          <div class="p-4 pt-0">
            <div style="height: 30vh;overflow:hidden;"><?php echo html_entity_decode($poem->content);?></div>
            <a class="btn-slide mt-2" href="/poetry/{{$poem->slug}}">
              <i class="fa fa-arrow-right"></i>
              <span>Read Now</span>
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