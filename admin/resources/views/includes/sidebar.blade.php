<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

    
                  <img src="{{ asset('assets/img/logo/byb_logo.png') }}" alt="Logo" width="150">
                
            
  

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

        


        <div class="sidebar">
            <ul>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Master Data</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_course_type') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Course Type</div>
                            </a>
                        </li>
                       
                    </ul>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_course_category') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Course Category</div>
                            </a>
                        </li>
                       
                    </ul>
                </li>
            </ul>
        </div>














        <div class="sidebar">
            <ul>
            <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-bs-target="#universityDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">University</div>
                    </a>

                    <ul id="universityDropdown" class="menu-sub collapse">     
                        <li class="menu-item">     
                            <a href="{{ url('add_universities') }}" class="menu-link" target="_self">     
                                <div data-i18n="Create Route">Create</div>      
                            </a>     
                        </li>     
                        <li class="menu-item">     
                            <a href="{{ url('view_universities') }}" class="menu-link">     
                                <div data-i18n="Without navbar">View</div>     
                            </a>     
                        </li>
                    </ul>
                </li>
            </ul>
        </div>




        <div class="sidebar">
            <ul>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Courses</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('add_courses') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Create Courses</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('view_courses') }}" class="menu-link">
                                <div data-i18n="Without navbar">View Courses</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="sidebar">
            <ul>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Partners</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('add_agents') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Add Partners</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('view_agents') }}" class="menu-link">
                                <div data-i18n="Without navbar">View Partners</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('view_subagents') }}" class="menu-link">
                                <div data-i18n="Without navbar">View Sub-Partners</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Students</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('add_student') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Add Students</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('view_student') }}" class="menu-link">
                                <div data-i18n="Without navbar">View Students</div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Applications</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('view_application') }}" class="menu-link">
                                <div data-i18n="Without navbar">View Applications</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Commissions</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('view_commissions') }}" class="menu-link">
                                <div data-i18n="Without navbar">View Commissions</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>



        <div class="sidebar">
            <ul>
                <li class="menu-item">
                    <a href="{{ url('view_enquiry') }}" class="menu-link" >
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Inquiry</div>
                    </a>

                  
                </li>
            </ul>
        </div>


        <div class="sidebar">
            <ul>
                <li class="menu-item">
                    <a href="{{ url('view_contact') }}" class="menu-link ">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Contact Us</div>
                    </a>

                   
                </li>
            </ul>
        </div>







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

