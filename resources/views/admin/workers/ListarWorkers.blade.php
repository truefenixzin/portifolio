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
                <h3 class="card-title">Destaques do Mês!</h3>
            </div>

            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong>Atenção!</strong><br>
                As imagens com fundo em vermelho não serão carregadas na página principal!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data início</th>
                        <th>Data final</th>
                        <th>Imagem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workers as $workers)
                        <tr>
                            <td class="align-middle"><b>{{$workers->id}}</b></td>
                            <td class="align-middle"><b><a
                                        href="{{route('admin.workers.edit', $workers->id)}}">{{$workers->name}}</a></b>
                            </td>
                            <td class="align-middle">
                                <b>{{\Carbon\Carbon::parse($workers->dtini)->format('d/m/Y')}}</b></td>
                            <td class="align-middle">
                                <b>{{\Carbon\Carbon::parse($workers->dtfim)->format('d/m/Y')}}</b></td>
                            <td class="align-middle ">
                                @if($workers->dtfim < now())
                                    <div class="bg-danger mx-auto">
                                        @endif
                                        <img
                                            src="{{\Illuminate\Support\Facades\Storage::url($workers->cover)}}"
                                            class="rounded-circle" width="140" height="140"></td>
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
