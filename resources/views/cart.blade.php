@extends("master")
@section("content")
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php $cart_total = 0; ?>
										@if(Auth::check())
										@foreach($cartItems as $cartitem)
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
													@foreach($cartitem->product->images as $image)
                                    					@if($image->is_main == 1)
															<img src="{{ asset('uploads/products/'.$image->image) }}" alt="Product image">
														@endif
                                    				@endforeach
														</a>
													</figure>

													<h3 class="product-title">
														<a href="{{ url('single/'.str_replace(' ', '-', $cartitem->product->Product_Name)) }}">{{ $cartitem->product->Product_Name }}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">${{ $cartitem->product->Price }}</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="{{ $cartitem->qty }}" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">${{ $cartitem->product->Price*$cartitem->qty }}</td>
											<td class="remove-col">
											<form action="{{ url('remove_cart_item') }}" method="post">
                                   			@csrf
											   	<input type="hidden" name="id" id="id" value="{{ $cartitem->id }}">
												<button type="submit" class="btn-remove"><i class="icon-close"></i></button>
											</form>
											</td>
										</tr>
										<?php
										$cart_total += ($cartitem->product->Price*$cartitem->qty);
										?>
										@endforeach
										@else
                                        @foreach($cartItems as $cartitem)
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="{{ asset('uploads/products/'.$cartitem->attributes->image) }}" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="{{ url('single/'.str_replace(' ', '-', $cartitem->name)) }}">{{ $cartitem->name }}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">${{ $cartitem->price }}</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="{{ $cartitem->quantity }}" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">${{ $cartitem->price*$cartitem->quantity }}</td>
											<td class="remove-col">
											<form action="{{ url('remove_cart_item') }}" method="post">
                                   			@csrf
											   	<input type="hidden" name="id" id="id" value="{{ $cartitem->id }}">
												<button type="submit" class="btn-remove"><i class="icon-close"></i></button>
											</form>
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form action="#">
			            					<div class="input-group">
				        						<input type="text" class="form-control" required placeholder="coupon code">
				        						<div class="input-group-append">
													<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
												</div><!-- .End .input-group-append -->
			        						</div><!-- End .input-group -->
			            				</form>
			            			</div><!-- End .cart-discount -->

			            			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>${{ $cart_total??Cart::getTotal() }}</td>
	                						</tr><!-- End .summary-subtotal -->
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr>

	                						<tr class="summary-shipping-row">
	                							<td>
													<div class="custom-control custom-radio">
														<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="free-shipping">Free Shipping</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$0.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="standart-shipping">Standart:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$10.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="express-shipping">Express:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$20.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-estimate">
	                							<td>Estimate for Your Country<br> <a href="#">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>${{ $cart_total??Cart::getTotal() }}</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->
									
	                				<a href="{{ url('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block <?php echo (!Auth::check() || count($cartItems) == 0)?'disabled':''; ?>">PROCEED TO CHECKOUT</a>
	                				@if(!Auth::check())
									<span class="text-danger">Login first to Checkout</span>
									@elseif(count($cartItems) == 0)
									<span class="text-danger">Cart Empty</span>
									@endif
									
								</div><!-- End .summary -->

		            			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection