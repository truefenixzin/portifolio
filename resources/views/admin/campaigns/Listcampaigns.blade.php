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
                <h3 class="card-title">Campanhas cadastradas</h3>
            </div>

            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong>Atenção!</strong><br>
                Fique atento com a data final de exibição!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Texto</th>
                        <th>Data início</th>
                        <th>Data final</th>
                        <th>Categoria</th>
                        <th>Imagem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)

                        <tr>
                            <td class="align-middle"><b>{{$new->id}}</b></td>
                            <td class="align-middle"><a href="{{route('admin.campaigns.edit', $new->id)}}"><b>{{$new->title}}</b></a>
                            </td>
                            <td class="align-middle">{!! $new->description !!}</td>
                            <td class="align-middle">
                                <b>{{\Carbon\Carbon::parse($new->dtini)->format('d/m/Y')}}</b></td>
                            <td class="align-middle">
                                <b>{{\Carbon\Carbon::parse($new->dtfim)->format('d/m/Y')}}</b></td>
                            <td class="align-middle">{!! $new->category !!}</td>
                            <td class="align-middle ">
                                @if($new->dtfim < now())
                                    <div class="bg-danger mx-auto">
                                        @endif
                                        <img
                                            src="{{\Illuminate\Support\Facades\Storage::url($new->cover)}}"
                                            class="rounded-circle" width="140" height="140"></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>


            </div>

            <!-- /.card-body -->
            <div class="card-footer text-center">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

@endsection
