## Инициализация проекта
 
1. git clone git@github.com:AgreGAD/test-egg.git
2. cd test-egg
3. make deps
4. make up
5. Выполнить запросы из fixtures/init.sql
6. Запустить юнит тесты ./vendor/bin/phpunit

## Расположение заданий

#### Задание 1

```
1. Опишите, какие проблемы могут возникнуть при использовании данного кода
...
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
$id = $_GET['id'];
$res = $mysqli->query('SELECT * FROM users WHERE u_id='. $id);
$user = $res->fetch_assoc();
```

- Описание проблем здесь - https://github.com/AgreGAD/test-egg/blob/master/src/Task1BadMethod/BadMethod.php
- Интеграционный тест который проверяет работоспособность кода - https://github.com/AgreGAD/test-egg/blob/master/tests/Task1BadMethod/BadClassTest.php

#### Задание 2

```
2. Сделайте рефакторинг
...
$questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id='. $catId);
$result = array();
while ($question = $questionsQ->fetch_assoc()) {
	$userQ = $mysqli->query('SELECT name, gender FROM users WHERE id='. $question['user_id']);
	$user = $userQ->fetch_assoc();
	$result[] = array('question'=>$question, 'user'=>$user);
	$userQ->free();
}
$questionsQ->free();
...
```

- Код до рефакторинга - https://github.com/AgreGAD/test-egg/blob/master/src/Task2Refactoring/CodeBefore.php
- Код после рефакторинга - https://github.com/AgreGAD/test-egg/blob/master/src/Task2Refactoring/CodeAfter.php
- Интеграционный тест проверяющий корректность результата после рефакторинга - https://github.com/AgreGAD/test-egg/blob/master/tests/Task2Refactoring/RefactoringTest.php

#### Задание 3

```
3. Напиши SQL-запрос
Имеем следующие таблицы:
    1. users — контрагенты
        1. id
        2. name
        3. phone
        4. email
        5. created — дата создания записи
    2. orders — заказы
        1. id
        2. subtotal — сумма всех товарных позиций
        3. created — дата и время поступления заказа (Y-m-d H:i:s)
        4. city_id — город доставки
        5. user_id

Необходимо выбрать одним запросом следующее (следует учесть, что будет включена опция only_full_group_by в MySql):
    1. Имя контрагента
    2. Его телефон
    3. Сумма всех его заказов
    4. Его средний чек
    5. Дата последнего заказа
```

- Код содержащий запрос и его выполнение - https://github.com/AgreGAD/test-egg/blob/master/src/Task3SqlQuery/Query.php
- Интеграционный тест проверяющий работоспособность - https://github.com/AgreGAD/test-egg/blob/master/tests/Task3SqlQuery/QueryTest.php

#### Задание 4

```
4. Сделайте рефакторинг кода для работы с API чужого сервиса
...
function printOrderTotal(responseString) {
   var responseJSON = JSON.parse(responseString);
   responseJSON.forEach(function(item, index){
      if (item.price = undefined) {
         item.price = 0;
      }
      orderSubtotal += item.price;
   });
   console.log( 'Стоимость заказа: ' + total > 0? 'Бесплатно': total + ' руб.');
}
...
```

- Оставить исходный вариант не удалось, поскольку он нерабочий
- Код после рефакторинга - https://github.com/AgreGAD/test-egg/blob/master/web/test.js
- Веб страница для проверки - https://github.com/AgreGAD/test-egg/blob/master/web/test.html