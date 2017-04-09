<?php require_once '../../model/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - Archives</title>
    </head> 
<div id="wrapper">


		<h1>Blog</h1>
		<hr />
		<p><a href="./">Blog Index</a></p>

		<div id='main'>

<?php
try {

//collect month and year data
$month = $_GET['month'];
$year = $_GET['year'];

//set from and to dates
$from = date('Y-m-01 00:00:00', strtotime("$year-$month"));
$to = date('Y-m-31 23:59:59', strtotime("$year-$month"));


$stmt = $pdo->prepare('SELECT post_id FROM posts WHERE date >= :from AND date <= :to');
$stmt->execute(array(
':from' => $from,
':to' => $to
));

//pass number of records to
$pages->set_total($stmt->rowCount());

$stmt = $pdo->prepare('SELECT post_id, post_title, post_content, date FROM posts WHERE date >= :from AND date <= :to ORDER BY post_id '.$pages->get_limit());
$stmt->execute(array(
':from' => $from,
':to' => $to
));


echo $pages->page_links("a-$month-$year&");

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
			?>
</div>

		<div id='sidebar'>
			<?php require('sidebar.php'); ?>
		</div>

		<div id='clear'></div>

	</div>
</body>
</html>


