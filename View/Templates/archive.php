<?php require_once '../../model/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - Archives</title>
    </head> 



		<h1>Archives</h1>
		

<?php


$stmt = $pdo->query("SELECT Month(date) as Month, Year(date) as Year,
post_title FROM posts ORDER BY date DESC");
// you will store current month here to control when the month changes
$currentMonth = 0;
// you will store current year here to control when the year changes
$currentYear = 0;
while($row = $stmt->fetch()){
    // if the year changes you have to display another year
    if($row['Year'] != $currentYear) {
        // reinitialize current month
        $currentMonth = 0;
        // display the current year
        echo "<li class=\"cl-year\">{$row['Year']}</li>";
        // change the current year
        $currentYear = $row['Year'];
    }
    // if the month changes you have to display another month
    if($row['Month'] != $currentMonth) {
        // display the current month
        $monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
        echo "<li class=\"cl-month\">$monthName</li>";
        // change the current month
        $currentMonth = $row['Month'];
    }
  // display posts within the current month
    $slug = 'a-'.$row['Month'].'-'.$row['Year'];
    echo "<li class=\"cl-posts\"><a href='$slug'>$monthName</a></li>";
    echo '<li class="cl-posts active"><a href="c-'.$row['post_slug'].'">'.$row['post_title'].'</a></li>';
}
?>
</ul>
</body>
</html> 
		


