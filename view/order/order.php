
<?php

require ROOT.'/view/header.php';

?>

<section>
	<div class="container">
		<div class="order-container">

			<div class="order-loader-container">
				<div class="lds-facebook">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>

			<div class="success-container">
				<div class="success-checkmark">
					<div class="check-icon">
						<span class="icon-line line-tip"></span>
						<span class="icon-line line-long"></span>
						<div class="icon-circle"></div>
						<div class="icon-fix"></div>
					</div>
				</div>
			</div>

			<input type="text" name="name" placeholder="Ім'я або назва компанії">
			<input type="text" name="address" placeholder="Адреса">
			<input type="email" name="email" placeholder="Електронна пошта">
			<input type="phone" name="phone" placeholder="Номер телефону">
			<select name="type">
			 	<option></option>
			 	<? foreach($orders as $item): ?>

			 		<option value="<?= $item['id']; ?>"><?= $item['place']; ?></option>

			 	<? endforeach; ?>
			</select>
			<textarea class="order-description" placeholder="Краткое описание"></textarea>
			<div class="order-btn">Надіслати</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$(document).ready(function(e){
		setLink("order-link");

		function start_loader()
		{
			$(".order-loader-container").addClass("active")
		}
		function end_loader()
		{
			$(".order-loader-container").removeClass("active")
		}
		function success()
		{
			$(".success-container").addClass("active")
			$(".check-icon").hide();
			  setTimeout(function () {
			    $(".check-icon").show();
			  }, 10);
		}
		function validateEmail(email) {
		    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(String(email).toLowerCase());
		}
		function validatePhone(phone) {
		    const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
		    return re.test(String(phone).toLowerCase());
		}

		$('select').select2({
			minimumResultsForSearch: Infinity,
			id: 1,
			placeholder: "Выберите тип помещения"
		});

		$(".order-btn").click(function(e){
			let name = $("input[name=name]").val();
			let address = $("input[name=address]").val();
			let desc = $(".order-container textarea").val();
			let phone = $("input[name=phone]").val();
			let email = $("input[name=email]").val();
			let type = $("select").select2("data")[0].id;

			if (!name) {
				alert("Введіть ім'я або назва компанії")
			}
			else if (!address)
			{
				alert("Введіть адресу")
			}
			else if (!phone)
			{
				alert("Введіть номер телефону")
			}
			else if (!validatePhone(phone))
			{
				alert("Невірний номер телефону")
			}
			else if (!email)
			{
				alert("Введіть електронну пошту")
			}
			else if (!validateEmail(email))
			{
				alert("Невірна електронна пошта")
			}
			else if (!type)
			{
				alert("Вкажіть тип")
			}
			else
			{
				start_loader();
				$.post("order/send", {
					name: name,
					address : address,
					phone : phone,
					email : email,
					description : desc,
					type: type
				}, function(data){
					let ans = JSON.parse(data);
					if (ans.result)
					{
						end_loader();
						success();
					}
				});
			}


		})

	})
</script>


<?php

require ROOT.'/view/footer.php';

?>