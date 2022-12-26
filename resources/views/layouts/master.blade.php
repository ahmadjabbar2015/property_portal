<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link type="text/css" href="/vendor/apexcharts/apexcharts.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@1.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css">

    <!-- Fontawesome -->
    <link type="text/css" href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link type="text/css" href="/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="/vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="/css/volt.css" rel="stylesheet">

    @livewireStyles

    @livewireScripts

   

    <!-- Moment JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />


 


</head>
<body>

      @include('layouts.nav')
    {{-- SideNav --}}
      @include('layouts.sidenav')

      {{-- top bar --}}

      <main>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
                >
                <div class="media d-flex align-items-center">
                    <img class="avatar rounded-circle" alt="" src="{{asset('assets/img/devlogix-picture-1.png')}}">
                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                        <span
                            class="mb-0 font-small fw-bold text-gray-900">{{ auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'CrossDevlogix' }}
                          </span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                <a class="dropdown-item d-flex align-items-center" href="/profile">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd"></path>
                    </svg>
                    My Profile
                </a>
                <div role="separator" class="dropdown-divider my-1">
        
                </div>
                <a class="dropdown-item d-flex align-items-center">
                    <livewire:logout />
                </a>
            </div>
        </div>
        
        </main>
      {{-- end top bar --}}
      

    <main class="content">
       @yield('main')
     </main>

     
     <!-- Core -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
 
     <!-- Vendor JS -->
     <script src="/assets/js/on-screen.umd.min.js"></script>
 
     <!-- Slider -->
     <script src="/assets/js/nouislider.min.js"></script>
 
     <!-- Smooth scroll -->
     <script src="/assets/js/smooth-scroll.polyfills.min.js"></script>
 
     <!-- Apex Charts -->
     <script src="/vendor/apexcharts/apexcharts.min.js"></script>
 
     <!-- Charts -->
     {{-- <script src="/assets/js/chartist.min.js"></script>
     <script src="/assets/js/chartist-plugin-tooltip.min.js"></script> --}}
 
     <!-- Datepicker -->
     <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   
     <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
     <script src="/assets/js/sweetalert2.all.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="/assets/js/landlordreports.js"></script>
     @yield('page-script')
     <!-- Volt JS -->
     <script src="/assets/js/volt.js"></script>

   {{-- Footer --}}
   {{-- <main class="content">
   @include('layouts.footer')
    </main> --}}
   {{--End Footer --}}

</body>
</html>