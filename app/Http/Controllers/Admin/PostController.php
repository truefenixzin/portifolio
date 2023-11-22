<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Answers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\CodeCleaner\UseStatementPass;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('autor')->get();
//        dd($posts);
        return view('admin.comite.listarpauta', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comite.cadastro');
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
            'title' => 'required|min:3|max:65000',
            'situation' => 'required|min:3|max:65000',
            'sugestion' => 'required|min:3|max:65000',
        ]);

        try {
            $user = Auth::user();
            $post = new Post();
            $post->title = $request->title;
            $post->situation = $request->situation;
            $post->sugestion = $request->sugestion;
            $post->author = $user->id;
            $result = $post->save();

            return redirect()
                ->route('admin.posts.create')
                ->withErrors(['success' => 'Cadastro realizado com sucesso']);

        } catch (\Exception $exception) {
            return redirect()->route('admin.posts.create')->withInput()->withErrors();
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


        if (!auth()->user()->hasPermissionTo('listar comite')) {
            abort(403);
        }

        $post = Post::where('id',$id)->with(['autor', 'answers', 'answers.autorcomentario'])->first();

//        dd($post);
        return view('admin.comite.vizualisar', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->hasPermissionTo('edit')) {
            abort(403);
        }
        $post = Post::where('id', $id)->first();
        return view('admin.comite.editar', compact('post'));

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
        $post = Post::where('id', $id);
        $post->update($request->all());
        return redirect()
            ->route('admin.posts.edit', $post->id)
            ->withErrors(['success' => 'Alteração realizada com sucesso']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->hasPermissionTo('delete')) {
            abort(403);
        }
        Post::find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
}
