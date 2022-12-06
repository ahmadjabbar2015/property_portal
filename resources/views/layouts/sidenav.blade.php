{{-- <x-layouts.base> --}}



<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
                        alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Crossdevlogix</h2>
                    <a href="/login" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                        <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Sign Out
                    </a>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <!-- Tenants -->

            <li class="nav-item" >
                <span class="nav-link collapse d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-tenants" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon "><i class="fa-solid 	fas fa-poll"></i></span>
                        <span class="sidebar-text">Tenants</span>
                    </span>
                    <span class="link-arrow "><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse" role="list" id="submenu-tenants" aria-expanded="">
                    <ul class="flex-column nav ">
                        <li class="nav-item">
                            <a href="/tenants" class="nav-link">
                                <span class="sidebar-text">Add Tenants</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tenants/index" class="nav-link">
                                <span class="sidebar-text ">Show Tenants</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



            <!-- landlords -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-landlord" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-landmark"></i></span>
                        <span class="sidebar-text">LandLoard</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-landlord" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item ">
                            <a href="/landlord" class="nav-link">
                                <span class="sidebar-text">Add Landloard</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/landlord/index" class="nav-link">
                                <span class="sidebar-text">Show Landloard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Property -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-property" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa fa-list"></i></span>
                        <span class="sidebar-text">Property</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-property" aria-expanded="false">
                    <ul class="flex-column nav">
                       
                        <li class="nav-item ">
                            <a href="/property" class="nav-link">
                                <span class="sidebar-text">Add Property</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/property/index" class="nav-link">
                                <span class="sidebar-text">Show Property</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- property units -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-propertyunits" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-house"></i></span>
                        <span class="sidebar-text">PropertyUnit</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse" role="list" id="submenu-propertyunits"
                    aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/propertyunits" class="nav-link">
                                <span class="sidebar-text">Add PropertyUnit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/propertyunits/index" class="nav-link">
                                <span class="sidebar-text">Show PropertyUnit</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- leases -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-leases" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon">
 
 
                            <i class="fa-sharp fa-solid fa-rectangle-list"></i></span>
                        <span class="sidebar-text">Leases</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-leases" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/lease" class="nav-link">
                                <span class="sidebar-text">Add Leases</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/lease/index" class="nav-link">
                                <span class="sidebar-text">Show Leases</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- inventory -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-inventory" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid 	fas fa-poll-h"></i></span>
                        <span class="sidebar-text">Inventory</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-inventory" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/inventory" class="nav-link">
                                <span class="sidebar-text">Add Inventory</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/inventory/index" class="nav-link">
                                <span class="sidebar-text">Show Inventory</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- events -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-events" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-calendar-days"></i></span>
                        <span class="sidebar-text">Events</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-events" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/calendar" class="nav-link">
                                <span class="sidebar-text">Add Events</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <!-- Tickets -->
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-tickets" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa fa-ticket"></i></span>
                        <span class="sidebar-text">Tickets</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse " role="list" id="submenu-tickets" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item">
                            <a href="/ticket/index" class="nav-link">
                                <span class="sidebar-text"> Add Tickets</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            {{-- //agent --}}
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-agent" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class='fas fa-id-badge'></i></span>
                        <span class="sidebar-text">Agent</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-agent" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/agent" class="nav-link">
                                <span class="sidebar-text">Add Agent </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/agent/index" class="nav-link">
                                <span class="sidebar-text">Show Agent</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

               {{-- //lead --}}
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-lead" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-users"></i></span>
                        <span class="sidebar-text">Lead</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-lead" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/lead" class="nav-link">
                                <span class="sidebar-text"> Add Lead  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/lead/index" class="nav-link">
                                <span class="sidebar-text">  Lead Show </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/lead/attempt_index" class="nav-link">
                                <span class="sidebar-text">Attempt</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>

            {{-- customer --}}
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-customer" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class='fas fa-address-card'></i></span>
                        <span class="sidebar-text">Customer</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-customer" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item ">
                            <a href="/customers/index" class="nav-link">
                                <span class="sidebar-text">Show Customer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            


         
        



            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-setting" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-gears"></i></span>
                        <span class="sidebar-text">Settings</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-setting" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/propertytype" class="nav-link">
                                <span class="sidebar-text">Add Property Type</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/source/index" class="nav-link">
                                <span class="sidebar-text"> Source </span>
                            </a>
                        </li>
                        
                       
                        
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-reports" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fas fa-file"></i></span>
                        <span class="sidebar-text">Reports</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse  " role="list" id="submenu-reports" aria-expanded="false">
                    <ul class="flex-column nav">

                        <li class="nav-item ">
                            <a href="/landlordreports" class="nav-link">
                                <span class="sidebar-text">Landlord Reports</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <span class="sidebar-text"> </span>
                            </a>
                        </li>
                        
                       
                        
                    </ul>
                </div>
            </li>



        </ul>
    </div>

</nav>


{{-- </x-layouts.base> --}}
