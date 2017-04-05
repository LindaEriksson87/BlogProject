
<!doctype html>
<html>
<head><title>Blog Homepage</title></head>
<body>
    
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Bloggers</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Login</a></li>
        </ul>
        
    </nav>

<h1>Welcome to our blog!</h1>

<p>Welcome paragraph goes here</p>

<div>
    <h2>Featured bloggers</h2>
    
    *carousel of featured bloggers random*
</div>

<aside>
    <h2>Latest posts</h2>
    
    <p>List of latest posts 
   
        	<?php // feed of latest posts
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('posts_per_page=5' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>

		<?php endwhile; ?>

		<?php if ($paged > 1) { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
			<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
		</nav>

		<?php } else { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
		</nav>

		<?php } ?>

		<?php wp_reset_postdata(); ?>
    </p>
    
    
</aside>



</body>
</html>

