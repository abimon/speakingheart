@extends("layouts.app",['title'=>$poem->title])
@section('content')
<!-- Poems Start -->
<div class="row d-flex justify-content-center">
    <div class="col-md-8 py-3 mb-2">
        <div class="container-xxl">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5 text-uppercase">{{$poem->title}}</h1>
                </div>
                <div><?php echo html_entity_decode($poem->content)?></div>
            </div>
        </div>
    </div>
    <div class="col-md-8 py-3 mb-2">
        <div class="container-xxl">
            <div class="row">
                <div class="col-md-4 col-sm-6 text-start fw-bold">
                    <button class="btn btn-transparent">
                        <i>Created
                            {{$poem->created_at->diffForHumans()}}</i>
                    </button>
                </div>
                <div class="col-md-5 col-sm-6 row outline-secondary">
                    <div class="col-4">
                        <button class="btn btn-transparent">
                            {{$poem->views->count()}} <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-transparent">
                            {{$poem->comments->count()}} <i class="fa fa-comments"></i>
                        </button>
                    </div>
                    <div class="col-4">
                        <form action="{{route('plike.store', ['post_id' => $poem->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-transparent">{{$poem->likes->count()}} <i
                                    class="fa fa-thumbs-up"></i></button>
                        </form>
                    </div>
                </div>
            </div>


            <hr>
            <h3 class="text-start mb-2 mt-2">Comments</h3>
            @foreach ($poem->comments as $comment)
                <p class="mb-2"><span class="fw-bold">{{$comment->user->name}}</span> <i>({{$comment->created_at->diffForHumans()}})</i><br>{{$comment->comment}}</p>
                <hr>
            @endforeach
            <form action="{{route('pcomment.store', ['post_id' => $poem->id])}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" placeholder=" "
                        value="{{Auth()->user() ? Auth()->user()->name : ''}}" cols="10" class="form-control">
                    <label for="">Name*</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="email" placeholder=" "
                        value="{{Auth()->user() ? Auth()->user()->email : ''}}" cols="10" class="form-control">
                    <label for="">Email*</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea name="comment" placeholder="Comment goes here... " rows="6" class="w-100"></textarea>

                </div>
                <div class="text-center">
                    <button class="btn btn-danger" type="comment">Post Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Poems End -->
@endsection