<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {
        return view('/categories/register');
    }

    public function store()
    {

        $name = ucfirst(request('name'));
        $categories = DB::table('categories')
            ->where('name', '=', $name)
            ->get();
        if (count($categories) >= 1) {
            return back()->with('msjerror', 'La categoría "' . $name . '" ya existe');
        } else {
            categories::create([
                'name' => $name,
            ]);
            return back()->with('msjok', 'Se ha añadido la categoría "' . $name . '".');
        }
    }
}
