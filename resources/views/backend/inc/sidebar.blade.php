<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Slider</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('panel.slider.index')}}">Slider</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('panel.slider.create')}}">Slider Ekle</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Kategoriler</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('panel.category.index')}}">Kategori</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('panel.category.create')}}">Kategori Ekle</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
            <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Ürünler</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('panel.product.index')}}">Ürün</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('panel.product.create')}}">Ürün Ekle</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('panel.about.index')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Hakkımızda</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('panel.contact.index')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Gelen Kutusu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('panel.setting.index')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Ayarlar</span>
        </a>
      </li>
    </ul>
  </nav>
