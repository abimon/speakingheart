@extends('layouts.dashboard',['title'=>'Articles'])
@section('dashboard')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Articles</h6>
            <a href="{{route('posts.create')}}"><button class="btn btn-success">Create</button></a>
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
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $item)
                        <tr style="white-space: nowrap;">
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>{{date_format($item->created_at, 'jS F, Y')}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author->name}}</td>
                            <td>{{$item->views->count()}}</td>
                            <td><a href="{{route('posts.edit',$item->id)}}"><button class="btn btn-info">Edit</button></a></td>
                            <th>
                                <form action="{{route('posts.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection