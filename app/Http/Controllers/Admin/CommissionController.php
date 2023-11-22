<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaigns.AddComissao');
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
            'cover' => 'required',
        ]);

        try {
            $campaign = new Commission();
            if (!empty($request->file('cover'))) {
                Storage::delete($campaign->cover);
                $campaign->cover = '';
            }
            $campaign->cover = $request->cover;


            if (!empty($request->file('cover'))) {
                $campaign->cover = $request->file('cover')->store('public/commission');
            }
            $result = $campaign->save();

            if ($result) {
                return redirect()->route('admin.commission.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.commission.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commission $commission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        //
    }
}
