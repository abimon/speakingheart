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
                            <td>{{$item->views}}</td>
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
                            <td>{{$item->views}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection