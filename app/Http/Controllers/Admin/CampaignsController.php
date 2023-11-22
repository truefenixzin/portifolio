<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Campaigns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news =  DB::table('campaigns')
        ->whereDate('dtini', '<=', now())
        ->whereDate('dtfim', '>=', now())
        ->orderByDesc('created_at')
        ->get();

        return view('admin.campaigns.Listcampaigns', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaigns.AddCampaigns');
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
            'category' => 'required',
            'cover' => 'required',

        ]);

        try {
            $user = Auth::user();
            $campaign = new Campaigns();
            if (!empty($request->file('cover'))) {
                Storage::delete($campaign->cover);
                $campaign->cover = '';
            }
            $campaign->title = $request->title;
            $campaign->dtini = $request->dtini;
            $campaign->dtfim = $request->dtfim;
            $campaign->cover = $request->cover;
            $campaign->description = $request->comments;
            $campaign->category = $request->category;

            if (!empty($request->file('cover'))) {
                $campaign->cover = $request->file('cover')->store('public/news');
            }
            $result = $campaign->save();

            if ($result) {
                return redirect()->route('admin.campaigns.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return redirect()->route('admin.campaigns.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Campaigns $campaigns
     * @return \Illuminate\Http\Response
     */
    public function show(Campaigns $campaigns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Campaigns $campaigns
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaigns::where('id', $id)->first();
        return view('admin.campaigns.EditCampaigns', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Campaigns $campaigns
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



            $campaign = Campaigns::where('id', $id)->first();
            $campaign->title = $request->title;
            $campaign->dtini = $request->dtini;
            $campaign->dtfim = $request->dtfim;
            $campaign->description = $request->description;
            $result = $campaign->save();


            if ($result) {
                return view('admin.campaigns.EditCampaigns', compact('campaign'))->withErrors(['success' => 'Cadastro realizado com sucesso']);

            }

        } catch (\Exception $exception) {
            return view('admin.campaigns.EditCampaigns', compact('campaign'))->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Campaigns $campaigns
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Campaigns::find($id)->delete();
        return redirect()->route('admin.campaigns.index');
    }
}
