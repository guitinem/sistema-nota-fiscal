<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova Prática Kingly Studio</title>

    <link rel="shortcut icon" href="{{ url('assets/images/layout/favicon.png?v=2') }}">

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
            <h1>Cadastro<p>Nota Fiscal</p></h1>
        </div>
    </header>

    <main>
        <div class="container">

            <div class="text-center">
		        <span class="success">Cadastro realizado com sucesso!</span>
		    </div>

            <div class="form-group btns text-center">
                <button type="submit" onclick="window.location='{{ url("notas/") }}'" class="btn-green-filled">Novo cadastro</button>
            </div>
        </div>
    </main>
    <footer class="footer-success">
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
