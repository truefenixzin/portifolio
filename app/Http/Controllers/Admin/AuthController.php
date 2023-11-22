<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::check() === true)
        {
            return redirect(route('admin.home'));
        }
        return view('admin.index');
    }

    public function home()
    {
        return view('admin.home');
    }

    public function showComiteCadastro()
    {
        return view('admin.comite.cadastro');
    }

    public function showComiteList()
    {
        return view('admin.comite.listarpauta');
    }

    public function showListUsers()
    {
        return view('admin.users.listarusers');
    }

    public function showCadastroUsers()
    {
        return view('admin.users.cadastro');
    }

    public function showUploadForm()
    {
        return view('admin.slides.slideUpload');
    }

    public function login(Request $request)
    {
        if (in_array('',$request->only('email', 'password'))){
            $json['message'] = $this->message->error('Informe todos os dados.')->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json['message'] = $this->message->error('Informe um e-mail válido.')->render();
            return response()->json($json);
        }

        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)){
            $json['message'] = $this->message->error('Usuário e senha inválidos')->render();
            return response()->json($json);
        }

        $this->authenticated($request->getClientIp());

        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $ip
        ]);
    }

}
