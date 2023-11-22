<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualitys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QualitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualitys = Qualitys::all();
        return view('admin.qualitys.ListarQualitys', compact('qualitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qualitys.CreateQualitys');
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
            'nome' => 'required',
            'cover' => 'required',
            'qtdselos' => 'required',
            'vencimento' => 'required',
            'classificacao' =>'required',
        ]);

        try {

            $quality = new Qualitys();

            if (!empty($request->file('cover'))) {
                Storage::delete($quality->avatar);
                $quality->avatar = '';
            }

            $quality->nome = $request->nome;
            $quality->avatar = $request->cover;
            $quality->qtd_selos = $request->qtdselos;
            $quality->classificacao = $request->classificacao;
            $quality->vencimento = $request->vencimento;

            if (!empty($request->file('cover'))) {
                $quality->avatar = $request->file('cover')->store('public/qualitys');
            }

            $result = $quality->save();



            if ($result) {
                return redirect()->route('admin.qualitys.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.qualitys.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quality = Qualitys::where('id', $id)->first();
        return view('admin.qualitys.EditQuality', compact('quality'));
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
            'vencimento' => 'required',
            'nome' => 'required',
            'qtdselos' => 'required',
            'classificacao' =>'required',

        ]);


        try {



            $quality = Qualitys::where('id', $id)->first();
            $quality->nome = $request->nome;
            $quality->vencimento = $request->vencimento;
            $quality->qtd_selos = $request->qtdselos;
            $quality->classificacao = $request->classificacao;
            $result = $quality->save();


            if ($result) {
                return view('admin.qualitys.EditQuality', compact('quality'))->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return view('admin.qualitys.EditQuality', compact('quality'))->withInput()->withErrors(['error' => 'aconteceu um exceção']);
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
        Qualitys::find($id)->delete();
        return redirect()->route('admin.qualitys.index');
    }
}
