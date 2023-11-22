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
                <h3 class="card-title">Cadastro de permissão</h3>
            </div>

            <div class="card-body">
                <form action="{{route('admin.permissions.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label for="permission">Permissão:</label>
                            <input type="text" class="form-control" id="permission" name="permission">
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
