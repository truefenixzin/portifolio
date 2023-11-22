<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')
        ->whereDate('dtini', '<=', now())
        ->whereDate('dtfim', '>=', now())
        ->get();
        return view('admin.news.ListNews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.AddNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!auth()->user()->hasPermissionTo('subir arquivos')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required',
            'dtini' => 'required',
            'dtfim' => 'required|after_or_equal:dtini',
            'comments' => 'required',

        ]);




        try {
            $user = Auth::user();
            $new = new News();
            if (!empty($request->file('cover'))) {
                Storage::delete($new->cover);
                $new->cover = '';
            }
            $new->title = $request->title;
            $new->dtini = $request->dtini;
            $new->dtfim = $request->dtfim;
            $new->cover = $request->cover;
            $new->description = $request->comments;

            if (!empty($request->file('cover'))) {
                $new->cover = $request->file('cover')->store('public/news');
            }
            $result = $new->save();

            if ($result) {
                return redirect()->route('admin.news.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.news.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new =  News::where('id', $id)->first();
        return view('front.news_details',compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $new = News::where('id', $id)->first();
        return view('admin.news.EditNews', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasPermissionTo('subir arquivos')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|',
            'dtini' => 'required',
            'dtfim' => 'required|after_or_equal:dtini',
            'description' => 'required',

        ]);


        try {


            $user = Auth::user();
            $new = News::where('id', $id)->first();
            $new->title = $request->title;
            $new->dtini = $request->dtini;
            $new->dtfim = $request->dtfim;
            $new->description = $request->description;
            $result = $new->save();


            if ($result) {
                return view('admin.news.EditNews', compact('new'))->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return view('admin.news.EditNews', compact('new'))->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->route('admin.news.index');
    }
}
