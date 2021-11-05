
<?php if ($_SERVER['REQUEST_METHOD']=== 'GET'):?>
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = filter_input(INPUT_GET, 'country',FILTER_SANITIZE_STRING,
FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<table>
<tr>
  <th>Name</th>
  <th>Continent</th>
  <th>Independence</th>
  <th>Head of State</th>

  <?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['continent'] ?></td>
    <td><?= $row['independence_year'] ?></td>
    <td><?= $row['head_of_state'] ?></td>
  </tr>
  <?php endforeach; ?>

</table>
<?php endif ?>