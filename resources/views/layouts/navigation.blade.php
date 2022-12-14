<nav class="bg-sky-900">
  <div x-data="{ dropdown: false, menu: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-white.svg" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">Dashboard</x-nav-link>
              <x-nav-link :href="route('admin.companies.list')" :active="request()->routeIs('admin.companies*')">Empresas</x-nav-link>
              <x-nav-link :href="route('admin.drivers.list')" :active="request()->routeIs('admin.drivers*')">Motoristas</x-nav-link>
              <x-nav-link :href="route('admin.advertisings.list')" :active="request()->routeIs('admin.advertisings*')">Campanhas</x-nav-link>
              <x-nav-link :href="route('admin.records')" :active="request()->routeIs('admin.records*')">Relatórios</x-nav-link>
              <x-nav-link :href="route('admin.interactivity.home')" :active="request()->routeIs('admin.interactivity*')">Interatividade</x-nav-link>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="ml-3 relative">
              <div>
                <button @click="dropdown = !dropdown" type="button" class="bg-sky-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                  {{-- <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
                </button>
              </div>

              <div x-show="dropdown" x-cloak @click.away="dropdown = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-90"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div @click="menu = !menu" class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="bg-sky-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="menu" x-cloak class="md:hidden" id="mobile-menu"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="transform opacity-0 -translate-y-6"
      x-transition:enter-end="transform opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-90"
      x-transition:leave-start="transform opacity-100 translate-y-0"
      x-transition:leave-end="transform opacity-0 -translate-y-6"

    >
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">Dashboard</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.companies.list')" :active="request()->routeIs('admin.companies*')">Empresas</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.drivers.list')" :active="request()->routeIs('admin.drivers*')">Motoristas</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.advertisings.list')" :active="request()->routeIs('admin.advertisings*')">Campanhas</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.records')" :active="request()->routeIs('admin.records*')">Relatórios</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.interactivity.home')" :active="request()->routeIs('admin.interactivity*')">Interatividade</x-responsive-nav-link>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">{{auth()->user()->name}}</div>
            <div class="text-sm font-medium leading-none text-gray-400">{{auth()->user()->email}}</div>
          </div>
        </div>
          <div class="mt-3 px-2 space-y-1">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-responsive-nav-link :href="route('logout')"
                      onclick="event.preventDefault(); this.closest('form').submit();"
                      class="text-gray-400">
                  {{ __('Log Out') }}
              </x-responsive-nav-link>
            </form>
        </div>
      </div>
    </div>
  </div>
</nav>