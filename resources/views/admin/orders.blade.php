@extends('admin/master')
@section('content')
                <main>
                    <div class="container-fluid">
                    <div class="row mt-4"> 
                        <div class="col-md-10 col-lg-10">
                            <h1 class="">Orders</h1>
                        </div>
                    </div>
                        <hr />
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                        <div class="card mb-4 mt-5">
                            <div class="card-body list_orders">
                                
                            </div>
                        </div>
                    </div>
                </main>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body order_items">
                
            </div>
        </div>
    </div>
</div>
@endsection