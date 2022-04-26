@extends('admin/master')
@section('content')

                <main>
                    <div class="container-fluid">
                    <div class="row mt-4"> 
                        <div class="col-md-10 col-lg-10">
                            <h1 class="">Product Images</h1>
                        </div>
                        <div class="col-md-2 col-lg-2 text-right">
                            <a href="{{ url('admin/addimage/'.$product_id) }}" class="btn btn-success">Add<svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></a>
                        </div>
                    </div>
                        <hr />
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                        <div class="card mb-4 mt-5">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               
                                                <th>Product Image</th>
                                                <th>Is Main</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        @foreach($product_images as $product_images)
                                            <tr>                                                                                              
                                                <td>
                                                   
                                                    <img src="{{ asset('uploads/products/'.$product_images->image) }}" alt="{{ $product_images->image }}" height="220" width="320">
                                                 </td>
                                                <td>{{ $product_images->is_main }}</td>                                                                                          
                                               
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection