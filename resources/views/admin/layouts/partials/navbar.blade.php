<aside class="sidebar-wrapper h-100" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('logo.png') }}" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Manager</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Blog Content</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.category.view') }}"><i class="material-icons-outlined">arrow_right</i>Categories</a>
                    </li>
                    <li><a href="{{ route('admin.tag.view') }}"><i class="material-icons-outlined">arrow_right</i>Tags</a>
                    </li>
                    <li><a href="{{ route('admin.blog.view') }}"><i class="material-icons-outlined">arrow_right</i>Blog Content</a>
                    </li>
                </ul>
            </li>


        </ul>
        <!--end navigation-->
    </div>
</aside>
