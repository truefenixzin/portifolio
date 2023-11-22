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
                <h3 class="card-title">Atualizar os destaques do mês.</h3>
            </div>

            <div class="card-body">
                @error('success')
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('name')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('dtini')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('dtfim')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('cover')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('message')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('error')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Ops algo deu errado!</h5>
                    {{ $message }}
                </div>
                @enderror


                <div class="form-group">
                    <form action="{{route('admin.workers.update', $worker->id)}}" method="post" autocomplete="off"
                          enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="title">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{$worker->name}}">

                                <div class="row">
                                    <div class="col-4">
                                        <label for="dtini">Data Início:</label>
                                        <input type="date" class="form-control" name="dtini"
                                               value="{{\Carbon\Carbon::parse($worker->dtini)->format('Y-m-d')}}">
                                    </div>
                                    <div class="col-4">
                                        <label for="dtfim">Data Fim:</label>
                                        <input type="date" class="form-control" name="dtfim"
                                               value="{{\Carbon\Carbon::parse($worker->dtfim)->format('Y-m-d')}}">
                                    </div>
                                    <div class="col-4">
                                        <label>Meta Atingida:</label>
                                        <input type="number" class="form-control" name="meta" value="{{$worker->meta}}">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Mensagem:</label>
                                        <textarea class="form-control summernote" name="comments"
                                                  rows="6" style="resize: none">{{$worker->comments}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Imagem:</label>
                                <div class="form-input">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($worker->cover)}}"
                                         class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-success ">Salvar</button>
                            </div>
                    </form>
                    <div class="col-3 text-center">
                        <form action="{{route('admin.workers.destroy', $worker->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-lg  bg-gradient-danger ">Excluir</button>
                        </form>
                    </div>
                </div>
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
