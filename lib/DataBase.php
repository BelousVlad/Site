<?
class DataBase{



	public static $connection;

	public static function getConnection()
	{
		if (is_null($connection)) {
			$connection = mysqli_connect("localhost","root","root","clining");
		}
		return $connection;
	}

	public static function closeConnection(){
		if (!(is_null($connection))) {
			$connection->close();
		}
	}

	public function addOrder($address, $name,$phone,$email, $type, $desc)
	{
		$conn = self::getConnection();

		$stm = $conn->prepare("INSERT INTO orders (address,name,phone,email,type_id, description) VALUES(?,?,?,?,?,?)");

		$stm->bind_param("ssssis", $address, $name,$phone,$email, $type, $desc);

		$result = $stm->execute();

		return $result;
	}
	public function getOrders()
	{
		$conn = self::getConnection();

		$result = $conn->query("SELECT * FROM orders");

		$ans = array();

		while ($row = $result->fetch_assoc()) {
			array_push($ans, $row);
		}

		return $ans;
	}

	public function removeOrder($id)
	{
		$conn = self::getConnection();

		$stm = $conn->prepare("DELETE FROM orders WHERE id = ?");

		$stm->bind_param("i", $id);

		$result = $stm->execute();

		return $result;
	}

	public function updateOrder($id, $name, $email, $address, $phone, $price, $complete_time, $desc)
	{
		$conn = self::getConnection();
		
		$stm = $conn->prepare("UPDATE orders SET name = ?, email = ?, address= ? , phone = ?, price = ? ,`date_complete` = ?, `description` = ? WHERE id = ?");

		$stm->bind_param("ssssissi", $name, $email, $address, $phone, $price, $complete_time, $desc, $id);

		$result = $stm->execute();

		return $result;
	}

	public function getTypes()
	{
		$conn = self::getConnection();

		$result = $conn->query("SELECT * FROM place_type");

		$ans = array();

		while ($row = $result->fetch_assoc()) {
			array_push($ans, $row);
		}

		return $ans;
	}

	public function login($login, $password)
	{
		$conn = self::getConnection();

		$stm = $conn->prepare("SELECT * FROM admins WHERE login = ? AND password = ? LIMIT 1");

		$stm->bind_param("ss", $login, $password);

		$result = $stm->execute();

		if($result)
		{
			$result = $stm->get_result();

			return $result->fetch_assoc();
		}
		return NULL;

	}

}

?>