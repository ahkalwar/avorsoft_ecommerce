@extends('admin/master')
@section('content')


                <main>
                    <div class="container">
                    <div class="row mt-4"> 
                        <div class="col-md-10 col-lg-10">
                            <h1 class="">Add Role</h1>
                        </div>
                        <div class="col-md-2 col-lg-2 text-right">
                            <a href="{{ url('admin/role') }}" class="btn btn-success">View List</a>
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
                                        <form  method="POST" action="{{ url('admin/role') }}">
                                        <!-- @method('PUT') -->
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Role Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" name="role" placeholder="Enter Role name here" Required="required" />
                                                        <span class="small text-danger">{{ $errors->first('role') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group mt-4 mb-0">
                                            <input type="submit" name="add_role" value="Add Role" class="btn btn-primary btn-block">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                  
@endsection