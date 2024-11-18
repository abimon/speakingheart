@extends('layouts.dashboard')
@section('dashboard')
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="mb-2">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Articles</p>
                        <h6 class="mb-0">{{App\Models\Article::count()}}</h6>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Poems</p>
                        <h6 class="mb-0">{{App\Models\Poetry::count()}}
                        </h6>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Songs</p>
                        <h6 class="mb-0">{{App\Models\Music::count()}}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">To Do List</h6>
                    <a href="">Show All</a>
                </div>
                <div class="d-flex mb-2">
                    <input class="form-control bg-dark border-0" type="text" placeholder="Enter task">
                    <button type="button" class="btn btn-primary ms-2">Add</button>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Authentication</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Salary record</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Payment Intergration</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Articles</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Views</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aitems as $key => $item)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>{{date_format($item->created_at, 'jS F, Y')}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author->name}}</td>
                            <td>{{$item->views->count()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Poems</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Views</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pitems as $key => $item)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>{{date_format($item->created_at, 'jS F, Y')}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author->name}}</td>
                            <td>{{$item->views->count()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Books</h6>
            @if (Auth()->user()->isAdmin)
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bookupload"><i
                    class="fa fa-upload"></i> Upload
            </button>
            <!-- Modal -->
            <div class="modal fade" id="bookupload" tabindex="-1" aria-labelledby="BookLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="BookLabel">Upload A book</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" placeholder=" " name="title">
                                    <label for="">Title</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" placeholder=" " name="author">
                                    <label for="">Author</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="w-100 mb-3">
                                        <label for="">Book File</label>
                                        <div class="m-3 card p-3 border-dark bg-transparent"
                                            style="border-style:dashed;">
                                            <embed src="" id="out" type="" style="width: 100%; object-fit:contain;">
                                            <input type="file" accept=".pdf" name="cover" id="cover"
                                                style="display: none;" class="form-control"
                                                onchange="loadCoverFile(event)">
                                            <div class="pt-2" id="desc">
                                                <div class="text-center"
                                                    style="font-size: xxx-large; font-weight:bolder;">
                                                    <i class="bi bi-upload"></i>
                                                </div>
                                                <div class="text-center">
                                                    <label for="cover" class="btn btn-success text-white"
                                                        title="Upload new profile image">Browse</label>
                                                </div>
                                                <div class="text-center prim">*File supported .pdf</div>
                                            </div>
                                            <script>
                                                var loadCoverFile = function (event) {
                                                    var image = document.getElementById('out');
                                                    image.src = URL.createObjectURL(event.target.files[0]);
                                                    document.getElementById('cover').value == image.src;

                                                };
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Downloads</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $key => $item)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>{{date_format($item->created_at, 'jS F, Y')}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author}}</td>
                            <td>{{$item->downloads}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection