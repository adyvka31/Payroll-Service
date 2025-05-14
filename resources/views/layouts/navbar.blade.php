<header class="absolute inset-x-0 px-16 mx-auto top-0 z-50">
  <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">Your Company</span>
        <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
      </a>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    @auth
        @if (auth()->user()->role === 'admin')
        <div class="hidden lg:flex lg:gap-x-12">
          <a href="{{ route('index') }}" class="text-sm/6 font-semibold text-gray-900">Home</a>
          <a href="{{ route('datakaryawan') }}" class="text-sm/6 font-semibold text-gray-900">Employee Data</a>
          <a href="{{ route('dataabsensi') }}" class="text-sm/6 font-semibold text-gray-900">Absence</a>
          <a href="{{ route('gaji') }}" class="text-sm/6 font-semibold text-gray-900">Sallary</a>
        </div>
        @elseif (auth()->user()->role === 'karyawan')
        <div class="hidden lg:flex lg:gap-x-12">
          <a href="{{ route('index') }}" class="text-sm/6 font-semibold text-gray-900">Home</a>
          <a href="{{ route('absensi') }}" class="text-sm/6 font-semibold text-gray-900">Absence</a>
          <a href="{{ route('pengajuan') }}" class="text-sm/6 font-semibold text-gray-900">Submission</a>
        </div>
        @endif
        @else
        <a href="{{ route('index') }}" class="text-sm/6 font-semibold text-gray-900">Home</a>
    @endauth
    
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      @auth
        @if ((auth()->user()->role === 'admin'))
          <p class="text-sm/6 font-semibold text-gray-900 mr-5 mt-3">Admin</p>
        @elseif ((auth()->user()->role === 'karyawan'))
        <p class="text-sm/6 font-semibold text-gray-900 mr-5 mt-3">Karyawan</p>
        @endif
      @endauth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center space-x-3 rtl:space-x-reverse">
            <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 cursor-pointer">
                <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </button>
    </form>
    </div>
  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-50"></div>
    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Close menu</span>
          <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Product</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
          </div>
          <div class="py-6">
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>