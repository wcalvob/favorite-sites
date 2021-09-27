<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use App\Models\associated_categories;
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

        $categories = DB::table('categories')->get();

        return view('favorites.register', compact('sites'), compact('categories'));
    }


    protected function store(Request $request)
    {

        $category_id = $request->input('category_id');

        if ($category_id == '') {
            return back()->with('msj', 'Seleccione una o más categorías');
        } else {

            $id = Auth::user()->id;
            $code = uniqid();
            $title = ucfirst(request('title'));
            $description = ucfirst(request('description'));
            Site::create([
                'code' => $code,
                'url' => request('url'),
                'title' => $title,
                'description' => $description,
                'visibility' => request('visibility'),
                'user_id' => $id,
            ]);

            $site_id = DB::table('sites')
                ->where('code', '=', $code)
                ->value('id');

            for ($i = 0; $i < count($category_id); $i++) {
                associated_categories::create([
                    'site_id' => $site_id,
                    'category_id' => $category_id[$i],
                ]);
            }

            return back()->with('msjok', 'Se ha guardado correctamente.');
        }
    }


    public function destroy($id)
    {
        DB::table('associated_categories')
            ->where('site_id', '=', $id)
            ->delete();

        DB::table('sites')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->to('/home');
    }
}
