@extends('admin/master')
@section('content')


                <main>
                    <div class="container">
                    <div class="row mt-4"> 
                        <div class="col-md-10 col-lg-10">
                            <h1 class="">Edit Product</h1>
                        </div>
                        <div class="col-md-2 col-lg-2 text-right">
                            <a href="{{ url('admin/product') }}" class="btn btn-success">View List</a>
                        </div>
                    </div>
                    <hr />
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div class="row">
                    <div class="col-md-1 col-lg-1"></div>
                            <div class="col-sm-10 col-md-10 col-lg-10">
                                <div class="card border-0 rounded-lg mt-3">
                                    <div class="card-body">
                                        <form  method="POST" action="{{ url('admin/product/'.$product->id) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Category</label>
                                                        <select class="custom-select" name="category_id">
                                                        @foreach($categories as $category)
                                                        @if($category->id == $product->category_id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                                          @else
                                                         <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                         @endif 
                                                     @endforeach    
                                                     </select>
                                                        <span class="small text-danger">{{ $errors->first('category_id') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Product Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" name="Product_Name" value="{{ $product->Product_Name }}"  />
                                                        <span class="small text-danger">{{ $errors->first('product_name') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Price">Product Price</label>
                                                        <input class="form-control py-4" id="Price" type="number" name="price" value="{{ $product->Price }}" />
                                                        <span class="small text-danger">{{ $errors->first('price') }}</span>
                                                    </div>
                                                </div>
                                            </div><div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Stock">Product Stock</label>
                                                        <input class="form-control py-4" id="Stock" type="number" name="stock" value="{{ $product->Stock }}"  />
                                                        <span class="small text-danger">{{ $errors->first('stock') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Description</label>
                                                      <textarea class="form-control" name="Description" rows="6">{{ $product->Description }}</textarea>
                                                      <span class="small text-danger">{{ $errors->first('Description') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="threshold">Product Main Image</label>
                                                      <input class="form-control py-4" id="threshold" type="file" name="main_image" />
                                                      <span class="small text-danger">{{ $errors->first('main_image') }}</span>
                                                    </div>
                                                </div>
                                            </div><div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="threshold">Product other Images</label>
                                                      <input class="form-control py-4" id="threshold" type="file" name="images[]" multiple="multiple" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="featured">Featured</label>
                                                        <select class="custom-select" id="featured" name="featured">
                                                        <option value="1">Featured</option>
                                                            <option value="0">Not Featured</option>
                                                        </select>
                                                        <span class="small text-danger">{{ $errors->first('status') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="status">Status</label>
                                                        <select class="custom-select" id="status" name="status">
                                                        <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                        <span class="small text-danger">{{ $errors->first('status') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                            <input type="submit" name="update_product" value="Update Product" class="btn btn-primary btn-block">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                  
@endsection