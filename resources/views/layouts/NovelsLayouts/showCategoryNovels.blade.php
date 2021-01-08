@extends('layouts.MasterLayout.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            @if(!$catdata->isempty())
            {{$catdata[0]->category_name}}
            @endif
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="search" placeholder="search novel by name" name="search">
                </div>
                <div class="col-sm-4 text-center">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>

            <div class="row">
                <div class="card-body">
                    <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Summary</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(!$catdata->isempty())
                            @foreach ($catdata as $index=>$item)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->author}}</td>
                                    <td>
                                        <img src="{{$item->novel_thumbnail}}" height="50" width="50" alt="">
                                    </td>
                                    <td>
                                        <textarea class="form-control text-left" aria-label="With textarea">
                                            {{$item->summary}}
                                        </textarea>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="{{$item->id}}"  onchange="CategoryController(this)"
                                            @if($item->status!=null &&$item->status==1)
                                                checked
                                            @endif>
                                            <label class="custom-control-label" id="statusText" for="{{$item->id}}" ></label>
                                            <small id="categoryStatusText">
                                            @if($item->status!=null &&$item->status==1)
                                                On
                                            @else
                                                Off
                                            @endif  
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <small>
                                            {{-- <a href="/viewCategory/{{$item->id}}"> --}}
                                                <i class="fa fa-eye"></i> 
                                                Edit
                                            </a>
                                        </small>&nbsp;&nbsp;&nbsp;
                                        <small>
                                            {{-- <a href="/deleteCategory/{{$item->id}}" class="text-danger text-sm"> --}}
                                                <i class="fa fa-trash"></i>  
                                                Delete
                                            </a>
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td>
                              sorry no data found
                            </td>
                          </tr>
                        @endif
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection