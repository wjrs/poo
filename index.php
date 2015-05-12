<?php
define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

for($i=0;$i<=9;$i++) {
    $c[$i] = new \wsj\Cliente\Types\ClientePF();
    $c[$i]->setNome("Nome do cliente ".$i);
    $c[$i]->setCpf(mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9));
    $c[$i]->setEmail("cliente".$i."@email.com");
    $c[$i]->setTelefone(mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9)."-".mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9));
    $c[$i]->grauImportancia(mt_rand(1,5));
    $c[$i]->setEndereco("Endereço do cliente ".$i);
    $c[$i]->enderecoCobranca("Endereço cobrança cliente ".$i);
    $clientes[] = $c[$i];
}
if($_REQUEST['ordem']=='asc') { ksort($clientes); }
if($_REQUEST['ordem']=='desc') { rsort($clientes);}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Clientes</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid"></div>
	</nav>

    <div class="container">
        <h1>Clientes</h1>
        <br>
        <br>
        <a href="index.php?ordem=desc">Ordenar Decrescente</a><br>
        <a href="index.php?ordem=asc">Ordenar Ascendente</a><br>
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Tipo Cliente</th>
                <th>Grau</th>
                <th>Cobrança</th>
            </tr>
            <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?=$cliente->getNome() ;?></td>
                <td><?=$cliente->getCpf() ;?></td>
                <td><?=$cliente->getEndereco() ;?></td>
                <td><?=$cliente->getTelefone() ;?></td>
                <td><?=$cliente->getEmail() ;?></td>
                <?php if($cliente instanceof \wsj\Cliente\Types\ClientePF): ?>
                        <td>Pessoa Física</td>
                <?php else: ?>
                        <td>Pessoa Jurídica</td>
                <?php endif; ?>
                <td><?=$cliente->getGrau() ;?></td>
                <td><?=$cliente->getEnd() ;?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

