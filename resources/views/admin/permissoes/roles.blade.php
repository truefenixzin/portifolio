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
                <h3 class="card-title">Cadastro de Papéis</h3>
            </div>

            <div class="card-body">
                <form action="{{route('admin.roles.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label for="roles">Roles:</label>
                            <input type="text" class="form-control" id="roles" name="roles">
                            <h2>Permissões:

                                @if(isset($permissions) && $permissions->count() > 0)
                                    @foreach($permissions as $permission)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}" value="{{$permission->id}}" name="permissions[]">
                                            <label class="custom-control-label" for="permission_{{$permission->id}}">{{$permission->name}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </h2>

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
