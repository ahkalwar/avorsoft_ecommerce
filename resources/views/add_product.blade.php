
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <form  method="POST" action="{{ url('product') }}" enctype="multipart/form-data">
                    @csrf
                    <label class="small mb-1" for="inputFirstName">Category</label>
                    <select name="category_id">
                        <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach    
                    </select>
                    <span class="small text-danger">{{ $errors->first('category_id') }}</span>
                    <br />
                    <label class="small mb-1" for="inputFirstName">Product Name</label>
                    <input class="form-control py-4" id="inputFirstName" type="text" name="Product_Name" placeholder="Enter product name here" Required="required" />
                    <span class="small text-danger">{{ $errors->first('product_name') }}</span>
                    <br />
                    <label class="small mb-1" for="inputFirstName">Description</label>
                    <textarea name="Description" rows="6"></textarea>
                    <span class="small text-danger">{{ $errors->first('Description') }}</span>
                    <br />
                    <label class="small mb-1" for="threshold">Product Main Image</label>
                    <input class="form-control py-4" id="threshold" type="file" name="main_image" />
                    <span class="small text-danger">{{ $errors->first('main_image') }}</span>
                    <br />
                    <label class="small mb-1" for="threshold">Product other Images</label>
                    <input class="form-control py-4" id="threshold" type="file" name="images[]" multiple="multiple" />
                    <br />
                    <input type="submit" name="add_product" value="Add Product" class="btn btn-primary btn-block">
                        
                    </form>