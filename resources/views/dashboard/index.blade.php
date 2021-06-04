
@extends('dashboard.master')

@section('content')
<div class="main-content-inner">
    <div class="page-content">

        <!-- /.page-header -->
        <div class="page-header">
            <h1>
                Registros de Notas Fiscais
            </h1>
        </div>
        <!-- /.page-header -->

        {{-- Tabela de notas fiscais --}}
        @if(count($records) != 0)
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
        {{-- Sem registro de notas fiscais --}}
        @else
            <div class="alert alert-block alert-info">
                <p>
                    <strong>
                        Sem registros de notas fiscais!
                    </strong>
                    <p>
                        Clique no botão para registrar uma nota fiscal
                    </p>
                </p>

                <p>
                    <button type="button" onclick="window.location='{{ url("notas") }}'" class="btn btn-sm btn-info"><i class="ace-icon glyphicon glyphicon-pencil"></i> Registrar</button>
                </p>
            </div>
        @endif

        {{-- Tabela de notas fiscais --}}
    </div>
    <!-- /.page-content -->
</div>
@endsection


@push('scripts')
<script type="text/javascript">
    const urlRecord = "{{url('/dashboard/records')}}";

    /**
     * Altera o status do registro da nota fiscal
     *
     * @param id Identificador no banco
     * @param status Novo status do registro
     *
     */
    function alteraStatus(id, status) {
        bootbox.confirm({
            message: `Deseja ${status ? 'aprovar' : 'reprovar'} está nota fiscal?`,
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result){
                    let payload = new FormData();
                    payload.append('status', status)
                    payload.append("_token", "{{ csrf_token() }}")

                    fetch(urlRecord + `/status/${id}`, {
                        method: 'POST',
                        body: payload
                    })
                    .then(response => response.json())
                    .then(json => {
                        $(`#tabela-invoice-status-${id}`).html(`
                        ${status ? '<span class="label label-sm label-success">Aprovado</span>' :
                        '<span class="label label-sm label-danger">Reprovado</span>'}`)
                    })
                }
            }
        });
    }

    /**
     * Remove o registro do banco
     *
     * @param id Identificador no banco
     */
    function deletaRegistro(id) {
        bootbox.confirm({
                title: 'Deletar nota fiscal',
            message: `Deseja deletar está nota fiscal?`,
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result){
                    let payload = new FormData();
                    payload.append("_token", "{{ csrf_token() }}")

                    fetch(urlRecord + `/${id}`, {
                        method: 'POST',
                        body: payload
                    })
                    .then(response => response.json())
                    .then(json => {
                        console.log('ok')
                    })
                }
            }
        });
    }
</script>
@endpush

