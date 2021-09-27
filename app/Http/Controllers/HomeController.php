<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {

            $id = Auth::user()->id;

            $sites = DB::table('sites')
                ->where('user_id', '=', $id)
                ->latest()
                ->limit(10)
                ->get();

            $associated_categories = DB::table('associated_categories')
                ->join('categories', 'categories.id', '=', 'associated_categories.category_id')
                ->get();

            return view('home', compact('sites'), compact('associated_categories'));
        } else {

            $sites = DB::table('sites')
                ->where('visibility', '=', 'publico')
                ->latest()
                ->limit(10)
                ->get();

            $associated_categories = DB::table('associated_categories')
                ->join('categories', 'categories.id', '=', 'associated_categories.category_id')
                ->get();

            return view('home', compact('sites'), compact('associated_categories'));
        }
    }

    public function home()
    {
        return redirect()->to('/home');
    }
}
