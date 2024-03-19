<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <x-notify::notify />
   
    <div class="app-brand demo">

    <a href="https://new.bringyourbuddy.in" target="_blank">

    <img src="{{ asset('assets/img/logo/byb_logo.png') }}" alt="Logo" width="150">


    </a>

            
  

        <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item ">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->

        <li class="menu-item ">
            <a href="{{url('/programs')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Analytics">Programs & University</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{url('/profile_application')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Analytics">My Applications</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{url('/profile_payment')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Analytics">Payments</div>
            </a>
        </li>
        



</aside>
<!--/ modal -->

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
      Buddy Program
      </div>


    </div>
  </div>
</div>

