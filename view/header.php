<?php require 'head.php'?>

<body>

<header>
	<div class="main-header-nav-bg">
	
		<div class="container main-header-container">

			<div class="logo">
				<i class="fas fa-broom"></i>
			</div>

			<div class="nav-container">
				<div class="nav-active-btn-container">				
					<div class="nav-active-btn">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>

				<nav>
					<ul>
						<a class="main-link" href="http://borisvlad/"><li>Головна</li></a>
						<a class="order-link" href="http://borisvlad/order"><li>Замовити</li></a>
					</ul>
				</nav>
			</div>

		</div>
	</div>


	<div class="container title-tagline-container">
		<div class="title"><?= $GLOBALS['company_title']; ?></div>
		<div class="tagline">Робимо справу чисто і швидко</div>
	</div>

	<video autoplay="true" loop muted="muted">
		<source src="sources/header.mp4" type="video/mp4">
	</video>


	<script type="text/javascript" src="js/header_anim.js">

	</script>

</header>
