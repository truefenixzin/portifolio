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
                <h3 class="card-title">Listagem de usuários Cadastradas</h3>
            </div>

            <div class="card-body">
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Último login</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{\Carbon\Carbon::parse($user->last_login_at)->format('d/m/Y h:i:s')}}</td>
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
