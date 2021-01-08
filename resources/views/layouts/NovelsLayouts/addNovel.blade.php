@extends('layouts.MasterLayout.app')

@section('content')
<script>  
@if(Session::has('noveladded'))
    window.onload = function(e){ 
    swal("Congratulations!", "Category {{ Session::get('noveladded')}} has been added", "success");
    }
@endif
</script>



<div class="container">
    @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>   
                @endforeach
            </div>  
        @endif
    <div class="card">
        <div class="card-header">
          Add Novel
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('addNovelInfo')}}" enctype="multipart/form-data">
                @csrf
                <label for="inputState">Category</label>
                <select id="inputState" class="form-control" name="category_id">
                    <option selected na >Choose Category</option>
                    @if(!$Categories->isEmpty())
                        @foreach ($Categories as $index=>$item)
                        <option value={{$item->id}}>
                            {{$item->category_name}}
                        </option>
                        @endforeach
                    @else
                        <option>Add a Category First</option>
                    @endif        
                </select><br>
                <div class="form-group">
                    <label for="formGroupExampleInput">Novel Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Novel Name" required="">
                    <br>
                    <label for="formGroupExampleInput">Author Name</label>
                    <input type="text" class="form-control" name="author" placeholder="Enter Author Name" required="">
                    <br>
                    <label for="formGroupExampleInput">Summary</label>
                    <textarea class="form-control text-left" aria-label="With textarea " name="summary" required="">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Thumbnail:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="novel_thumbnail">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Novel</button></form>
            </div>
      </div>
</div>
@endsection

