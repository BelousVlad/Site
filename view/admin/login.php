<?php 
require ROOT.'/view/head.php';

?>

<div class="container admin-wrapper">
	
	<div class="login-container">
		<div class="login-field">
			<input type="text" name="login" placeholder="Логiн">
		</div>
		<div class="login-field">
			<input type="password" name="password" placeholder="Пароль">
		</div>
		<div class="error-login-field"></div>

		<div class="login-btn">Вхiд</div>

	</div>

</div>

<script type="text/javascript">
	
	$(document).ready(function(e){
		$(".login-btn").click(function(e){

			let login = $("input[name=login]").val();
			let pass = $("input[name=password]").val();

			$.post("/admin/log", {login: login, password: pass}, function(data){
				console.log(data)
				if (data.status = 2) 
					document.location.reload();
			});

		});
	});

</script>
