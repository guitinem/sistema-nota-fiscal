@extends('dashboard.master')

@section('content')
    <div class="main-content-inner">
        <div class="page-content">

            <!-- /.page-header -->
            <div class="page-header">
                <h1>
                    Criar Usuário
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    @isset($error_message)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>

                            <strong>
                                <i class="ace-icon fa fa-times"></i>
                                Ops.
                            </strong>
                            <p>
                            {{ $error_message }}
                            </p>
                        </div>
                    @endisset

                    @isset($success)
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>

                            <strong>
                                <i class="ace-icon fa fa-times"></i>
                                {{ $success }}
                            </strong>
                        </div>
                    @endisset
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard.user.create') }}">
                        @csrf
                        <!-- #section:elements.form -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nome </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Digite o nome aqui" name="name" required
                                    class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>

                            <div class="col-sm-9">
                                <input type="email" id="email" placeholder="Digite o seu email aqui" name="email" required
                                    class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="password"> Senha </label>

                            <div class="col-sm-9">
                                <input type="password" maxlength="18" minlength="6" name="password" id="password" placeholder="Digite sua senha aqui" required
                                    class="col-xs-10 col-sm-5" />
                                {{-- <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">Inline help text</span>
                            </span> --}}
                            </div>
                        </div>

                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.page-content -->
    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
        const urlRecord = "{{ url('/dashboard/records') }}";

        // Ativando sidebar
        $('#sidebar-users').addClass('active')
        $('#sidebar-records').removeClass('active')

    </script>
@endpush
