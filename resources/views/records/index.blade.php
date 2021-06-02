<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova Prática Kingly Studio</title>

    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/records/css/reset.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/records/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/records/css/style.css')}}" />

	<!-- FONTS -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body class="pages register-page">
    <header>
        <div class="container">
            <a href="#" class="logo">
                Logo
            </a>
            <h1>Cadastro</h1>
        </div>
    </header>

    <main>
        <div class="container">

            <form class="form-horizontal" id="form-cadastro" role="form" method="POST" action="{{ route('records.record') }}" enctype="multipart/form-data">
                @csrf

	            <div class="form-group btns text-center">
	                <button type="button" id="newForm" class="btn-green-filled">Novo cadastro</button>
	            </div>

		        <div class="overlay col-md-6 col-md-offset-3">

	                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} text-center">
	                    <div class="col-xs-12">
	                        <label for="file" id="label-invoice" class="nf-add">Adicionar nota fiscal</label>
	                        <span class="check"><i class="fa fa-check"></i></span>
	                    </div>
                        <div id="error-message-file" class="error-message"></div>
	                    <div class=" text-left">
	                        <input id="file" type="file" name="invoice" accept="image/png, image/jpeg">
	                    </div>
	                    <input type="hidden" name="hasfile" value="true" />
	                </div>

		            <div class="form-group">
		                <label for="name" class=" control-label">Nome*</label>

		                <div class="">
		                    <input id="name" type="text" class="form-control" name="name"required>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="email" class=" control-label">E-mail*</label>

		                <div class="">
		                    <input id="email" type="email" class="form-control" name="email" required>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="email" class=" control-label">CPF*</label>

		                <div class="">
		                    <input id="cpf" type="text" class="form-control" name="cpf"  required>
		                </div>
		            </div>

		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">CEP*</label>

		                    <div class="">
		                        <input type="text" id="cep" class="form-control" name="cep" placeholder="00000-000"  required>
		                        <div id="spin" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>
                                <div id="error-message-cep" class="error-message">Cep informado não foi encontrado.</div>
		                    </div>
		                </div>
		            </div>
		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">Estado</label>

		                    <div class="">
		                        <input type="text" id="state" class="form-control cep-form" name="state" placeholder="" >
		                    </div>
		                </div>
		            </div>
		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">Cidade</label>

		                    <div class="">
		                        <input type="text" id="city" class="form-control cep-form" name="city" placeholder="" >
		                    </div>
		                </div>
		            </div>
		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">Endereço</label>

		                    <div class="">
		                        <input type="text" id="street" class="form-control cep-form" name="street" placeholder=""  >
		                    </div>
		                </div>
		            </div>
		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">Número*</label>

		                    <div class="">
		                        <input type="text" id="number" class="form-control cep-form" name="number" placeholder=""  required>
		                    </div>
		                </div>
		            </div>
		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">Complemento</label>

		                    <div class="">
		                        <input type="text" id="complement" class="form-control cep-form" name="complement" placeholder="" >
		                    </div>
		                </div>
		            </div>
		            <div class="">
		                <div class="form-group">
		                    <label class=" control-label">Bairro</label>

		                    <div class="">
		                        <input type="text" id="district" class="form-control cep-form" name="district" placeholder="" >
		                    </div>
		                </div>
		            </div>
		            <div class="form-group text-center">
		                <div class="checkbox">
		                    <label>
		                        <input type="checkbox" id="terms" name="terms"> Li e concordo com o regulamento
		                    </label>
		                </div>
                        <div id="error-message-terms" class="error-message">Para enviar, é necessário concordar com os termos</div>
		            </div>

		            <div class="form-group text-center">
		                <div class="">
		                    <button type="submit" class="btn-green">
		                        Enviar
		                    </button>
		                </div>
		            </div>
		        </div>

		    </form>
        </div>
    </main>
    <footer>
	    <section id="copyright">
	        <div class="container">
	            <h2>Guilherme</h2>
	        </div>
	    </section>
	</footer>

    <!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src={{asset("assets/records/js/lib/bootstrap.min.js") }}></script>
	<script type="text/javascript" src={{asset("assets/records/js/lib/mask.js") }}></script>
	<script type="text/javascript" src={{asset("assets/records/js/scripts/main.js") }}></script>

</body>
</html>
