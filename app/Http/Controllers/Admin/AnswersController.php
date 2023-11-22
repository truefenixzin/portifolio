<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswersController extends Controller
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

        return view('admin.comite.answers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        if (!auth()->user()->hasPermissionTo('cadastrar comite')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'answer' => 'required|min:3|max:65000',
            'postid' => 'required',
        ]);

        try {
            $user = Auth::user();
            $answer = new Answers();
            $answer->answer = $request->answer;
            $answer->id_posts = $request->postid;
            $answer->author = $user->id;
            $result = $answer->save();

            return back()->withErrors(['success' => 'Cadastro realizado com sucesso']);

        } catch (\Exception $exception) {
            return back()->withErrors();
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
        if (!auth()->user()->hasPermissionTo('cadastrar comite')) {
            abort(403);
        }
        $post = Post::where('id', $id)->with(['autor', 'answers', 'answers.autorcomentario'])->first();
        return view('admin.comite.answers', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
