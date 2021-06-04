@extends('dashboard.master')

@section('content')
    <div class="main-content-inner">
        <div class="page-content">

            <!-- /.page-header -->
            <div class="page-header">
                <h1>
                    Editar Usuário
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    @if ($user->email == env('ADMIN_EMAIL', 'teste.admin@gmail.com'))
                        <div class="well">
                            <h4 class="green smaller lighter">Usuário adminstrativo</h4>
                            Como usuário administrativo, você não pode alterar suas credenciais,
                            acione o operador do sistema para ajudá-lo
                        </div>
                    @else

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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('dashboard/users/edit/' . $user->id) }}">
                            @csrf
                            <!-- #section:elements.form -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nome </label>

                                <div class="col-sm-9">
                                    <input type="text" value="{{ $user->name }}" id="form-field-1" placeholder="Digite o nome aqui" name="name" required
                                        class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>

                                <div class="col-sm-9">
                                    <input type="email" id="email" value="{{ $user->email }}" placeholder="Digite o seu email aqui" name="email" required
                                        class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    @endif
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
