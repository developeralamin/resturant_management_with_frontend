
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backend/assets/img/sidebar-1.jpg') }}">
  
      <div class="logo"><a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">
          Mamam's Kitchen
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::is('admin/dashboard*') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/slider*') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('slider.index') }}">
              <i class="material-icons">person</i>
              <p>Slider</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/category*') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('category.index')}}">
              <i class="material-icons">content_paste</i>
              <p>Category</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/items*') ? 'active':'' }}">
            <a class="nav-link" href="{{  route('items.index') }}">
              <i class="material-icons">library_books</i>
              <p>Items</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/reservation*') ? 'active':'' }} ">
            <a class="nav-link" href="{{ route('reservation.index') }} ">
              <i class="material-icons">bubble_chart</i>
              <p>Resarvation</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/contact*') ? 'active':'' }} ">
            <a class="nav-link" href="{{ route('contact.index') }}">
              <i class="material-icons">location_ons</i>
              <p>Contact Message</p>
            </a>
          </li>
                                                                 
        </ul>
      </div>
    </div>


 