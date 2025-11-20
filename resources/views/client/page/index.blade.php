@extends('client.layout')

@section('banner')
<style>
    /* =================== GLOBAL STYLE =================== */
    body {
        background-color: #f9f9fb;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    /* Section titles */
    .section-title .title {
        color: #ff66a3;
        font-weight: 700;
        letter-spacing: 1px;
        animation: fadeInDown 1s ease;
    }

    /* Button style */
    .btn-primary {
        background: linear-gradient(45deg, #ff85a1, #ffd36b);
        border: none;
        transition: all 0.3s ease;
        color: #fff;
    }
    .btn-primary:hover {
        transform: scale(1.05);
        background: linear-gradient(45deg, #ffd36b, #ff85a1);
        box-shadow: 0 4px 15px rgba(255, 133, 161, 0.4);
    }

    /* Banner text animation */
    .slider-content h2.main-title {
        animation: slideInLeft 1s ease;
        color: #fff;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }
    .slider-content p, .slider-content h5 {
        animation: fadeIn 2s ease;
    }

    /* =================== SHIPPING AREA =================== */
    .single-shipping {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .single-shipping:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 20px rgba(255, 163, 200, 0.4);
    }
    .single-shipping img {
        width: 60px;
        height: 60px;
        animation: float 3s ease-in-out infinite;
    }

    /* =================== PRODUCT =================== */
    .single-product {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .single-product:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 8px 25px rgba(255, 133, 161, 0.3);
    }
    .single-product img {
        border-bottom: 2px solid #ffe0e9;
        transition: transform 0.3s ease;
    }
    .single-product:hover img {
        transform: scale(1.08);
    }
    .product-name {
        color: #ff66a3;
        font-weight: 600;
    }
    .price-box {
        color: #333;
        font-weight: bold;
    }

    /* =================== BLOG AREA =================== */
    .single-blog {
        background: #fff;
        border-radius: 15px;
        /*overflow: hidden;*/
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .single-blog:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(255, 180, 200, 0.3);
    }
    .single-blog .title a {
        color: #ff66a3;
        transition: color 0.3s ease;
    }
    .single-blog:hover .title a {
        color: #ffd36b;
    }

    /* =================== ANIMATION EFFECTS =================== */
    @keyframes fadeIn {
        0% {opacity: 0; transform: translateY(30px);}
        100% {opacity: 1; transform: translateY(0);}
    }
    @keyframes fadeInDown {
        0% {opacity: 0; transform: translateY(-30px);}
        100% {opacity: 1; transform: translateY(0);}
    }
    @keyframes slideInLeft {
        0% {opacity: 0; transform: translateX(-100px);}
        100% {opacity: 1; transform: translateX(0);}
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    /* =================== FADE-IN ON SCROLL =================== */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
    }
    .fade-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* =================== PRODUCT CARD IMPROVED =================== */
    .single-product {
        background: #fff;
        border-radius: 16px;
        text-align: center;
        /*overflow: hidden;*/
        box-shadow: 0 4px 12px rgba(255, 102, 163, 0.1);
        transition: all 0.3s ease-in-out;
    }
    .single-product:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(255, 102, 163, 0.25);
    }

    .single-product img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.3s ease;
        border-bottom: 1px solid #ffe0ec;
    }
    .single-product:hover img {
        transform: scale(1.05);
    }

    /* Tên sản phẩm */
    .product-name {
        font-size: 15px;
        color: #ff4fa1;
        font-weight: 600;
        line-height: 1.3em;
        min-height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin: 10px 0 5px 0;
        padding: 0 6px;
    }

    /* Giá sản phẩm */
    .price-box {
        color: #ff0077;
        font-weight: 700 !important;
        font-size: 20px !important;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    /* Nút hoặc biểu tượng trong sản phẩm */
    .action-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        gap: 10px;
    }
    .action-links a {
        display: inline-block;
        color: #fff;
        background: linear-gradient(45deg, #ff85a1, #ffd36b);
        border-radius: 50%;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        transition: all 0.3s ease;
    }
    .action-links a:hover {
        background: linear-gradient(45deg, #ffd36b, #ff85a1);
        transform: scale(1.1);
    }
    .current-price{
        font-size: 30px !important;
    }
    .single-product {
        position: relative;
        /*overflow: hidden;*/
    }

    .single-product .product-image {
        position: relative;
    }

    .single-product .action-links {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        opacity: 1; /* luôn hiển thị */
        z-index: 10;
    }

    /* Style từng nút icon */
    .single-product .action-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(255, 100, 150, 0.9);
        color: white;
        border-radius: 50%;
        text-decoration: none;
        font-size: 16px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }

    .single-product .action-links a:hover {
        background: #ff6fa3;
        transform: scale(1.1);
    }

    /* Đảm bảo icon của Font Awesome hiển thị rõ */
    .single-product .action-links i {
        color: white !important;
    }

    /* css bai viet    */

    /* Tổng thể blog */
    .blog-area {
        background: #fff;
        padding: 80px 0;
        font-family: 'Poppins', sans-serif;
    }

    /* Tiêu đề chính */
    .section-title h2.title {
        font-size: 34px;
        font-weight: 700;
        color: #222;
        margin-bottom: 15px;
    }

    .section-title p {
        color: #555;
        font-size: 17px;
        line-height: 1.7;
    }

    /* Thẻ bài viết */
    .single-blog {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        /*overflow: hidden;*/
        transition: all 0.3s ease;
        height: 100%;
    }

    .single-blog:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    /* Ảnh bài viết — sửa lỗi ảnh nhỏ hơn thẻ */
    .blog-image {
        width: 100%;
        height: 320px;
        /*overflow: hidden;*/
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .single-blog:hover .blog-image img {
        transform: scale(1.05);
    }

    /* Nội dung */
    .blog-content {
        padding: 22px 20px 25px;
        text-align: left;
    }

    /* Tiêu đề bài viết */
    .blog-content h4.title {
        font-size: 22px;
        font-weight: 700;
        color: #2a2a2a;
        margin-bottom: 10px;
    }

    .blog-content h4.title a {
        color: inherit;
        text-decoration: none;
    }

    .blog-content h4.title a:hover {
        color: #ff4081;
    }

    /* Ngày đăng */
    .articles-date {
        font-size: 14px;
        color: #ff4081;
        margin-bottom: 10px;
    }

    /* Mô tả */
    .four-line {
        color: #444;
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 15px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    /* Footer */
    .blog-footer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .blog-footer a.more {
        color: #ff4081;
        font-weight: 600;
        font-size: 16px;
        text-decoration: none;
        transition: color 0.3s;
    }

    .blog-footer a.more:hover {
        color: #e73370;
    }

    /* Swiper arrows */
    .swiper-next, .swiper-prev {
        position: absolute;
        top: 45%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        color: #333;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .swiper-next:hover, .swiper-prev:hover {
        background: #ff4081;
        color: #fff;
    }

    .swiper-next {
        right: -20px;
    }

    .swiper-prev {
        left: -20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .blog-image {
            height: 240px;
        }

        .blog-content h4.title {
            font-size: 20px;
        }

        .four-line {
            font-size: 15px;
        }
    }


</style>

<script>
    // Fade-up animation when scrolling
    document.addEventListener('DOMContentLoaded', function() {
        const fadeElems = document.querySelectorAll('.fade-up');
        function checkVisible() {
            fadeElems.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    el.classList.add('visible');
                }
            });
        }
        window.addEventListener('scroll', checkVisible);
        checkVisible();
    });
    var swiper = new Swiper(".blogSlider", {
        slidesPerView: 3,        // ⭐ Chỉ hiển thị đúng 3 sản phẩm
        spaceBetween: 30,        // Khoảng cách giữa các sản phẩm
        slidesPerGroup: 1,       // Click arrow trượt 1 sản phẩm (hoặc 3 tùy bạn)
        loop: false,             // Không cần loop nếu không muốn lặp vô hạn
        navigation: {
            nextEl: ".swiper-next",
            prevEl: ".swiper-prev",
        }
    });

</script>

<div class="banner-main">
    <div class="slider-area position-relative">
        <div class="swiper-container slider-active">
            <div class="swiper-wrapper">
                <!--Single Slider Start-->
                <div class="single-slider swiper-slide animation-style-01"
                     style="background-image: url('{{ asset('assets/imgs/KIDOLBanner.png') }}'); background-size:cover; background-position:center;">
                    <div class="container">
                        <div class="slider-content text-center text-white">
                            <h5 class="sub-title">Nhập: <span class="text-warning">SALE100K</span> <br> Giảm
                                100K cho mọi đơn hàng</h5>
                            <h2 class="main-title">Ngày đặc biệt!</h2>
                            <p>Nhập: <span class="text-warning">SALE10</span> để được giảm 10%, số lượng có hạn!</p>
                            <ul class="slider-btn">
                                <li><a href="{{route('locsanpham')}}" class="btn btn-round btn-primary">Bắt đầu mua sắm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Single Slider End-->

                <div class="single-slider swiper-slide animation-style-01"
                     style="background-image: url('{{ asset('assets/imgs/KIDOLBanner2.png') }}'); background-size:cover; background-position:center;">
                    <div class="container text-end text-white">
                        <div class="slider-content">
                            <h5 class="sub-title">Nhập: <span class="text-info">SALE100K</span><br> Giảm 100K cho mọi đơn hàng</h5>
                            <h2 class="main-title">Ngày đặc biệt!</h2>
                            <p>Nhập: <span class="text-info">SALE10</span> để được giảm 10%, số lượng có hạn!</p>
                            <ul class="slider-btn">
                                <li><a href="" class="btn btn-round btn-primary">Bắt đầu mua sắm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
            <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
@endsection

@section('content')
{{-- shipping area --}}
<div class="shipping-area  " style="padding: 90px;">
    <div class="container ">
        <div class="row d-flex align-items-stretch">
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping d-flex h-100">
                    <div class="shipping-icon">
                        <img src="{{ asset('assets/imgs/Free-Delivery.png') }}" alt="">
                    </div>
                    <div class="shipping-content" style="margin-left:20px;">
                        <h5 class="title">Miễn phí vận chuyển</h5>
                        <p>Giao hàng miễn phí cho tất cả các đơn đặt hàng trên 1.000.000đ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping d-flex h-100">
                    <div class="shipping-icon">
                        <img src="{{ asset('assets/imgs/Online-Order.png') }}" alt="">
                    </div>
                    <div class="shipping-content" style="margin-left:20px;">
                        <h5 class="title">Đặt hàng online</h5>
                        <p>Đừng lo lắng, bạn có thể đặt hàng Trực tuyến trên Trang web của chúng tôi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping d-flex h-100">
                    <div class="shipping-icon">
                        <img src="{{ asset('assets/imgs/Freshness.png') }}" alt="">
                    </div>
                    <div class="shipping-content" style="margin-left:20px;">
                        <h5 class="title">Hiện đại</h5>
                        <p>Cập nhật những sản phẩm mới nhất</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-shipping d-flex h-100">
                    <div class="shipping-icon">
                        <img src="{{ asset('assets/imgs/Made-By-Artists.png') }}" alt="">
                    </div>
                    <div class="shipping-content" style="margin-left:20px;">
                        <h5 class="title">Hỗ trợ 24/7</h5>
                        <p>Đội ngũ hỗ trợ trực tuyến chuyên nghiệp</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- product-recommend --}}
<div class="new-product-area section-padding-2">
    <div class="container ">
        <div class="row  justify-content-center ">
            <div class="col-6 col-md-9 col-sm-11 w-100">
                <div class="section-title text-center  ">
                    <h2 class="title">Gợi Ý Cho Bạn</h2>
                    <p>Khám phá những sản phẩm được chọn lọc dành riêng cho bạn – nơi kết hợp giữa sáng tạo, năng lượng và niềm vui mỗi ngày. Hãy để chúng tôi giúp bạn tìm thấy điều bạn yêu thích!.</p>
                </div>
            </div>
        </div>

        {{-- san pham moi slide --}}
        <div class="swiper newProduct mt-5 ">
            <div class="swiper-wrapper">
                @foreach ($product as $key => $item)
                <div class="swiper-slide">
                    <div class="single-product">
                        <div class="product-image">
                            <a href="{{ route('chitietsanpham', ['name' => $item->slug]) }}">
                                <img
                                    src="{{ isset($item->images[0]) ? asset('assets/uploads/' . $item->images[0]->url) : asset('assets/uploads/no-image.png') }}"
                                    alt=""
                                >
                            </a>
                            <div class="action-links">
                                <ul>
                                    <li>
                                        <a class="product-detail"
                                           href="{{ route('chitietsanpham', ['name' => $item->slug]) }}"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="add-to-cart" href=""
                                           onclick="addToCart({{ $item->id }},event)"><i
                                                class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4 class="product-name">
                                {{ $item->name }}
                            </h4>
                            <div class="price-box">
                                    <span
                                        class="current-price">{{ number_format($item->price, 0, ',', '.') }}
                                                            đ</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>

{{-- San pham moi --}}
<div class="features-product-area section-padding-5">
    <div class="container" >
        <div class="row d-flex justify-content-center ">
            <div class="col-6 col-md-9 col-sm-11 w-100">
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm của chúng tôi</h2>
                    <p>Một sự pha trộn hoàn hảo của sự sáng tạo, năng lượng, giao tiếp, hạnh phúc và tình yêu. Hãy để chúng tôi sắp xếp một nụ cười cho bạn.</p>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="mt-4">
            <!-- List group -->
            <div class="list-group d-flex container flex-row justify-content-center" id="myList" role="tablist">
                <a class="list-group-item title list-group-item-action active p-sm-0 " style="border:none;"
                   data-bs-toggle="list" href="#banchay" role="tab">Sản phẩm có lẽ bạn sẽ thích </a>
                <a class="list-group-item title list-group-item-action p-sm-0 " style="border:none;"
                   data-bs-toggle="list" href="#noibat" role="tab">Nổi bật</a>
                <!-- <a class="list-group-item title list-group-item-action p-sm-0 " style="border:none;"
                    data-bs-toggle="list" href="#dangsale" role="tab">Đang sale</a> -->
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="banchay" role="tabpanel">
                    <div class="container ">

                        <div class="swiper newProduct">
                            <div class="swiper-wrapper">
                                @foreach ($product3 as $key => $item)
                                <div class="swiper-slide">
                                    <div class="single-product">
                                        <div class="product-image">
                                            <a href="{{ route('chitietsanpham', ['name' => $item->slug]) }}">
                                                <img src="{{ asset('assets/uploads/' . $item->images[0]->url) }}"
                                                     alt="">
                                            </a>
                                            <div class="action-links">
                                                <ul>
                                                    <li>
                                                        <a class="product-detail"
                                                           href="{{ route('chitietsanpham', ['name' => $item->slug]) }}"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="add-to-cart" href=""><i
                                                                class="fa fa-cart-plus"
                                                                aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="product-name">
                                                {{ $item->name }}
                                            </h4>
                                            <div class="price-box">
                                                        <span
                                                            class="current-price">{{ number_format($item->price, 0, ',', '.') }}
                                                            đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="noibat" role="tabpanel">
                    <div class="swiper newProduct">
                        <div class="swiper-wrapper">
                            @foreach ($product as $key => $item)
                            <div class="swiper-slide">
                                <div class="single-product">
                                    <div class="product-image">
                                        <a href="{{ route('chitietsanpham', ['name' => $item->slug]) }}">
                                            <img src="{{ asset('assets/uploads/' . $item->images[0]->url) }}"
                                                 alt="">
                                        </a>
                                        <div class="action-links">
                                            <ul>
                                                <li>
                                                    <a class="product-detail" href=""><i class="fa fa-eye"
                                                                                         aria-hidden="false"></i></a>
                                                </li>
                                                <li>
                                                    <a class="add-to-cart" href=""><i
                                                            class="fa fa-cart-plus" aria-hidden="false"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4 class="product-name">
                                            {{ $item->name }}
                                        </h4>
                                        <div class="price-box">
                                                    <span
                                                        class="current-price">{{ number_format($item->price, 0, ',', '.') }}
                                                        đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="dangsale" role="tabpanel">
                    <div class="swiper newProduct">
                        <div class="swiper-wrapper">
                            @foreach ($product as $key => $item)
                            <div class="swiper-slide">
                                <div class="single-product">
                                    <div class="product-image">
                                        <a href="{{ route('chitietsanpham', ['name' => $item->slug]) }}">
                                            <img src="{{ asset('assets/uploads/' . $item->images[0]->url) }}"
                                                 alt="">
                                        </a>
                                        <div class="action-links">
                                            <ul>
                                                <li>
                                                    <a class="product-detail"
                                                       href="{{ route('chitietsanpham', ['name' => $item->slug]) }}"><i
                                                            class="fa fa-eye" aria-hidden="false"></i></a>
                                                </li>
                                                <li>
                                                    <a class="add-to-cart" href=""><i
                                                            class="fa fa-cart-plus" aria-hidden="false"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4 class="product-name">
                                            {{ $item->name }}
                                        </h4>
                                        <div class="price-box">
                                                    <span
                                                        class="current-price">{{ number_format($item->price, 0, ',', '.') }}
                                                        đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- baiviet --}}
<div class="blog-area blog-bg section-padding-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11 w-100">
                <div class="section-title text-center">
                    <h2 class="title">Bài Viết Của Chúng Tôi</h2>
                    <p>Một sự pha trộn hoàn hảo của sự sáng tạo, năng lượng, giao tiếp, hạnh phúc và tình yêu. Hãy để chúng tôi sắp xếp một nụ cười cho bạn.</p>
                </div>
            </div>
        </div>
        <div class="blog-wrapper mt-30">
            <div class="swiper-container blog-active swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" aria-live="polite">
                    @foreach ($post as $item)
                    <div class="swiper-slide">

                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#">
                                    <img style="max-width: 100% !important;" src="{{ asset('assets/uploads/' . $item->image) }}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h4 class="title"><a
                                        href="#">{{ $item->title }}</a>
                                </h4>
                                <div class="articles-date">
                                    <p><span>{{ $item->created_at }}</span></p>
                                </div>
                                <div class="four-line mb-4">
                                    {!! $item->description !!}
                                </div>

                                <div class="blog-footer">
                                    <a class="more"
                                       href="#">Tìm
                                        hiểu thêm</a>
                                    <!-- <p class="comment-count"><i class="icon-message-circle"></i> 0</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Add Arrows -->
                    @if (count($post) > 4)
                    <div class="swiper-next" tabindex="0" role="button" aria-label="Next slide"
                         aria-controls="swiper-wrapper-5eab3a3b40429f0d"><i class="fa fa-angle-right"></i></div>
                    <div class="swiper-prev" tabindex="0" role="button" aria-label="Previous slide"
                         aria-controls="swiper-wrapper-5eab3a3b40429f0d"><i class="fa fa-angle-left"></i></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

