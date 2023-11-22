<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.listarusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('admin.users.cadastro', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!auth()->user()->hasPermissionTo('cadastrar usuario')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nome' => 'required|min:3|max:191',
            'sobrenome' => 'required|min:3|max:191',
            'email' => 'required|unique:users',
            'senha' => 'required',
            'repetesenha' => 'required|same:senha',

        ]);


        try {

            $user = new User();
            $user->name = $request->nome;
            $user->lastname = $request->sobrenome;
            $user->email = $request->email;
            $user->password = bcrypt($request->senha);
            $user->cover = '';
            $user->assignRole($request->roles);
            $result = $user->save();

           

            if ($result) {
                return redirect()->route('admin.users.create')->withErrors(['success' => 'Cadastro realizado com sucesso']);
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.users.create')->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $roles = Role::orderBy('name')->get();
        $user = User::where('id', $id)->first();
        return view('admin.users.editar', [
            'user' => $user,
            'roles' => $roles
        ]);
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

        if (!auth()->user()->hasPermissionTo('cadastrar usuario')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nome' => 'required|min:3|max:191',
            'sobrenome' => 'required|min:3|max:191',
            'email' => 'required',
            'senha' => 'required|min:3|max:191',
            'repetesenha' => 'required|same:senha',

        ]);


        try {
            $user = User::where('id', $id)->first();
            $user->name = $request->nome;
            $user->lastname = $request->sobrenome;
            $user->email = $request->email;
            $user->password = bcrypt($request->senha);

            if (!empty($request->file('cover'))) {
                $user->cover = $request->file('cover')->store('user');
            }
            $result = $user->save();


            if (!empty($request->roles)) {
                $userRoles[] = Role::whereId($request->roles)->first();
//            }
            }

            if (isset($userRoles) && !empty($userRoles)) {
                $user->assignRole($userRoles);
            } else {
                echo "algo deu errado e está vazio";
            }

            if ($result) {
                return redirect()->route('admin.users.edit', $user->id)->withErrors(['success' => 'Cadastro realizado com sucesso']);
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.users.edit', $user->id)->withInput()->withErrors(['error' => 'aconteceu um exceção']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
