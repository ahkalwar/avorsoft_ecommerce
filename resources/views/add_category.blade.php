
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <form  method="POST" action="{{ url('category') }}" enctype="multipart/form-data">
                    @csrf
                        
                    <label class="small mb-1" for="inputFirstName">Category Name</label>
                    <input class="form-control py-4" id="inputFirstName" type="text" name="category_name" placeholder="Enter category name here" Required="required" />
                    <span class="small text-danger">{{ $errors->first('category_name') }}</span>
                
                    <label class="small mb-1" for="threshold">Category Image</label>
                    <input class="form-control py-4" id="threshold" type="file" name="category_image" />
                    <span class="small text-danger">{{ $errors->first('category_image') }}</span>
                                
                    <input type="submit" name="add_category" value="Add Category" class="btn btn-primary btn-block">
                        
                    </form>