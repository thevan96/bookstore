<ul class="nav">
    <li class="active ">
        <a href="">
            <i class="nc-icon nc-bank"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li>
        <a href="{{ route('genres.index')}}">
            <i class="nc-icon nc-tile-56"></i>
            <p>Danh mục sách</p>
        </a>
    </li>
    <li>
        <a href="{{ route('publishers.index')}}">
            <i class="nc-icon nc-book-bookmark"></i>
            <p>Nhà Xuất bản</p>
        </a>
    </li>
    <li>
        <a href="{{ route('books.index') }}">
            <i class="nc-icon nc-book-bookmark"></i>
            <p>Sách</p>
        </a>
    </li>
    <li>
        <a href="">
            <i class="nc-icon nc-badge"></i>
            <p>Đơn hàng</p>
        </a>
    </li>
    <li>
        <a href="">
            <i class="nc-icon nc-badge"></i>
            <p>Thông tin cá nhân</p>
        </a>
    </li>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nc-icon nc-minimal-right"></i>
            <p>Đăng xuất</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
