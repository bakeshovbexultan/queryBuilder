<?php

class QueryBuilder
{
	private $pdo;

	/**
	 * Описание: При созданий объекта запрашивает подключение к базе данных
	 * @param object $pdo (Подключение к базе данных)
	 *   
	**/
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	/**
	* Описание: Добавляет в базу данных строки
	* @param string $table (Имя таблицы в которую добавляются данные)
	* @param array $data (Данные для добавления в таблицу, в виде: ключ => значение, где ключ это столбец, значение это значение для этого столбца)
	**/
	public function insert($table, $data) {
		$keys = '(' . implode(', ', array_keys($data)) . ')';
		$values = '(:' . implode(', :', array_keys($data)) . ')';
		$sql = "INSERT INTO $table $keys VALUES $values";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}

	/**
	 * Описание: Получает строку по id
	 * Возвращает: массив с ключами
	 * @param string $table (Из какой таблицы берется строка)
	 * @param string $id (Сравнивая id получают строку)
	**/
	public function getOneById($table, $id) {
		$sql = "SELECT * FROM $table WHERE id = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;
	}


	/**
	 * Описание: Получает все строки из таблицы
	 * Возвращает: Все строки
	 * @param string $table (Из какой таблицы берутся строки)
	 **/
	public function getAll($table) {
		$sql = "SELECT * FROM $table";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	/**
	 * Описание: Обновляет строку, используя id
	 * @param string $table (В какой таблице произвести обновление)
	 * @param array $data (Какие данные необходимо обновить, передаются в виде ключ => значение, где ключ столбец, значение это значение)
	 * @param string $id (Используя id определяют в какой строке нужно обновить данные)
	 **/
	public function updateById($table, $data, $id) {
		$str = '';
		foreach ($data as $key => $line) {
			$str .= "$key = '$line', " ;
		}
		$str = rtrim($str, ', ');
		$sql = "UPDATE $table SET $str WHERE id = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute([
			'id' => $id,
		]);
	}

	/**
	 * Описание: Удаляет строку по id
	 * @param string $table (В какой таблице необходимо обновить)
	 * @param string $id (Используя id определяют какую строку удалить)
	 **/
	public function deleteById($table, $id) {
		$sql = "DELETE FROM $table WHERE id = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute([
			'id' => $id,
		]);
	}

}