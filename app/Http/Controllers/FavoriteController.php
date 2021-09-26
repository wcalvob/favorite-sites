<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use App\Models\sites_categories;
use App\Providers\RouteServiceProvider;

class FavoriteController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        
        $sites = DB::table('sites')
        ->where('user_id', '=', $id)
        ->get();

        $sites_categories = DB::table('sites_categories')
        ->join('categories', 'categories.id', '=', 'sites_categories.category_id')
        ->get();

        $categories = DB::table('categories')->get();

        return view('favorites.register', compact('sites'), compact('categories'));
        
    }

    protected function store(Request $request)
    {
        $id = Auth::user()->id;
        $code = uniqid();
        Site::create([
            'code'=>$code,
            'url'=>request('url'),
            'title'=>request('title'),
            'description'=>request('description'),
            'visibility'=>request('visibility'),
            'user_id'=> $id,
        ]);

        $site_id = DB::table('sites')
        ->where('code', '=', $code)
        ->value('id');

        $category_id = $request->input('category_id');

        for($i=0; $i < count($category_id); $i++){
            sites_categories::create([
                'site_id'=> $site_id,
                'category_id'=> $category_id[$i],
            ]);
        }

        return redirect()->to('/home');
        
    }


}