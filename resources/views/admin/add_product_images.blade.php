@extends('admin/master')
@section('content')


                <main>
                    <div class="container">
                    <div class="row mt-4"> 
                        <div class="col-md-10 col-lg-10">
                            <h1 class="">Add Product Images</h1>
                        </div>
                        <div class="col-md-2 col-lg-2 text-right">
                            <a href="{{ url('product') }}" class="btn btn-success">View List</a>
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
                                        <form  method="POST" action="{{ url('productimage') }}" enctype="multipart/form-data">
                                        <!-- @method('PUT') -->
                                        @csrf
                                           
                                      
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="threshold">Product Image</label>
                                                      <input class="form-control py-4" id="threshold" type="file" name="main_image" />
                                                      <span class="small text-danger">{{ $errors->first('main_image') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="is_main">Is Main</label>
                                                        <select class="custom-select" id="is_main" name="is_main">
                                                        <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        <span class="small text-danger">{{ $errors->first('is_main') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0">
                                                <input type="hidden" name="product_id" value="{{ $product_id }}">
                                            <input type="submit" name="add_product_image" value="Add Product Image" class="btn btn-primary btn-block">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </main>
                  
@endsection