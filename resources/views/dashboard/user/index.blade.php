
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
            <div id="main-content-users" class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                @csrf
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody-users">
                                    @foreach ($users as $user)
                                        <tr id="tabela-users-{{ $user->id }}">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-center">
                                                {{-- Menu de acoes tela cheia --}}
                                                <div class="hidden-sm hidden-xs btn-group">
                                                    <button class="btn btn-xs btn-warning" onclick="window.location='{{ url("dashboard/users/edit/") . '/' . $user->id }}'">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </button>

                                                    <button class="btn btn-xs btn-danger" onclick="deletaRegistro('{{ $user->id }}')">
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
                                                                <a  onclick="openEditUser('{{ $user->id }}')" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                                                    <span class="orange">
                                                                        <i class="ace-icon 	fa fa-pencil-square-o  bigger-120"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a onclick="deletaRegistro('{{ $user->id }}')"  class="tooltip-success" data-rel="tooltip" title="" data-original-title="Delete">
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
                    <button type="button" onclick="window.location='{{ url("dashboard/users/create") }}'" class="btn btn-sm btn-info"><i class="ace-icon glyphicon glyphicon-pencil"></i> Registrar</button>
                </p>
            </div>
        @endif

    </div>
    <!-- /.page-content -->
</div>
@endsection


@push('scripts')
<script type="text/javascript">
    const urlUserDelete = "{{url('/dashboard/users/delete')}}";
    const urlUserEdit = "{{url('dashboard/users/edit/')}}";

    // Ativando sidebar
    $('#sidebar-users').addClass('active')
    $('#sidebar-records').removeClass('active')

    function openEditUser(id) {
        window.location= urlUserEdit + `/${id}`
    }

    /**
     * Remove o registro do banco
     *
     * @param id Identificador no banco
     */
     function deletaRegistro(id) {
        bootbox.confirm({
                title: 'Deletar usuário?',
            message: `Deseja deletar este usuário?`,
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

                    fetch(urlUserDelete + `/${id}`, {
                        method: 'POST',
                        body: payload
                    })
                    .then(() => {
                        $(`#tabela-users-${id}`).remove();
                        if ($('#tbody-users').children().length == 0) {
                            $('#main-content-users').html('');
                            $('#main-content-users').html(`
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
                                        <button type="button" onclick="window.location='{{ url("dashboard/users/create") }}'" class="btn btn-sm btn-info"><i class="ace-icon glyphicon glyphicon-pencil"></i> Registrar</button>
                                    </p>
                                </div>
                            `);
                        }
                        bootbox.alert("Usuário deletado com sucesso!");
                    })
                }
            }
        });
    }
</script>
@endpush

