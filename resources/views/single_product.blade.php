@extends("master")
@section("content")
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">With Sidebar</li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="product-details-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-gallery">
                                            <figure class="product-main-image">
                                            @foreach($product->images as $image)  
                                            @if($image->is_main == 1)  
                                            <?php $p_image = $image->image; ?>
                                                <img id="product-zoom" src="{{ asset('uploads/products/'.$image->image) }}" data-zoom-image="{{ asset('uploads/products/'.$image->image) }}" alt="{{ $product->Product_Name }}">
                                            @endif
                                            @endforeach
                                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </figure><!-- End .product-main-image -->

                                            <div id="product-zoom-gallery" class="product-image-gallery">
                                            @foreach($product->images as $image)  
                                                <a class="product-gallery-item" href="#" data-image="{{ asset('uploads/products/'.$image->image) }}" data-zoom-image="{{ asset('uploads/products/'.$image->image) }}">
                                                    <img src="{{ asset('uploads/products/'.$image->image) }}" alt="{{ $product->Product_Name }}">
                                                </a>
                                            @endforeach
                                                
                                            </div><!-- End .product-image-gallery -->
                                        </div><!-- End .product-gallery -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="product-details product-details-sidebar">
                                            <h1 class="product-title">{{ $product->Product_Name }}</h1><!-- End .product-title -->

                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                            </div><!-- End .rating-container -->

                                            <div class="product-price">
                                                ${{ $product->Price }}
                                            </div><!-- End .product-price -->

                                            <div class="product-content">
                                                <p>{{ $product->Description }}.</p>
                                            </div><!-- End .product-content -->

                                            <div class="product-details-action">
                                            <form class="add_item_to_cart">
                                            @csrf
                                                <div class="details-action-col">
                                                    <label for="qty">Qty:</label>
                                                    <div class="product-details-quantity">
                                                        <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="product_name" id="product_name" value="{{ $product->Product_Name }}">
                                                        <input type="hidden" name="price" id="price" value="{{ $product->Price }}">
                                                        <input type="number" name="qty" id="qty" class="form-control" min="1" max="100" value="1" step="1" data-decimals="0" required>
                                                        <input type="hidden" name="image" id="image" value="{{ $p_image }}">
                                                    </div><!-- End .product-details-quantity -->

                                                    <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                                </div><!-- End .details-action-col -->
                                            </form>

                                                <div class="details-action-wrapper">
                                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                                    <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                                </div><!-- End .details-action-wrapper -->
                                            </div><!-- End .product-details-action -->
                                        </div><!-- End .product-details -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .product-details-top -->

                            <div class="product-details-tab">
                                <ul class="nav nav-pills justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                        <div class="product-desc-content">
                                            <h3>Product Information</h3>
                                            <p>{{ $product->Description }}.</p>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                        <div class="product-desc-content">
                                            <h3>Information</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                                            <h3>Fabric & care</h3>
                                            <ul>
                                                <li>Faux suede fabric</li>
                                                <li>Gold tone metal hoop handles.</li>
                                                <li>RI branding</li>
                                                <li>Snake print trim interior </li>
                                                <li>Adjustable cross body strap</li>
                                                <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                            </ul>

                                            <h3>Size</h3>
                                            <p>one size</p>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                        <div class="product-desc-content">
                                            <h3>Delivery & returns</h3>
                                            <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                            We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                        <div class="reviews">
                                            <h3>Reviews (2)</h3>
                                            <div class="review">
                                                <div class="row no-gutters">
                                                    <div class="col-auto">
                                                        <h4><a href="#">Samanta J.</a></h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                            </div><!-- End .ratings -->
                                                        </div><!-- End .rating-container -->
                                                        <span class="review-date">6 days ago</span>
                                                    </div><!-- End .col -->
                                                    <div class="col">
                                                        <h4>Good, perfect size</h4>

                                                        <div class="review-content">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                                        </div><!-- End .review-content -->

                                                        <div class="review-action">
                                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                        </div><!-- End .review-action -->
                                                    </div><!-- End .col-auto -->
                                                </div><!-- End .row -->
                                            </div><!-- End .review -->

                                            <div class="review">
                                                <div class="row no-gutters">
                                                    <div class="col-auto">
                                                        <h4><a href="#">John Doe</a></h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                            </div><!-- End .ratings -->
                                                        </div><!-- End .rating-container -->
                                                        <span class="review-date">5 days ago</span>
                                                    </div><!-- End .col -->
                                                    <div class="col">
                                                        <h4>Very good</h4>

                                                        <div class="review-content">
                                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                                        </div><!-- End .review-content -->

                                                        <div class="review-action">
                                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                        </div><!-- End .review-action -->
                                                    </div><!-- End .col-auto -->
                                                </div><!-- End .row -->
                                            </div><!-- End .review -->
                                        </div><!-- End .reviews -->
                                    </div><!-- .End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-details-tab -->

                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <div class="sidebar sidebar-product">
                                <div class="widget widget-products">
                                    <h4 class="widget-title">Related Product</h4><!-- End .widget-title -->

                                    <div class="products">
                                    @foreach($related as $item)
                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="{{ url('single/'.str_replace(' ', '-', $item->Product_Name)) }}">
                                            @foreach($item->images as $image)
                                            @if($image->is_main == 1)    
                                                <img src="{{ asset('uploads/products/'.$image->image) }}" alt="{{ $item->Product_Name }}" class="product-image">
                                            @endif
                                            @endforeach
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="{{ url('single/'.str_replace(' ', '-', $item->Product_Name)) }}">{{ $item->Product_Name }}</a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    ${{ $item->Price }}
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->
                                    @endforeach
                                    </div><!-- End .products -->

                                    <a href="{{ url('/categories/'.str_replace(' ', '-', $product->category->category_name)) }}" class="btn btn-outline-dark-3"><span>View More Products</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .widget widget-products -->

                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/blog/sidebar/banner.jpg') }}" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-product -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection