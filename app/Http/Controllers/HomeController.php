<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Получаем все бренды (категории)
    public function index(Request $request)
    {
        // Получаем все бренды (категории)
        $brands = Brand::all();

        // Получаем все статьи по умолчанию
        $products = Product::all();

        // Проверяем, если запрос был AJAX-запросом для загрузки статей
        if ($request->ajax()) {
            return response()->json([
                'products' => view('layouts.partials.articles', compact('products'))->render(), // Отправляем только рендер статей
            ]);
        }

        return view('layouts.app', compact('brands', 'products')); // Главная страница с брендами и статьями
    }

    public function getArticlesByCategory($brandId, Request $request)
    {
        // Получаем статьи для выбранной категории (бренда)
        $products = Product::where('brand_id', $brandId)->get();

        if ($request->ajax()) {
            return response()->json([
                'products' => view('layouts.partials.articles', compact('products'))->render(), // Отправляем только рендер статей для выбранного бренда
            ]);
        }

        // Если не AJAX, возвращаем обычный ответ
        return response()->json(['message' => 'Invalid request'], 400);
    }

};
