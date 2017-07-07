<!DOCTYPE html> 
<html lang="pt-BR">
<head>
  	<title>SIGA - BETA</title>
  	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>


</head>

<body>

	<nav class="navbar navbar-inverse bg-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SIGA</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
				<ul class="nav navbar-nav">
					
					<li>
						<a href="<?php echo base_url(); ?>Base">Dashboard</a>
					</li>

					<li>
						<a href="<?php echo base_url(); ?>assignment">Chamados</a>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Meus Chamados<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li>
						<a href="<?php echo base_url(); ?>assignment/progress">Em Progresso</a>
						</li>
						<li>
						<a href="<?php echo base_url(); ?>assignment/open">Abertos</a>
						</li>
						<li>
						<a href="<?php echo base_url(); ?>assignment/completed">Concluídos</a>
						</li>
						</ul>
					</li>


					<!-- <li>
					<a href="<?php echo base_url(); ?>users">Usuários</a>
					</li> -->
				</ul>
									
				
				<ul class="nav navbar-nav navbar-right">

					<li><a href="<?php echo base_url(); ?>logout">Logout</a></li>

				</ul>
			</div>
		</div>
	</nav>