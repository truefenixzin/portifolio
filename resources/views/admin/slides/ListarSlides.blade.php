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
                <h3 class="card-title">Listagem de Slides cadastrados</h3>
            </div>

            <div class="card-body">
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Data início</th>
                            <th>Data final</th>
                            <th>Imagem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slides as $slide)
                            <tr>
                                <td class="align-middle"><b>{{$slide->id}}</b></td>
                                <td class="align-middle"><b><a href="{{route('admin.slides.edit', $slide->id)}}">{{$slide->title}}</a></b></td>
                                <td class="align-middle"><b>{{\Carbon\Carbon::parse($slide->dtini)->format('d/m/Y')}}</b></td>
                                <td class="align-middle"><b>{{\Carbon\Carbon::parse($slide->dtfim)->format('d/m/Y')}}</b></td>
                                <td class="align-middle"><img src="{{\Illuminate\Support\Facades\Storage::url($slide->cover)}}" class="img-fluid img-thumbnail"></td>
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
