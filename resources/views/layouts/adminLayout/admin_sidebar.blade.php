<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Trang chủ</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>>
      <a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i><span>Trang chủ</span></a>
    </li>

    <li class="submenu">
      <a href="#"><i class="icon icon-th-list"></i><span>Danh mục</span><span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/categor/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-category/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-category')}}">Thêm danh mục</a></li>
        <li <?php if (preg_match("/view-categories/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-categories')}}">Xem danh mục</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Sản phẩm</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/product/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-product/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-product')}}">Thêm sản phẩm</a></li>
        <li <?php if (preg_match("/view-products/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-products')}}">Xem sản phẩm</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Mã giảm giá</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/coupon/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-coupon/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-coupon')}}">Thêm mã giảm giá</a></li>
        <li <?php if (preg_match("/view-coupons/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-coupons')}}">Xem mã giảm giá</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Đơn đặt hàng</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/orders/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-orders/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-orders')}}">Xem đơn đặt hàng</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Ảnh bìa</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/banner/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-banner/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-banner')}}">Thêm ảnh bìa</a></li>
        <li <?php if (preg_match("/view-banners/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-banners')}}">Xem ảnh bìa</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Người dùng</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/users/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-users/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-users')}}">Xem người dùng</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Trang CMS</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/cms-page/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-cms-page/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-cms-page')}}">Thêm trang CMS</a></li>
        <li <?php if (preg_match("/view-cms-pages/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-cms-pages')}}">Xem trang CMS</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Phản hồi</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/enquiries/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-enquiries/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-enquiries')}}">Xem phản hồi</a></li>
      </ul>
    </li>

  </ul>
</div>
<!--sidebar-menu-->