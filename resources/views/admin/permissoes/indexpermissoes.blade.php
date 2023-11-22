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
        <
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listagem de papeis </h3>
                <a href="{{route('admin.permissions.create')}}"><button>Cadastrar Novo</button></a>
            </div>

            <div class="card-body">
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Nível</th>
                            <th>Editar / Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissoes as $permissao)
                            <tr>
                                <td>{{$permissao->id }}</td>
                                <td>{{$permissao->name}}</td>
                                <td><a href="{{ route('admin.permissions.edit', ['permission' => $permissao->id]) }}">
                                        <button class="btn btn-large btn-warning">Editar</button>
                                    </a>
                                    |
                                    <button class="btn btn-large btn-danger">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

@endsection
