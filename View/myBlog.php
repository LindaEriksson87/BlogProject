<?php
include '../controllers/display.php';
use function controllers\display\display;

require_once '../model/connection.php';

session_start();
?>
<h2>My blog</h2>

<?php echo Controllers\display\display('my_blog', ['post' => $post]); ?>
