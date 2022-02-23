@extends('admin/master')
@section('content')


                <main>
                    <div class="container">
                    <div class="row mt-4"> 
                        <div class="col-md-10 col-lg-10">
                            <h1 class="">Add User</h1>
                        </div>
                        <div class="col-md-2 col-lg-2 text-right">
                            <a href="{{ url('user') }}" class="btn btn-success">View List</a>
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
                                        <form  method="POST" action="{{ url('user') }}">
                                        <!-- @method('PUT') -->
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Name">User Name</label>
                                                        <input class="form-control py-4" id="Name" type="text" name="name" placeholder="Enter User name here" Required="required" />
                                                        <span class="small text-danger">{{ $errors->first('name') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Email">Email</label>
                                                        <input class="form-control py-4" id="Email" type="email" name="email" placeholder="Enter Email here" Required="required" />
                                                        <span class="small text-danger">{{ $errors->first('email') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Password">Password</label>
                                                        <input class="form-control py-4" id="Password" type="password" name="password" placeholder="Enter Password here" Required="required" />
                                                        <span class="small text-danger">{{ $errors->first('password') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Role">Role</label>
                                                        <select name='role_id' class="form-control py-4" id='Role'>
                   
                                                        @foreach($role as $role)
                                                         @if($role->id == $role->role_id)
                                                           <option value="{{$role->id}}" selected="selected">{{$role->role}}</option>
                                                          @else
                                                          <option value="{{$role->id}}">{{$role->role}}</option>
                                                           @endif

                                                          @endforeach
                                                      </select>
                                                      <span class="small text-danger">{{ $errors->first('role') }}</span>
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
                                            <input type="submit" name="add_user" value="Add User" class="btn btn-primary btn-block">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                  
@endsection