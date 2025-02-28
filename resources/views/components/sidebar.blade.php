<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen shrink-0 z-[55]  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300" >
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-4" >
        <a href="{{ route('dashboard') }}" class="text-nowrap">
            <img src="{{ asset('assets/images/logo-nursa-jaya-comp.svg') }}" class="h-8" alt="Logo Nursa Jaya Comp"/>
        </a>
    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
        <ul  id="sidebarnav" class="text-gray-600 text-sm">
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('dashboard') }}"
                    >
                <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('products.index') }}"
                    >
                <i class="ti ti-package ps-2 text-2xl"></i> <span>Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('categories.index') }}"
                    >
                <i class="ti ti-category ps-2 text-2xl"></i> <span>Category</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('brands.index') }}"
                    >
                <i class="ti ti-brand-itch ps-2 text-2xl"></i> <span>Brand</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('messages.index') }}"
                    >
                <i class="ti ti-message ps-2 text-2xl"></i> <span>Message</span>
                </a>
            </li>
        </ul>
        </nav>
    </div>
    <!-- </aside> -->
</aside>
