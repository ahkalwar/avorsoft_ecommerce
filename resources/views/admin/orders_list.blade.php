<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Billing Address</th>
                <th>Shipping Address</th>
                <th>Order Price</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody> 
        @foreach($orders as $order)
            <tr>
                <td>
                {{ $order->id }}
                <a class="text-primary float-right order_detail_modal" data-id="{{ $order->id }}" data-toggle="modal" data-target=".bd-example-modal-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
</a>
                </td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->billing_address }}</td>
                <td>{{ $order->shipping_address }}</td>
                <td>${{ $order->order_price }}</td>
                <td>{{ date("Y-m-d", strtotime($order->order_date)) }}</td>
                <td>
                    @if($order->order_status == "completed")
                    <span class="badge badge-success">{{ ucfirst($order->order_status) }}</span>
                    @elseif($order->order_status == "processing")
                    <span class="badge badge-warning">{{ ucfirst($order->order_status) }}</span>
                    @else
                    <span class="badge badge-danger">{{ ucfirst($order->order_status) }}</span>
                    @endif
                </td>
                <td></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
<script>
    $(".order_detail_modal").on("click", function(){
        var order_id = $(this).data("id");
        $.ajax({
            url: "{{ url('admin/order_items') }}/"+order_id,
            type: "GET",
            success:function(res){
                $(".order_items").html(res);
            }
        });
    });
</script>