<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\workershighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use http\QueryString;
use Illuminate\Support\Carbon;

class WorkersHighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = DB::table('workershighlights')
        ->whereDate('dtini', '<=', now())
        ->whereDate('dtfim', '>=', now())
        ->orderByDesc('meta')
        ->get();
        return view('admin.workers.ListarWorkers', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workers.CreateWorkers');
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
            'name' => 'required',
            'meta' => 'required',
            'dtini' => 'required',
            'dtfim' => 'required|after_or_equal:dtini',
            'comments' => 'required',

        ]);


        try {
            $user = Auth::user();
            $worker = new workershighlight();
            if (!empty($request->file('cover'))) {
                Storage::delete($worker->cover);
                $worker->cover = '';
            }
            $worker->name = $request->name;
            $worker->dtini = $request->dtini;
            $worker->dtfim = $request->dtfim;
            $worker->cover = $request->cover;
            $worker->comments = $request->comments;
            $worker->meta = $request->meta;

            if (!empty($request->file('cover'))) {
                $worker->cover = $request->file('cover')->store('public/workers');
            }
            $result = $worker->save();

            if ($result) {
                return redirect()->route('admin.workers.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.workers.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\workershighlight $workershighlight
     * @return \Illuminate\Http\Response
     */
    public function show(workershighlight $workershighlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\workershighlight $workershighlight
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = workershighlight::where('id', $id)->first();
        return view('admin.workers.EditWorker', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\workershighlight $workershighlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasPermissionTo('subir arquivos')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|',
            'meta' => 'required',
            'dtini' => 'required',
            'dtfim' => 'required|after_or_equal:dtini',
            'comments' => 'required',

        ]);

        try {


            $user = Auth::user();
            $worker = workershighlight::where('id', $id)->first();
            $worker->name = $request->name;
            $worker->dtini = $request->dtini;
            $worker->dtfim = $request->dtfim;
            $worker->comments = $request->comments;
            $worker->meta = $request->meta;
            $result = $worker->save();


            if ($result) {
                return redirect()->route('admin.workers.edit', compact('worker'))->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.workers.edit', compact('worker'))->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\workershighlight $workershighlight
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        workershighlight::find($id)->delete();
        return redirect()->route('admin.workers.index');
    }
}
