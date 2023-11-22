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
                <h3 class="card-title">Casdastrar destaques do mês</h3>
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

                <form action="{{route('admin.workers.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{old('name')}}">
                            </div>
                            <div class="col-6">

                                <label>Foto:</label>
                                <div class="form-input">
                                    <input type="file" class="form-control" name="cover">

                                </div>
                            </div>
                            <div class="col-6">
                                <label>Meta Atingida:</label>
                                <input type="number" class="form-control" name="meta" value="{{old('meta')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row content-center">
                            <div class="col-6">
                                <label for="nome">Data Início:</label>
                                <input type="date" class="form-control" name="dtini"
                                       value="{{old('dtini')}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="nome">Data Fim:</label>
                                <input type="date" class="form-control" name="dtfim"
                                       value="{{old('dtfim')}}">
                            </div>

                            <div class="col-12">
                                <label>Mensagem:</label>
                                <textarea class="form-control summernote" name="comments" rows="6"
                                          style="resize: none">{{old('comments')}}</textarea>

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
