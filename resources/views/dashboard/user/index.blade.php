
@extends('dashboard.master')

@section('content')
<div class="main-content-inner">
    <div class="page-content">

        <!-- /.page-header -->
        <div class="page-header">
            <h1>
                Usuários do sistema
            </h1>
        </div>
        <!-- /.page-header -->

        {{-- Tabela de usuarios --}}
        @if(count($users) != 0)
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                @csrf
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class="hidden-480">CPF</th>
                                        <th class="hidden-480">Email</th>
                                        <th>Nota Fiscal</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($records as $record)
                                        <tr id="tabela-invoice-{{ $record->id }}">
                                            <td>{{ $record->name }}</td>
                                            <td class="hidden-480" >{{ $record->cpf }}</td>
                                            <td class="hidden-480">{{ $record->email }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-grey btn-xs">
                                                    <i class="ace-icon glyphicon glyphicon-picture bigger-120"></i>
                                                </button>
                                            </td>
                                            <td id="tabela-invoice-status-{{ $record->id }}">
                                                @if (is_null($record->status))
                                                    <span class="label label-sm label-warning">Sem avaliação</span>
                                                @elseif($record->status)
                                                    <span class="label label-sm label-success">Aprovado</span>
                                                @else
                                                <span class="label label-sm label-danger">Reprovado</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{-- Menu de acoes tela cheia --}}
                                                <div class="hidden-sm hidden-xs btn-group">
                                                    <button class="btn btn-xs btn-success" onclick="alteraStatus('{{ $record->id }}', 1)">
                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                    </button>

                                                    <button class="btn btn-xs btn-danger" onclick="alteraStatus('{{ $record->id }}', 0)">
                                                        <i class="ace-icon fa fa-times bigger-120"></i>
                                                    </button>

                                                    <button class="btn btn-xs btn-warning" onclick="deletaRegistro('{{ $record->id }}')">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </button>
                                                </div>

                                                {{-- Menu de acoes mobile --}}
                                                <div class="hidden-md hidden-lg">
                                                    <div class="inline pos-rel">
                                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                                                    <span class="blue">
                                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                                                    <span class="green">
                                                                        <i class="ace-icon fa fa-times bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                                                    <span class="red">
                                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.span -->
                    </div><!-- /.row -->
                </div><!-- /.col -->
            </div>
        {{-- Sem registro de usuarios --}}
        @else
            <div class="alert alert-block alert-info">
                <p>
                    <strong>
                        Sem registros de usuários!
                    </strong>
                    <p>
                        Clique no botão para registrar um
                    </p>
                </p>

                <p>
                    <button type="button" onclick="window.location='{{ url("notas") }}'" class="btn btn-sm btn-info"><i class="ace-icon glyphicon glyphicon-pencil"></i> Registrar</button>
                </p>
            </div>
        @endif

    </div>
    <!-- /.page-content -->
</div>
@endsection


@push('scripts')
<script type="text/javascript">
    const urlRecord = "{{url('/dashboard/records')}}";

    // Ativando sidebar
    $('#sidebar-users').addClass('active')
    $('#sidebar-records').removeClass('active')
</script>
@endpush

