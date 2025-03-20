@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<section class="w-full h-full pt-[70px]" >
<x-container>
    <section class="w-full h-full pt-[120px]">
        <x-container>
            <h1 class="h1 text-center text-[38px] font-extrabold mb-[30px]">Наши курсы</h1>

            <!-- Категории -->
            <div class="categories flex justify-center mb-[20px]" id="categories">
                <ul class="categories-list flex gap-[10px]">
                    @foreach ($brands as $brand)
                        <li class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">
                            <button  class="category-link" data-id="{{ $brand->id }}">
                                {{ $brand->name }}
                            </button>
                        </li>
                    @endforeach
                    <li>
                        <button class="category-all inline-flex py-2 px-3 hover:bg-slate-200 rounded" data-id="all" >
                            Все курсы
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Статьи -->
      <div class="flex items-center  flex-wrap gap-[20px]  " id="articles" >
                @foreach ($products as $product)

                @endforeach
            </div>
        </x-container>
    </section>

    <script>
        $(document).ready(function() {
            // Загружаем статьи по умолчанию (при загрузке страницы)
            loadArticles();

            // Обработчик кликов по категориям
            $(document).on('click', '.category-link', function(e) {
                e.preventDefault();
                const brandId = $(this).data('id'); // Получаем ID категории
                loadArticles(brandId); // Загружаем статьи для выбранной категории
            });
            $(document).on('click', '.category-all', function(e) {
                e.preventDefault();

                loadArticles(); // Загружаем статьи для выбранной категории
            });

            // Функция для загрузки статей
            function loadArticles(brandId = null) {
                const url = brandId ? '{{ url("/") }}' + `/articles/brand/${brandId}` : '{{ url("/") }}';

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $('#articles').html(response.products); // Вставляем статьи в блок
                    }
                });
            }
        });
    </script>


    {{-- <h1 class="h1 text-center text-[38px] font-extrabold mb-[30px]  ">Наши курсы</h1>

        <div class="categories flex justify-center mb-[20px] ">
            <ul class="categories-list flex gap-[10px] ">
                <li class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">
                    <a href="{{ route('main-page') }}"
                        @if (!$brandId)
                            class="active"
                        @endif
                    >Все курсы</a>
                </li>
                @if ($brands)
                    @foreach ($brands as $brand)
                        <li class="inline-flex py-2 px-3 hover:bg-slate-200 rounded" >
                            <a href="{{ route('brandsByCategory', $brand->id) }}"
                                @if (intval($brandId) === $brand->id)
                                    class="active"
                                @endif
                            >{{ $brand->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="swiper mySwiper   ">
            <div class="swiper-wrapper   ">
                @foreach ($products as $product )
                <div class="swiper-slide  ">
                    <div class=" md:max-w-[500px] p-[20px] bg-[#FFF4BB] border rounded-[20px]    ">
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col">
                                <div class="flex gap-[5px] items-center">
                                    <span>{{$product->name}}</span>
                                    <span
                                        class="bg-[#FFF705] text-[12px] font-medium py-[3px] px-[7px] flex justify-center items-center  rounded-[10px] gap-[4px] ">
                                        <p class=""> Популярное</p> <img class="size-[14px]" src="{{"
                                            storage/fire.png"}}" alt="">
                                    </span>
                                </div>
                                <h3 class="text-[20px] font-bold mt-[10px]">

                                </h3>

                            </div>
                            <div class="">
                                <img class="size-[45px]" src="{{ url('storage', $product->image) }}" alt="">
                            </div>
                        </div>
                        <ul class="mt-8 space-y-3 font-medium">
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="ml-3 leading-5 text-gray-600">
                                    Проверка заданий кураторами
                                </p>
                            </li>
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="ml-3 leading-5 text-gray-600">
                                    Поддержка от кураторов
                                </p>
                            </li>
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="ml-3 leading-5 text-gray-600">
                                    Трудоустройства после обучения
                                </p>
                            </li>

                        </ul>
                        <div class=" mt-[30px] w-full bg-[#ffdd05] p-[12px] rounded-[10px] min-h-[120px] ">
                            <h3 class="text-[19px] font-bold text-black line-through">
                                 ₽ / мес
                            </h3>
                            <h3 class="text-[22px] mt-[10px] font-bold text-black ">
                               ₽ / мес
                            </h3>
                            <span class="text-black text-[14px]">Рассрочка на 12 месяцев</span>
                        </div>
                        <div class=" flex justify-center items-center mt-[15px] gap-[20px]">
                            <button type="button"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent  cursor-pointer bg-[#78258D] hover:bg-violet-600 focus:outline-2 focus:outline-offset-2 focus:outline-violet-500 active:bg-violet-700 text-white  disabled:opacity-50 disabled:pointer-events-none">
                                Записаться
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m5 11 4-7"></path>
                                    <path d="m19 11-4-7"></path>
                                    <path d="M2 11h20"></path>
                                    <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"></path>
                                    <path d="m9 11 1 9"></path>
                                    <path d="M4.5 15.5h15"></path>
                                    <path d="m15 11-1 9"></path>
                                </svg>
                            </button>
                            <button type="button"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                Узнать больше
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}

    </x-container>
    </section>
@endsection
