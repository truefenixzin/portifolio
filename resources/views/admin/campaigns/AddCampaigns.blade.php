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
                <h3 class="card-title">Casdastrar campanhas</h3>
            </div>

            <div class="card-body mx-auto">

                @error('success')
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                    {{ $message }}
                </div>
                @enderror

                @error('title')
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

                @error('comments')
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

                <form action="{{route('admin.campaigns.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="title">Título:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{old('title')}}">
                            </div>
                            <div class="col-6">
                                <label>Imagem:</label>
                                <div class="form-input">
                                    <input type="file" class="form-control" name="cover">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row content-center">
                            <div class="col-4">
                                <label for="nome">Data Início:</label>
                                <input type="date" class="form-control" name="dtini"
                                       value="{{old('dtini')}}">
                            </div>
                            <div class="col-lg-4">
                                <label for="nome">Data Fim:</label>
                                <input type="date" class="form-control" name="dtfim"
                                       value="{{old('dtfim')}}">
                            </div>
                            <div class="col-lg-4">
                                <label for="nome">Categoria:</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="Credores">Credores</option>
                                    <option value="Interna">Interna</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Descrição:</label>
                                <textarea class="form-control summernote"
                                          name="comments" rows="6">{{old('comments')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-lg btn-success bg-gradient-success ">Salvar</button>
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
