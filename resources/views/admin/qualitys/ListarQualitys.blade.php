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
                <h3 class="card-title">Listagem dos selos</h3>
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
                        <th>Avatar</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Vencimento</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    {{dd($qualitys)}}--}}
                     @foreach($qualitys as $quality)

                        <tr>
                            <td class="align-middle"><b>{{$quality->id}}</b></td>
                            <td class="align-middle ">
                                @if($quality->vencimento < now())
                                    <div class="bg-danger mx-auto">
                                        @endif
                                        <img
                                            src="{{\Illuminate\Support\Facades\Storage::url($quality->avatar)}}"
                                            class="rounded-circle" width="140" height="140"></td>
                            <td class="align-middle"><b><a
                                        href="{{route('admin.qualitys.edit', $quality->id)}}">{{$quality->nome}}</a></b>
                            </td>
                            <td class="align-middle">
                                <b>{{$quality->qtd_selos}}</b></td>
                            <td class="align-middle">
                                <b>{{\Carbon\Carbon::parse($quality->vencimento)->format('d/m/Y')}}</b></td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <!-- /.card-body -->
        <div class="card-footer text-center">
            Pherfil | Pherfiltec
        </div>
        <!-- /.card-footer-->

@endsection
