# QueryBuilder

QueryBuilder используется для облегчения работы с sql.

## Usage

Необходимо создать объект pdo

require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=$host;dbname=$dbname', $login, $password);

$qb = new QueryBuilder($pdo);

## insert

Добавляет в базу данных строки

$qb->insert('users', ['name' => 'john', 'email' => 'john@example.com']);

## getOneById

Получает строку по id

$qb->getOneById('users', '14');

## getAll

Получает все строки из таблицы

$qb->getAll('users');

## updateById

$qb->updateById('users', ['name' => 'bob', 'email' => 'bob@example.com']);

## deleteById

$qb->deleteById('users', '14');

# Documentation

## Метод insert

Добавляет в базу данных строки

$qb->insert(string $table, array $data) : null

Table

Таблица в которую вы хотите добавить

Data

Массив с данными которые вы хотите добавить в базу данных

[
    $column => $data,
    $column1 => $data1,
]

Example:

[
    'name' => 'john,
    'email' => 'john@example.com',
]

---


## Метод getOneById

Получает строку по id

$qb->getOneById(string $table, string $id) : array

Table

Таблица из которой вы хотите получить строку

Id

Какую строку с id вы хотите получить

## getAll

Получает все строки из таблицы

$qb->getAll(string $table) : array

Table

Таблица из которой вы хотите получить все данные

## updateById

Обновляет строку по id

$qb->updateById(string $table, array $data, string $id) : null

Table

В какой таблице произвести обновление

Data

Какие данные необходимо обновить, передаются в виде ключ => значение, где ключ столбец, значение это значение

[
    $column => $data,
    $column1 => $data1,
]

Example:

[
  'name' => 'bob',
  'email' => 'bob@example.com',
]

Id

Используя id определяют в какой строке нужно обновить данные

## deleteById

Удаляет строку по id

$qb->deleteById(string $table, string $id) : null

Table

В какой таблице необходимо обновить

Id

Используя id определяют какую строку удалить























































