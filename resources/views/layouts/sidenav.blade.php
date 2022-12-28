
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4 d-none">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="{{asset('/assets/img/team/profile-picture-3.jpg')}}" class="card-img-top rounded-circle border-white"
                        alt="Bonnie Green">
                </div>
                <div class="d-block">
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
            {{--Start Dashboard --}}
<li class="nav-item  @yield('dashboard')">
    <a href="/dashboard" class="nav-link {{request()->routeIs('dashboard')  ? 'active' : ''}}">
         <span class="sidebar-icon"><i class="fa-solid fas fa-poll"></i></span>
          <span class="sidebar-text">Dashboard</span>
    </a>
</li>
            <!-- Tenants -->
            <?php
             if (!auth()->user()->hasPermission('Tenants','view')){

        }else {
                ?>

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
                <div class="multi-level collapse {{Request::is('tenants*') ? 'show' : ''}}" role="list" id="submenu-tenants" aria-expanded="">
                    <ul class="flex-column nav ">
                        <?php
                        if (!auth()->user()->hasPermission('Tenants','create')){

                   }else {?>
                        <li class="nav-item @yield('add_tenant')">
                            <a href="/tenants" class="nav-link {{request()->routeIs('tenants.create') ? 'active' : ''}}">
                                <span class="sidebar-text">Add Tenants</span>
                            </a>
                        </li><?php }
                        ?>
                        <li class="nav-item @yield('view_tenant')">
                            <a href="/tenants/index" class="nav-link {{request()->routeIs('tenants.index') ? 'active' : ''}}">
                                <span class="sidebar-text ">Show Tenants</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php
            }
            ?>




            <!-- landlords -->
            <?php
            if (!auth()->user()->hasPermission('Landlords','view')){

       }else {
               ?>
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-landlord" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-landmark"></i></span>
                        <span class="sidebar-text">LandLord</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse {{Request::is('landlord*') ? 'show' : ''}}" role="list" id="submenu-landlord" aria-expanded="">
                    <ul class="flex-column nav">
                        <?php
                        if (!auth()->user()->hasPermission('Landlords','create')){

                   }else {?>
                        <li class="nav-item @yield('add_land')">
                            <a href="/landlord" class="nav-link {{request()->routeIs('landlord.create') ? 'active' : ''}}">
                                <span class="sidebar-text">Add Landlord</span>
                            </a>
                        </li>
                        <?php }
                        ?>
                        <li class="nav-item  @yield('view_land')">
                            <a href="/landlord/index" class="nav-link {{request()->routeIs('landlord.index') ? 'active' : ''}}">
                                <span class="sidebar-text">Show Landlord</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php }
            ?>
            <!-- Property -->
            <?php
            if (!auth()->user()->hasPermission('Property','view')){

       }else {
               ?>
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
                <div class="multi-level collapse {{Request::is('Property*') ? 'show' : ''}}" role="list" id="submenu-property" aria-expanded="">
                    <ul class="flex-column nav">
                        <?php
                        if (!auth()->user()->hasPermission('Property','create')){

                        }else {
                                ?>
                        <li class="nav-item @yield('add_pro')">
                            <a href="/property" class="nav-link {{request()->routeIs('property.create')?'active':''}} ">
                                <span class="sidebar-text">Add Property</span>
                            </a>
                        </li>
                        <?php }
                        ?>
                        <li class="nav-item @yield('view_pro')">
                            <a href="/property/index" class="nav-link {{request()->routeIs('property.index')?'active':''}}">
                                <span class="sidebar-text">Show Property</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php }
            ?>
            <!-- property units -->
            <?php
            if (!auth()->user()->hasPermission('Property Units','view')){

       }else {
               ?>
            <li class="nav-item">
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-propertyunits" aria-expanded="true">
                    <span>
                        <span class="sidebar-icon"><i class="fa-solid fa-house"></i></span>
                        <span class="sidebar-text">Property Units</span>
                    </span>
                    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                </span>
                <div class="multi-level collapse {{Request::is('propertyunits*') ? 'show' : ''}}" role="list" id="submenu-propertyunits"
                    aria-expanded="">
                    <ul class="flex-column nav">
                        <?php
                        if (!auth()->user()->hasPermission('Property Units','create')){

                        }else {
                            ?>
                        <li class="nav-item @yield('add_proUnit')">
                            <a href="/propertyunits" class="nav-link {{request()->routeIs('propertyunits.create') ? 'active' : ''}}">
                                <span class="sidebar-text">Add PropertyUnit</span>
                            </a>
                        </li>
                        <?php } ?>

                        <li class="nav-item @yield('view_proUnit')">
                            <a href="/propertyunits/index" class="nav-link {{request()->routeIs('propertyunits.index') ? 'active' : ''}}">
                                <span class="sidebar-text">Show PropertyUnit</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php }
            ?>
            <!-- leases -->
            <?php
            if (!auth()->user()->hasPermission('Leases','view')){

       }else {
               ?>
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
                        <?php
                        if (!auth()->user()->hasPermission('Leases','create')){

                   }else {
                           ?>
                        <li class="nav-item @yield('add_rent')">
                            <a href="/lease" class="nav-link {{request()->routeIs('lease.create')? 'active' : ''}}">
                                <span class="sidebar-text">Add Leases</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="nav-item @yield('view_rent')">
                            <a href="/lease/index" class="nav-link {{request()->routeIs('lease.index')? 'active' : ''}}">
                                <span class="sidebar-text">Rent Leases</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('add_sale')">
                            <a href="/lease/sale/index" class="nav-link {{request()->routeIs('lease.saleindex')? 'active' : ''}}">
                                <span class="sidebar-text">Booking </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php
        } ?>
            <!-- inventory -->
            <?php
            if (!auth()->user()->hasPermission('Inventory','view')){

       }else {
               ?>
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
                        <?php
                        if (!auth()->user()->hasPermission('Inventory','create')){

                   }else {
                           ?>
                        <li class="nav-item @yield('add_inv')">
                            <a href="/inventory" class="nav-link {{request()->routeIs('inventory.create') ? 'active' : ''}}">
                                <span class="sidebar-text">Add Inventory</span>
                            </a>
                        </li>
                        <?php }?>
                        <li class="nav-item @yield('view_inv')">
                            <a href="/inventory/index" class="nav-link {{request()->routeIs('inventory.index') ? 'active' : ''}}">
                                <span class="sidebar-text">Show Inventory</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php }
            ?>
            <!-- events -->
            <?php
            if (!auth()->user()->hasPermission('Events','view')){

       }else {
               ?>
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

                        <li class="nav-item @yield('view_cal') ">
                            <a href="/calendar" class="nav-link {{request()->routeIs('calendar.index')? 'active' : ''}}">
                                <span class="sidebar-text">Events</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <?php }?>
            <!-- Tickets -->
            <?php
            if (!auth()->user()->hasPermission('Tickets','view')){

       }else {
               ?>
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

                        <li class="nav-item @yield('view_tik')">
                            <a href="/ticket/index" class="nav-link {{request()->routeIs('ticket.index') ? 'active' : ''}}">
                                <span class="sidebar-text"> Tickets</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <?php }
            ?>
            {{-- //agent --}}
            <?php
            if (!auth()->user()->hasPermission('Agent','view')){

       }else {
               ?>
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
                        <?php
                        if (!auth()->user()->hasPermission('Agent','create')){

                   }else {
                           ?>
                        <li class="nav-item @yield('add_agent')">
                            <a href="/agent" class="nav-link {{request()->routeIs('agent.create')}}">
                                <span class="sidebar-text">Add Agent </span>
                            </a>
                        </li>
                        <?php }?>
                        <li class="nav-item @yield('view_agent')">
                            <a href="/agent/index" class="nav-link {{request()->routeIs('agent.index')}}">
                                <span class="sidebar-text">Show Agent</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php }
            ?>

               {{-- //lead --}}
               <?php
            if (!auth()->user()->hasPermission('Lead','view')){

       }else {
               ?>
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
                        <?php
                        if (!auth()->user()->hasPermission('Lead','create')){

                   }else {
                           ?>
                        <li class="nav-item @yield('add_lead')">
                            <a href="/lead" class="nav-link {{request()->routeIs('lead.create') ? 'active' : ''}}">
                                <span class="sidebar-text"> Add Lead  </span>
                            </a>
                        </li>


                        <li class="nav-item @yield('view_attempt')">
                            <a href="/lead/attempt_index" class="nav-link {{request()->routeIs('lead.attempt_index') ? 'active' : ''}}">
                                <span class="sidebar-text">Attempt</span>
                            </a>
                        </li>
                        <?php }?>
                        <li class="nav-item @yield('view_lead')">
                            <a href="/lead/index" class="nav-link {{request()->routeIs('lead.index') ? 'active' : ''}}">
                                <span class="sidebar-text">  Lead Show </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
<?php }
?>
            {{-- customer --}}
            <?php
                        if (!auth()->user()->hasPermission('Customer','view')){

                   }else {
                           ?>
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
                        <li class="nav-item @yield('view_customer')">
                            <a href="/customers/index" class="nav-link {{request()->routeIs('customers.index') ? 'active' : ''}}">
                                <span class="sidebar-text">Show Customer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php }?>




{{-- reports --}}
<?php
if (!auth()->user()->hasPermission('Reports','view')){

}else {
   ?>
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

                        <li class="nav-item @yield('view_proReport') ">
                            <a href="/porperty_reports/index" class="nav-link">
                                <span class="sidebar-text">Property Reports</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('view_leadReport') ">
                            <a href="/lead_reports/index" class="nav-link">
                                <span class="sidebar-text"> Lead Reports</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('view_rentReport') ">
                            <a href="{{route('rent.lease.reports')}}" class="nav-link">
                                <span class="sidebar-text"> Rent Reports</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('view_bookingReport') ">
                            <a href="{{route('sale.lease.reports')}}" class="nav-link">
                                <span class="sidebar-text">Booking Reports</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </li>


<?php }?>
{{-- setting --}}
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
            <?php
            if (!auth()->user()->hasPermission('Add property Type','view')){

       }else {
               ?>
            <li class="nav-item @yield('protype')">
                <a href="/propertytype" class="nav-link">
                    <span class="sidebar-text">Add Property Type</span>
                </a>
            </li>
            <?php }  ?>
            <?php
            if (!auth()->user()->hasPermission('Source','view')){

       }else {
               ?>
            <li class="nav-item @yield('scource')">
                <a href="/source/index" class="nav-link {{request()->routeIs('source.index') ? 'active' : ''}}">
                    <span class="sidebar-text"> Source </span>
                </a>
            </li>
            <?php }?>
            <?php
            if (!auth()->user()->hasPermission('Role','view')){

       }else {
               ?>
            <li class="nav-item @yield('role')">
                <a href="/role/index" class="nav-link {{request()->routeIs('role.index') ? 'active' : ''}}">
                    <span class="sidebar-text"> Role </span>
                </a>
            </li>
            <?php }?>
            <?php
            if (!auth()->user()->hasPermission('Users','view')){

       }else {
               ?>
            <li class="nav-item @yield('view_user')">
                <a href="/users/index" class="nav-link {{request()->routeIs('users.index')?'active' :''}}">
                    <span class="sidebar-text"> Users </span>
                </a>
            </li>
            <?php }?>



        </ul>
    </div>
</li>
        </ul>
    </div>

</nav>
