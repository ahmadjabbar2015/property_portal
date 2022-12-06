<x-layouts.base>
<main>

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
    <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
        >
        <div class="media d-flex align-items-center">
            <img class="avatar rounded-circle" alt="" src="../../assets/img/devlogix-picture-1.png">
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
</x-layouts.base>
