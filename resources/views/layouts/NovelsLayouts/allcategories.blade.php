@extends('layouts.MasterLayout.app')

@section('content')
<script>


function CategoryController(e)
{
  var v=document.getElementById("categoryStatusText");
  var status;
  if(e.checked)
  {  
    v.textContent="On";
    status=1;
  }
  else
  {
    v.textContent="Off";
    status=0;
  }
  window.location.href = '{{route("changeCategoryStatus")}}?id='+e.id+'&status='+status;
}
</script>
<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4">
          <input type="text" class="form-control" id="search" placeholder="Search" name="search">
        </div>
        <div class="col-sm-4">
          <button type="button" class="btn btn-primary">Search</button>
        </div>
        <div class="col-sm-4 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
        </div>
      </div>
    </div>
  </div>
<br>

<div class="card ">
<div class="card-header bg-primary mb-3 text-white">Total Categories = {{count($CategoryData)}}</div>
  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#Id</th>
          <th scope="col">Type</th>
          <th scope="col">Thumbnail</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @if (!$CategoryData->isEmpty())
          @foreach ($CategoryData as $index => $item)
          <tr>
            <th>{{$index+1}}</th>
            <td>{{$item->category_name}}</td>
            <td>
              <img src="{{$item->category_thumbnail}}" height="50" width="50" alt="">
            </td>
            <td>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="{{$item->id}}"  onchange="CategoryController(this)"
                  @if($item->status)
                    checked
                  @endif>
                <label class="custom-control-label" id="statusText" for="{{$item->id}}" ></label>
                <small id="categoryStatusText">
                  @if($item->status)
                    On
                  @else
                    Off
                  @endif  
                </small>
              </div>
            </td>
            <td>
            <small>
                <a href="/viewCategory/{{$item->id}}">
                  <i class="fa fa-eye"></i> 
                  View
                </a>
            </small>
            <small>
                <a href="/deleteCategory/{{$item->id}}" class="text-danger text-sm">
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

@endsection
<!-- Add BookCategory Modal -->
@extends('layouts.NovelsLayouts.Modals.addCategory')
