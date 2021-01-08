<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">Category Details</label>
              <input type="text" class="form-control" name="category_name" placeholder="genre">
            </div>
  
            <div class="form-group">
              <label for="message-text" class="col-form-label">Thumbnail:</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="category_thumbnail" required="">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>