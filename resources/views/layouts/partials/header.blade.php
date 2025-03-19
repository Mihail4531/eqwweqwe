<x-container>
    <header class="flex justify-between items-center bg-white drop-shadow-sm py-4 px-8">

            <a href="" class="">
        Логотип
    </a>

        <!-- Mobile Menu Toggle -->
        <button class="flex md:hidden flex-col items-center align-middle" @click="openMenu = !openMenu"
          :aria-expanded="openMenu" aria-controls="mobile-navigation" aria-label="Navigation Menu">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <span class="text-xs">Menu</span>
        </button>

        <!-- Main Navigations -->
        <nav class="hidden md:flex">

          <ul class="flex flex-row gap-2">
            <li>
              <a href="" class="inline-flex py-2 px-3 bg-slate-200 rounded" aria-current="true">Курсы</a>
            </li>
            <li>
              <a href="" class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">О нас</a>
            </li>
            <li>
              <a href="" class=" inline-flex py-2 px-3 hover:bg-slate-200 rounded">Блог</a>
            </li>
            <li class="inline-flex py-2 px-3 hover:bg-slate-200 rounded" >
                <a href="" class="flex items-center gap-[5px] ">
              <span href="" class=" ">Корзина </span>
              <img class="size-[16px] " src="{{"storage/корзина.png"}}" alt="">
             </a>
            </li>


<div class="flex justify-center">
    <div
        x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
        class="relative"
    >
        <!-- Button -->
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="relative flex items-center whitespace-nowrap justify-center gap-2 py-2 rounded-lg shadow-sm bg-white hover:bg-gray-50 text-gray-800 border border-gray-200 hover:border-gray-200 px-4"
        >
            <span class="" >Ещё</span>

            <!-- Heroicon: micro chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            x-cloak
            class="absolute left-0 min-w-48 rounded-lg shadow-sm mt-2 z-10 origin-top-left bg-white p-1.5 outline-none border border-gray-200"
        >
            <a href="#new" class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-gray-50 focus-visible:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
             Обратная связь
            </a>

            <a href="#edit" class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-gray-50 focus-visible:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                Отзывы
            </a>
        </div>
    </div>
</div>
            </li>

            @if (Route::has('login'))
            @auth
                <a class=" bg-[#78258D] border rounded-md text-white inline-flex py-2 px-3 href="">Личный кабинет</a>
            @else
                <a class=" bg-[#78258D] text-white rounded-md  inline-flex py-2 px-3 " href="">Войти</a>
                @if (Route::has('register'))
                    <a class=" bg-[#78258D] text-white  rounded-md  inline-flex py-2 px-3 " href="">Зарегистрироваться</a>
                @endif
            @endauth
        @endif

          </ul>

        </nav>

      </header>

      <!-- Pop Out Navigation -->
      <nav id="mobile-navigation" class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10"
        :class="openMenu ? 'visible' : 'invisible' " x-cloak>

        <!-- UL Links -->
        <ul class="absolute top-0 right-0 bottom-0 w-10/12 py-4 bg-white drop-shadow-2xl z-10 transition-all"
          :class="openMenu ? 'translate-x-0' : 'translate-x-full'">

          <li class="border-b border-inherit">
            <a href="" class="block p-4" aria-current="true">Курсы</a>
          </li>
          <li class="border-b border-inherit">
            <a href="" class="block p-4" aria-current="true">Отзывы</a>
          </li>
          <li class="border-b border-inherit">
            <a href="" class="block p-4" aria-current="true">Обратная связь</a>
          </li>
          <li class="border-b border-inherit">
            <a href="" class="block p-4">О нас </a>
          </li>
          <li class="border-b border-inherit">
            <a href="" class="block p-4">Блог</a>
          </li>
          <li class="border-b border-inherit" >
            <a href="" class="flex items-center gap-[5px] ">
          <span href="" class="block p-4 ">Корзина </span>
          <img class="size-[16px] " src="{{"storage/корзина.png"}}" alt="">
         </a>
        </li>
          <li class="flex flex-col gap-[10px]" >
          @if (Route::has('login'))
          @auth
              <a class=" bg-[#78258D] border rounded-md text-white inline-flex py-2 px-3 href="">Личный кабинет</a>
          @else
              <a class=" bg-[#78258D] text-white rounded-md  inline-flex py-2 px-3 " href="">Войти</a>
              @if (Route::has('register'))
                  <a class=" bg-[#78258D] text-white  rounded-md  inline-flex py-2 px-3 " href="">Зарегистрироваться</a>
              @endif
          @endauth
      @endif
    </li>
        </ul>

        <!-- Close Button -->
        <button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu" :aria-expanded="openMenu"
          aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 left-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

      </nav>
    </x-container>
