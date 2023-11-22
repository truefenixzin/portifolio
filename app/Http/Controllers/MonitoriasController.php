<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MonitoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitorias =  DB::table('book')
        ->get();

        return view('admin.books.listarBooks', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.monitoria.AddMonitoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            'cover' => 'required',

        ]);

        try {
            $user = Auth::user();
            $campaign = new Monitorias();
            if (!empty($request->file('cover'))) {
                Storage::delete($campaign->cover);
                $campaign->cover = '';
            }
            $campaign->title = $request->title;
            $campaign->dtini = $request->dtini;
            $campaign->dtfim = $request->dtfim;
            $campaign->cover = $request->cover;

            if (!empty($request->file('cover'))) {
                $campaign->cover = $request->file('cover')->store('public/monitorias');
            }
            $result = $campaign->save();

            if ($result) {
                return redirect()->route('admin.monitoria.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.monitoria.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Monitorias::where('id', $id)->first();
        return view('admin.monitoria.EditMonitoria', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

        ]);


        try {
            $campaign = Monitorias::where('id', $id)->first();
            $campaign->title = $request->title;
            $campaign->dtini = $request->dtini;
            $campaign->dtfim = $request->dtfim;
            $result = $campaign->save();


            if ($result) {
                return view('admin.monitoria.Editmonitoria', compact('campaign'))->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return view('admin.monitoria.Editmonitoria', compact('campaign'))->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Monitorias::find($id)->delete();
        return redirect()->route('admin.monitoria.index');
    }
}
