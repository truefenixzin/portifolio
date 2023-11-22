<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\paybox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PayBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payboxes = paybox::all();
        return view('admin.paybox.ListPayBox', compact('payboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paybox.AddPayBox');
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
            'cover' => 'required|mimes:pdf|max:10000',
            'categories' => 'required',
        ]);


        try {
            $user = Auth::user();
            $paybox = new paybox();
            if (!empty($request->file('cover'))) {
                Storage::delete($paybox->cover);
                $paybox->cover = '';
            }
            $paybox->cover = $request->cover;
            $paybox->categories = $request->categories;

            if (!empty($request->file('cover'))) {
                $paybox->cover = $request->file('cover')->store('public/paybox');
            }
            $result = $paybox->save();

            if ($result) {
                return redirect()->route('admin.paybox.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.$paybox.create')->withInput()->withErrors(['error' => 'aconteceu algo inesperado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\paybox $paybox
     * @return \Illuminate\Http\Response
     */
    public function show(paybox $paybox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\paybox $paybox
     * @return \Illuminate\Http\Response
     */
    public function edit(paybox $paybox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\paybox $paybox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paybox $paybox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\paybox $paybox
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        paybox::find($id)->delete();
        return redirect()->route('admin.paybox.index');
    }
}
