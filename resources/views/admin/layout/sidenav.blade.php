<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
              
            </li>
         
           
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Addmission</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('view-add') }}">All Addmissions</a></li>

                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Enquiry</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('view-enquiry') }}">View Enquiry</a></li>

                </ul>
            </li>

        </ul>
    </div>
</div>
