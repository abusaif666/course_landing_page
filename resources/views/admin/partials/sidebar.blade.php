<div class="sidebar">

    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ $websiteSetting && $websiteSetting->logo
                ? asset('storage/setting/' . $websiteSetting->logo)
                : asset('assets/images/logo.png') }}"
                alt="Logo">
        </a>
    </div>

    <div class="menu">
        <ul>

            {{-- Dashboard --}}
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><span><i data-lucide="home"></i> Dashboard </span></a>
            </li>


            {{-- Course Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('course.create') || request()->routeIs('course.index') || request()->routeIs('course.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="book-open"></i> Course </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('course.create') }}"> Add Course </a></li>
                    <li> <a href="{{ route('course.index') }}"> Course List </a></li>
                </ul>
            </li>


            {{-- Student Result Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('student-result.create') || request()->routeIs('student-result.index') || request()->routeIs('student-result.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="award"></i> Student Result </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('student-result.create') }}"> Add Result </a></li>
                    <li> <a href="{{ route('student-result.index') }}"> Result List </a></li>
                </ul>
            </li>


            {{-- Student Testimonial Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('student-testimonial.create') || request()->routeIs('student-testimonial.index') || request()->routeIs('student-testimonial.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="video"></i> Testimonials </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('student-testimonial.create') }}"> Add Testimonial </a></li>
                    <li> <a href="{{ route('student-testimonial.index') }}"> Testimonial List </a></li>
                </ul>
            </li>



            {{-- Course Benefit Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('benefit.create') || request()->routeIs('benefit.index') || request()->routeIs('benefit.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="check-circle"></i> Course Benefits </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('benefit.create') }}"> Add Benefit </a></li>
                    <li> <a href="{{ route('benefit.index') }}"> Benefit List </a></li>
                </ul>
            </li>


            {{-- Course Outline Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('outline.create') || request()->routeIs('outline.index') || request()->routeIs('outline.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="list-ordered"></i> Course Outlines </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('outline.create') }}"> Add Outline </a></li>
                    <li> <a href="{{ route('outline.index') }}"> Outline List </a></li>
                </ul>
            </li>


            {{-- Course FAQ Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('course-faq.create') || request()->routeIs('course-faq.index') || request()->routeIs('course-faq.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="help-circle"></i> Course FAQ </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('course-faq.create') }}"> Add FAQ </a></li>
                    <li> <a href="{{ route('course-faq.index') }}"> FAQ List </a></li>
                </ul>
            </li>





            {{-- Order Management Menu --}}
            <li class="{{ request()->routeIs('order.index') ? 'active' : '' }}">
                <a href="{{ route('order.index') }}">
                    <span> <i data-lucide="shopping-cart"></i> Orders </span>
                </a>
            </li>




            {{-- User Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('user.create') || request()->routeIs('user.index') ? 'active' : '' }}">
                <a href="javascript:void(0)"> <span> <i data-lucide="user"></i> User </span> <i
                        class="fa-solid fa-angle-right arrow"></i> </a>
                <ul class="submenu">
                    <li> <a href="{{ route('user.create') }}"> Add User </a></li>
                    <li> <a href="{{ route('user.index') }}"> User List </a></li>
                </ul>
            </li>


            {{-- SMTP Setting Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('smtp.index') || request()->routeIs('smtp.create') || request()->routeIs('smtp.test') ? 'active' : '' }}">
                <a href="javascript:void(0)"> <span> <i data-lucide="mail"></i> SMTP </span> <i
                        class="fa-solid fa-angle-right arrow"></i> </a>
                <ul class="submenu">
                    <li> <a href="{{ route('smtp.create') }}"> Add SMTP </a></li>
                    <li> <a href="{{ route('smtp.index') }}"> SMTP List </a></li>
                    <li> <a href="{{ route('smtp.test') }}"> SMTP Test </a></li>
                </ul>
            </li>



            {{-- Payment API Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('payment-api.create') || request()->routeIs('payment-api.index') || request()->routeIs('payment-api.edit') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <span> <i data-lucide="credit-card"></i> Payment API </span>
                    <i class="fa-solid fa-angle-right arrow"></i>
                </a>
                <ul class="submenu">
                    <li> <a href="{{ route('payment-api.create') }}"> Add Payment API </a></li>
                    <li> <a href="{{ route('payment-api.index') }}"> Payment API List </a></li>
                </ul>
            </li>


            {{-- Setting Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('general.setting') || request()->routeIs('website.setting') ? 'active' : '' }}">
                <a href="javascript:void(0)"> <span> <i data-lucide="settings"></i> Setting </span> <i
                        class="fa-solid fa-angle-right arrow"></i> </a>
                <ul class="submenu">
                    <li> <a href="{{ route('general.setting') }}"> General Settings </a></li>
                    <li> <a href="{{ route('website.setting') }}"> Website Settings </a></li>
                </ul>
            </li>

        </ul>
    </div>

</div>

<div class="sidebar_overlay"></div>

<button class="menu-toggle">
    Toggle Menu
</button>
