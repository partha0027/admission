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
                <span class="nav-text">Enquiry</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('view-enquiry') }}">View Enquiry</a></li>

            </ul>
        </li>


            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Admission</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('view-add') }}">All Admissions</a></li>

                </ul>
            </li>
        
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Booking</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('booking-view') }}">View Booking</a></li>

                </ul>
            </li>

            
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-building"></i>
                <span class="nav-text">Old Admission</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('view-add-old') }}">All Admissions</a></li>

            </ul>
        </li>

        </ul>
    </div>
</div>
