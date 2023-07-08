<div>
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        -->
      <div class="logo"><a href="{{url('/dashboard/dynamic-edit')}}" class="simple-text logo-normal">
          ADMİN PANELİ
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit') ? 'active':'' }} ">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit')}}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/categories') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/categories')}}">
              <i class="fa-solid fa-list"></i>
              <p>categories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/add-categories') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/add-categories')}}">
              <i class="fa-solid fa-plus"></i>
              <p>Add Categories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/foods') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/foods')}}">
              <i class="fas fa-hamburger"></i>
              <p>Foods</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/add-foods') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/add-foods')}}">
              <i class="fa-solid fa-plus"></i>
              <p>Add Foods</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/chefs') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/chefs')}}">
              <i class="fa-solid fa-vest-patches"></i>
              <p>Chefs</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/add-chefs') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/add-chefs')}}">
              <i class="fa-solid fa-plus"></i>
              <p>Add Chefs</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/banner') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/banner')}}">
              <i class="fa-solid fa-image"></i>
              <p>Banner</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/footer') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/footer')}}">
              <i class="fa-solid fa-shoe-prints"></i>
              <p>Footer</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/header') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/header')}}">
              <i class="fa-solid fa-heading"></i>
              <p>Header</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/counter') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/counter')}}">
              <i class="fa-solid fa-lines-leaning"></i>
              <p>Counter</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/add-counter') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/add-counter')}}">
              <i class="fa-solid fa-plus"></i>
              <p>Add Counter</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/company_vmg') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/company_vmg')}}">
              <i class="fa-brands fa-invision"></i>
              <p>Company_vmg</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/add-company_vmg') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/add-company_vmg')}}">
              <i class="fa-solid fa-plus"></i>
              <p>Add Company_vmg</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/dynamic-edit/about_choose') ? 'active':'' }}">
            <a class="nav-link" href="{{url('dashboard/dynamic-edit/about_choose')}}">
              <i class="fa-solid fa-info"></i>
              <p>About Choose</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
</div>
