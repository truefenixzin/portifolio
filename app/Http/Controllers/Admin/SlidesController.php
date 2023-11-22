<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = DB::table('slides')
        ->whereDate('dtini', '<=', now())
        ->whereDate('dtfim', '>=', now())
        ->orderByDesc('dtfim')
        ->get();
        return view('admin.slides.ListarSlides', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.slideUpload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!auth()->user()->hasPermissionTo('cadastrar comite')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|unique:posts',
            'dtini' => 'required',
            'dtfim' => 'required|after_or_equal:dtini',
            'cover' => 'required|mimes:jpg,bmp,png',

        ]);

        try {
            $user = Auth::user();
            $slide = New Slide();
            if (!empty($request->file('cover'))) {
                Storage::delete($slide->cover);
                $slide->cover = '';
            }
            $slide->title = $request->title;
            $slide->dtini = $request->dtini;
            $slide->dtfim = $request->dtfim;
            $slide->cover = $request->cover;
            $slide->message = $request->message;
            $slide->author = $user->id;

            if (!empty($request->file('cover'))) {
                $slide->cover = $request->file('cover')->store('public/slides');
            }
            $result = $slide->save();

            if ($result) {
                return redirect()->route('admin.slides.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.slides.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::where('id', $id)->first();
        return view('admin.slides.EditarSlide',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasPermissionTo('cadastrar comite')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|unique:posts',
            'dtini' => 'required',
            'dtfim' => 'required|after_or_equal:dtini',

        ]);

        try {


            $user = Auth::user();
            $slide = Slide::where('id', $id)->first();
            $slide->title = $request->title;
            $slide->dtini = $request->dtini;
            $slide->dtfim = $request->dtfim;
            $slide->message = $request->message;
            $slide->author = $user->id;
            $result = $slide->save();

            if ($result) {
                return redirect()->route('admin.slides.edit', compact('slide'))->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.slides.edit', compact('slide'))->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::find($id)->delete();
        return redirect()->route('admin.slides.index');
    }
}
