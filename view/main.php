<?php

require ROOT.'/view/header.php';

?>

<section>
	
	<h2 class="section-title">Що ми пропонуємо</h2>

	<div class="container">
		<div class="offer">
			<div class="offer-header">
				Фахівці
			</div>

			<div class="offer-content">
				<div class = "offer-field"> Величезний досвід </div>
				<div class = "offer-field"> Виключно конкурсний набір </div>
				<div class = "offer-field"> Кращі фахівці своєї справи </div>
			</div>

		</div>

		<div class="offer">
			<div class="offer-header">
				Качество
			</div>

			<div class="offer-content">
				<div class="offer-field">Новітнє обладнання</div>
				<div class="offer-field">Швидке виконання роботи</div>
				<div class="offer-field">Відповідність всім Європейським стандартам</div>
				<div class="offer-field">Регулярні консультації з провідними спецалістів при роботі з промисловими підприємствами</div>
			</div>

		</div>
		<div class="offer">
			<div class="offer-header">
				Сертифікація
			</div>

			<div class="offer-content">
				<div class="offer-field">ISO</div>
				<div class="offer-field">Міністерство охорони здоров'я України</div>
				<div class="offer-field">Державний комітет України з питань технічного регулювання та споживчої політики</div>
				<div class="offer-field">Ми надамо перераховані сертифікати при зверненні до нас на пошту</div>
			</div>

		</div>
		<div class="offer">
			<div class="offer-header">
				Досвід
			</div>

			<div class="offer-content">
				<div class="offer-field">Є досвід очищення величезних комплексів</div>
				<div class="offer-field">Співпрацювали з багатьма промисловими підприємствами</div>
				<div class="offer-field">Неодноразові очищали 5-ні готелі і величезні пентхауси світових зірок</div>
			</div>

		</div>
	</div>
</section>


<section class="scope-home-section">
	<div class="container scope-home-container">
		<div class="scope">
			<h3>Будинки і офіси</h3>
			<div class="scope-description">
				<ul>
					<li>Працюємо в приміщеннях будь-якого розміру і будь-якої складності</li>
					<li>Безкоштовний виїзд фахівця на об'єкт і розрахунок вартості</li>
				</ul>
				<div class="scope-img-container">
					<img src="sources/girl.png">
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container scope-factory-container">
		<div class="scope">
			<h3>Промислове підприємство</h3>
			<div class="scope-img-container">
				<img src="sources/worker.png">
			</div>
			<div class="scope-description">
				<ul>
					<li>Працюємо на підприємствах будь-якої спрямованості</li>
					<li>Безкоштовний виїзд фахівця на об'єкт і розрахунок вартості</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section>
	
	<div class="container">
		<a href="/order">
			<div class="order-btn">
				Замовити послуги
			</div>
		</a>
	</div>

</section>

<script type="text/javascript">
	$(document).ready(function(e){
		setLink("main-link");
	})
</script>

<?php

require ROOT.'/view/footer.php';

?>