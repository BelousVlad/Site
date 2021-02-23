<?

class orderController{
	public function actionView()
	{
		$orders = $GLOBALS['db']->getTypes();

		require ROOT."/view/order/order.php";
	}
	public function actionSend()
	{
		$name = trim($_POST['name']);
		$phone = trim($_POST['phone']);
		$email = trim($_POST['email']);
		$address = trim($_POST['address']);
		$desc = trim($_POST['description']);
		$type = trim($_POST['type']);

		$obj = (object)[];

		if (empty($name)) {

			$obj->result = false;
			$obj->reason = "Введите имя";
		}
		else if (empty($address))
		{
			$obj->result = false;
			$obj->reason = "Введите имя";
		}
		else if (empty($phone))
		{
			$obj->result = false;
			$obj->reason = "Введите имя";
		}
		else if (empty($email))
		{
			$obj->result = false;
			$obj->reason = "Введите имя";
		}
		else if (empty($type))
		{
			$obj->result = false;
			$obj->reason = "Введите имя";
		}
		else{
			$res = $GLOBALS['db']->addOrder($address,$name,$phone,$email,$type,$desc);


			$obj->result = $res;

		}

		echo json_encode($obj);
	}
}

?>