<?php 
require ROOT.'/view/head.php';
?>

<div class="container admin-name-container">
	<h2><?= $user['name']; ?></h2>
</div>

<div class="container">
	<div class="admin-exit-btn">Вихід</div>
</div>

<div class="container">
	<input type="search" name="" class="admin-search" placeholder="Пошук">
</div>

<div class="container">
	<div class="admin-refresh-btn">Обновить</div>
</div>

<div class="container admin-search-container">
	<div class="admin-orders-container">
		
	</div>
</div>

<script type="text/javascript">
	
	let orders;

	$(document).ready(function(e){

		function viewOrders(filter)
		{
			let arr = orders;
			if (filter || !isNaN(filter))
			{
				arr = orders.filter( (item) =>
					item.address.includes(filter) ||
					item.name.includes(filter) ||
					item.phone.includes(filter) ||
					item.id.includes(filter) ||
					item.email.includes(filter)
				)
			}


			let text = arr.reduce( (res ,item) =>  res + 
				`<div class="admin-order">
					<div class="order-id">#${item.id}</div>
					<div class="order-name order-field">
						<span>Имя: </span>
						<input type="text" name="name" value="${item.name}">
					</div>
					<div class="order-address order-field">
						<span>Адрес: </span>
						<input type="text" name="address" value="${item.address}">
					</div>
					<div class="order-phone order-field">
						<span>Телефон: </span>
						<input type="phone" name="phone" value="${item.phone}">
					</div>
					<div class="order-email order-field">
						<span>Почта: </span>
						<input type="email" name="email" value="${item.email}">
					</div>
					<div class="order-complete-date order-field">
						<span>Дата выполнения заказа: </span>
						<input type="datetime-local" name="complete_time" value="${item.date_complete}">
					</div>
					<div class="order-price order-field">
						<span>Вартiсть: </span>
						<input type="number" name="price" value="${item.price}">
					</div>

					<div class="order-added-date order-field">
						<span>Дата додавання: </span>
						<span>${new Date(item.added_time).toLocaleString()} </span>
					</div>

					<div class="order-description order-field">
						<div>Опис: </div>
						<textarea>${item.description}</textarea>
					</div>

					<div class="admin-order-btn-container">
						<div class="admin-remove-btn" id="${item.id}">Видалити</div>
						<div class="admin-save-btn" id="${item.id}">Сохранить</div>
					</div>
				</div>
				`
				,"");

			$(".admin-orders-container").html(text);
		}

		function refresh_orders()
		{
			$.post("admin/orders",  function(data){
				orders = JSON.parse(data).reverse();
				viewOrders( $("input[type=search]").val());
			});
		}

		$(".admin-refresh-btn").click(function(e){
			refresh_orders();
		})

		refresh_orders();

		$(document).on("click",".admin-remove-btn", function(e){
			let id = $(e.target).attr("id");

			$.post("admin/remove", {id: id}, function(data){
				let res = JSON.parse(data);
				if (res.result)
				{
					refresh_orders();
				}
			});

		})

		$(document).on("click",".admin-save-btn", function(e){
			let id = $(e.target).attr("id");

			let name = $(e.target).parent().parent().find("input[name=name]").val();
			let email = $(e.target).parent().parent().find("input[name=email]").val();
			let address = $(e.target).parent().parent().find("input[name=address]").val();
			let phone = $(e.target).parent().parent().find("input[name=phone]").val();
			let price = $(e.target).parent().parent().find("input[name=price]").val();
			let complete_time = $(e.target).parent().parent().find("input[name=complete_time]").val();
			let description = $(e.target).parent().parent().find(".order-description textarea").val()

			$.post("admin/save", {id, name, email, address, phone, price, complete_time, description}, function(data){
				let res = JSON.parse(data);
				if (res.result)
				{
					refresh_orders();

				}
			});
			

		})

		$(".admin-exit-btn").click(function(e){
			$.post('admin/exit',function(e){
				document.location.reload();
			})
		})


	});


</script>
