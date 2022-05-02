<header>

	<div class="menu">
		<ul>
			<li class="logo">
				
      
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand" href="">
				<img src="icono.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
				Usuario: <?=session('id_cedula')?>
			</a>
			<li class="menu-item hidden"><a href="<?php echo base_url("/logout");?>" >Logout</a>
			</li>
		</ul>
	</div>

	<div class="heroe">

		<h1>Welcome to  My News Cover</h1>

		<h2>All your news in one single place</h2>

	</div>

</header>