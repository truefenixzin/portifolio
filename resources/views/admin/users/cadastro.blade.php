@extends('admin.master.master_admin')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Usuários</h3>
            </div>

            <div class="card-body">
                @error('success')
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('nome')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('email')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('sobrenome')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('senha')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('repetesenha')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror
                <form action="{{route('admin.users.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">
                            </div>
                            <div class="col-6">
                                <label for="sobrenome">Sobrenome:</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                       value="{{old('sobrenome')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{old('email')}}">
                            </div>
                            <div class="col-6">
                                @if(isset($roles) && $roles->count() > 0)
                                    <label for="roles">Nível de acesso:</label>
                                    <select name="roles" id="roles" class="form-control">
                                        @foreach($roles as $role)
                                            <option id="role{{$role->id}}"
                                                    value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" value="{{old('senha')}}">
                            </div>
                            <div class="col-6">
                                <label for="repetesenha">Confirmar senha:</label>
                                <input type="password" class="form-control" id="repetesenha" name="repetesenha" value="{{old('repetasenha')}}">
                            </div>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success bg-gradient-success ">Cadastrar</button>
                    </div>

                </form>
            </div>

            <!-- /.card-body -->
            <div class="card-footer text-center">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

@endsection
