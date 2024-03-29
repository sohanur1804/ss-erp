<div class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% ">
  <div
    class="pt-1 text-base bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%  border-b-2">
    <a href="{{ route('dashboard') }}">SS ERP</a>
  </div>
  <div class="py-1">

    <!--Primary Setup menu start-->
    <div
      class="dropdown inline-block relative mr-[-4px] bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% ">
      <button
        class="bg-gradient-to-r from-indigo-300 from-10% via-sky-300 via-30% to-emerald-300 to-90% hover:from-pink-500 hover:to-yellow-500 text-black font-medium py-2 px-4 rounded inline-flex items-center">
        <span class="flex text-base ">Primary Setup <svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 ml-2 mt-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg></span>
      </button>

      <ul class="dropdown-content absolute hidden bg-white pt-1">

        <li
          class="dropdown relative bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">
          <a class="rounded    py-2 px-4 text-nowrap text-xs flex" href="#">Product Setup <svg
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 ml-2 mt-1">
              <path fill-rule="evenodd"
                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                clip-rule="evenodd" />
            </svg>
          </a>
          <ul class="dropdown-content absolute hidden top-0 left-full mt-1 ">
            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-black py-2 px-4 block text-nowrap text-xs"
                href="{{ route('category.index') }}">Product Category</a>
            </li>

            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500  py-2 px-4 block text-nowrap text-xs"
                href="{{ route('brand.index') }}">Brand</a>
            </li>
            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500  py-2 px-4 block text-nowrap text-xs"
                href="{{ route('warranty.index') }}">Warranty</a>
            </li>
            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 py-2 px-4 block text-nowrap text-xs"
                href="{{ route('product.index') }}">Product Information</a>
            </li>
          </ul>
        </li>
        <li
          class="dropdown relative bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">
          <a class="rounded    py-2 px-4 text-nowrap text-xs flex" href="#">Traders Information <svg
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 ml-2 mt-1">
              <path fill-rule="evenodd"
                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                clip-rule="evenodd" />
            </svg>
          </a>
          <ul class="dropdown-content absolute hidden top-0 left-full mt-1 ">
            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-black py-2 px-4 block text-nowrap text-xs"
                href="{{ route('trader.index') }}">Credit Customer</a>
            </li>

          </ul>
        </li>

      </ul>
    </div>

    <!--Primary Setup menu end-->
    <!--Task menu start-->

    <div
      class="dropdown inline-block relative bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% ">


      <button
        class="bg-gradient-to-r from-indigo-300 from-10% via-sky-300 via-30% to-emerald-300 to-90% hover:from-pink-500 hover:to-yellow-500 text-black font-medium py-2 px-4 rounded inline-flex items-center">
        <span class="flex text-base ">Task <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="w-3 h-3 ml-2 mt-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg></span>
      </button>

      <ul class="dropdown-content absolute hidden bg-white pt-1">

        <li
          class="dropdown relative bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">
          <a class="rounded py-2 px-4 text-nowrap text-xs flex" href="#">Purchase <svg
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3  mt-1">
              <path fill-rule="evenodd"
                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                clip-rule="evenodd" />
            </svg>
          </a>
          <ul class="dropdown-content absolute hidden top-0 left-full mt-1 ">
            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 text-black py-2 px-4 block text-nowrap text-xs"
                href="{{ route('purchase.index') }}">Product purchase</a>
            </li>
            <li>
              <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 py-2 px-4 block text-nowrap text-xs"
                href="{{ route('product.index') }}">Purchase return</a>
            </li>
          </ul>
        </li>
        <li>
          <a class="rounded bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 py-2 px-4 block whitespace-no-wrap text-xs "
            href="#">Sell</a>
        </li>
      </ul>
    </div>

    <!--Task menu end-->

    {{-- <div class="hidden sm:flex sm:items-center sm:ms-6">
      <x-dropdown align="right" width="48">
        <x-slot name="trigger">
          <button
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            <div>{{ Auth::user()->name }}</div>

            <div class="ms-1">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </div>
          </button>
        </x-slot>

        <x-slot name="content">
          <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
          </x-dropdown-link>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>
        </x-slot>
      </x-dropdown>
    </div> --}}
  </div>
</div>