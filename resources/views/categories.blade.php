@extends("master")
@section("content")
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Electronics</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-xl-4-5col">
                            <div class="category-banners-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false,
                                    "responsive": {
                                        "768": {
                                            "nav": true
                                        }
                                    }
                                }'>
                                <div class="banner banner-poster">
                                    
                                    <a href="#">
                                        <img src="{{ asset('assets/images/demos/demo-13/banners/banner-7.jpg') }}" alt="Banner">
                                    </a>

                                    <div class="banner-content banner-content-right">
                                        <h3 class="banner-subtitle"><a href="#">Amazing Value</a></h3><!-- End .banner-subtitle -->
                                        <h2 class="banner-title"><a href="#">High Performance 4K TVs</a></h2><!-- End .banner-title -->
                                        <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner banner-poster">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/demos/demo-13/banners/banner-8.jpg') }}" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h3 class="banner-subtitle"><a href="#">Weekend Deal</a></h3><!-- End .banner-subtitle -->
                                        <h2 class="banner-title"><a href="#">Apple & Accessories</a></h2><!-- End .banner-title -->
                                        <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .owl-carousel -->

                            <div class="mb-3"></div><!-- End .mb-3 -->

                            <div class="toolbox">
                                <div class="toolbox-left">
                                    <div class="toolbox-info">
                                        10 Products found
                                    </div><!-- End .toolbox-info -->
                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">
                                    <div class="toolbox-sort">
                                        <label for="sortby">Sort by:</label>
                                        <div class="select-custom">
                                            <select name="sortby" id="sortby" class="form-control">
                                                <option value="popularity" selected="selected">Most Popular</option>
                                                <option value="rating">Most Rated</option>
                                                <option value="date">Date</option>
                                            </select>
                                        </div>
                                    </div><!-- End .toolbox-sort -->
                                </div><!-- End .toolbox-right -->
                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row">
                                @foreach($products as $product)
                                    <div class="col-6 col-md-4 col-xl-3">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ url('single/'.str_replace(' ', '-', $product->Product_Name)) }}">
                                                @foreach($product->images as $image)
                                                    @if($image->is_main == 1)
                                                    <?php $p_image = $image->image; ?>
                                                        <img src="{{ asset('uploads/products/'.$image->image) }}" alt="{{ $product->Product_Name }}" class="product-image">
                                                    @endif
                                                @endforeach
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                <form class="add_item_to_cart">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                                <input type="hidden" name="product_name" id="product_name" value="{{ $product->Product_Name }}">
                                                <input type="hidden" name="price" id="price" value="{{ $product->Price }}">
                                                <input type="hidden" name="qty" id="qty" value="1">
                                                <input type="hidden" name="image" id="image" value="{{ $p_image }}">
                                                    <button type="submit" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></button>
                                                </form>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{ $product->category->category_name }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{ url('single/'.str_replace(' ', '-', $product->Product_Name)) }}">{{ $product->Product_Name }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ${{ $product->Price }}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 12 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                                @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item-total">of 2</li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3 col-xl-5col order-lg-first">
                            <div class="sidebar sidebar-shop">
                                <div class="widget widget-categories">
                                    <h3 class="widget-title">Electronics</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="accordion" id="widget-cat-acc">
                                            <div class="acc-item">
                                                <h5>
                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                        Laptops & Computers
                                                    </a>
                                                </h5>
                                                <div id="collapse-1" class="collapse show" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                            <li><a href="#">Desktop Computers</a></li>
                                                            <li><a href="#">Monitors</a></li>
                                                            <li><a href="#">Laptops</a></li>
                                                            <li><a href="#">iPad & Tablets</a></li>
                                                            <li><a href="#">Hard Drives & Storage</a></li>
                                                            <li><a href="#">Printers & Supplies</a></li>
                                                            <li><a href="#">Computer Accessories</a></li>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            <div class="acc-item">
                                                <h5>
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                        TV & Video
                                                    </a>
                                                </h5>
                                                <div id="collapse-2" class="collapse" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                            <li><a href="#">AV Receivers & Amplifiers</a></li>
                                                            <li><a href="#">Blu-ray Players & Recorders</a></li>
                                                            <li><a href="#">DVD Players & Recorders</a></li>
                                                            <li><a href="#">HD DVD Players</a></li>
                                                            <li><a href="#">Home Theater Systems</a></li>
                                                            <li><a href="#">Projection Screens</a></li>
                                                            <li><a href="#">Projectors</a></li>
                                                            <li><a href="#">Satellite Television</a></li>
                                                            <li><a href="#">Televisions</a></li>
                                                            <li><a href="#">TV-DVD Combos</a></li>
                                                            <li><a href="#">Streaming Media Players</a></li>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            <div class="acc-item">
                                                <h5>
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                        Cell Phone
                                                    </a>
                                                </h5>
                                                <div id="collapse-3" class="collapse" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                            <li><a href="#">Carrier Cell Phones</a></li>
                                                            <li><a href="#">Unlocked Cell Phones</a></li>
                                                            <li><a href="#">Mobile Broadband</a></li>
                                                            <li><a href="#">Accessories</a></li>
                                                            <li><a href="#">Cases, Holsters & Clips</a></li>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            <div class="acc-item">
                                                <h5>
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                        Digital Cameras
                                                    </a>
                                                </h5>
                                                <div id="collapse-4" class="collapse" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                            <li><a href="#">Accessories</a></li>
                                                            <li><a href="#">Bags & Cases</a></li>
                                                            <li><a href="#">Binoculars & Scopes</a></li>
                                                            <li><a href="#">Film Photography</a></li>
                                                            <li><a href="#">Flashes</a></li>
                                                            <li><a href="#">Lenses</a></li>
                                                            <li><a href="#">Lighting & Studio</a></li>
                                                            <li><a href="#">Tripods & Monopods</a></li>
                                                            <li><a href="#">Underwater Photography</a></li>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->
                                        </div><!-- End .accordion -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Brands</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-1">
                                                    <label class="custom-control-label" for="brand-1">Next</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-2">
                                                    <label class="custom-control-label" for="brand-2">River Island</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-3">
                                                    <label class="custom-control-label" for="brand-3">Geox</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-4">
                                                    <label class="custom-control-label" for="brand-4">New Balance</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-5">
                                                    <label class="custom-control-label" for="brand-5">UGG</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-6">
                                                    <label class="custom-control-label" for="brand-6">F&F</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-7">
                                                    <label class="custom-control-label" for="brand-7">Nike</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Price</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-1" name="filter-price">
                                                    <label class="custom-control-label" for="price-1">Under $25</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-2" name="filter-price">
                                                    <label class="custom-control-label" for="price-2">$25 to $50</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-3" name="filter-price">
                                                    <label class="custom-control-label" for="price-3">$50 to $100</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-4" name="filter-price">
                                                    <label class="custom-control-label" for="price-4">$100 to $200</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-5" name="filter-price">
                                                    <label class="custom-control-label" for="price-5">$200 & Above</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Customer Rating</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cus-rating-1">
                                                    <label class="custom-control-label" for="cus-rating-1">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 100%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 24 )</span>
                                                        </span><!-- End .rating-container -->
                                                    </label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cus-rating-2">
                                                    <label class="custom-control-label" for="cus-rating-2">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 80%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 8 )</span>
                                                        </span><!-- End .rating-container -->
                                                    </label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cus-rating-3">
                                                    <label class="custom-control-label" for="cus-rating-3">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 60%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 5 )</span>
                                                        </span><!-- End .rating-container -->
                                                    </label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cus-rating-4">
                                                    <label class="custom-control-label" for="cus-rating-4">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 40%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 1 )</span>
                                                        </span><!-- End .rating-container -->
                                                    </label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cus-rating-5">
                                                    <label class="custom-control-label" for="cus-rating-5">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 20%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 3 )</span>
                                                        </span><!-- End .rating-container -->
                                                    </label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Colour</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                            <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                        </div><!-- End .filter-colors -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">ad banner 218 x 430px</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="assets/images/demos/demo-13/banners/banner-6.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->

            <div class="cta cta-horizontal cta-horizontal-box bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                        </div><!-- End .col-lg-5 -->
                        
                        <div class="col-lg-7">
                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
        </main><!-- End .main -->
@endsection