<div class="row">
    <div class="col-sm-4">
        <table class="table table-borderless">
            <tr>
                <th>Order #: </th><td>{{ $order->id }}</td>
            </tr>
            <tr>    
                <th>Customer Name: </th><td>{{ $order->user->name }}</td>
            </tr>
            <tr>
                <th>Order Date: </th><td>{{ date("Y-m-d", strtotime($order->order_date)) }}</td>
            </tr>
            <tr>
                <th>Order Price: </th><td>${{ $order->order_price }}</td>
            </tr>
        </table>
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
        <table class="table table-borderless">
            <tr>
                <th>Billing Address: </th><td>{{ $order->billing_address }}</td>
            </tr>
            <tr>    
                <th>Shipping Address: </th><td>{{ $order->shipping_address }}</td>
            </tr>
            <tr>
                <th>Status: </th>
                <td>
                    @if($order->order_status == "completed")
                    <span class="badge badge-success">{{ ucfirst($order->order_status) }}</span>
                    @elseif($order->order_status == "processing")
                    <span class="badge badge-warning">{{ ucfirst($order->order_status) }}</span>
                    @else
                    <span class="badge badge-danger">{{ ucfirst($order->order_status) }}</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        
        <tbody> 
        <?php $i = 1; ?>
        @foreach($items as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="{{ asset('uploads/products/'.$item->product->image) }}" alt="{{ $item->product->Product_Name }}" height="50" width="60"></td>
                <td>{{ $item->product->Product_Name }}</td>
                <td>${{ $item->product->Price }}</td>
                <td>{{ $item->qty }}</td>
            </tr>
        @endforeach    
        </tbody>
    </table>
</div>