<?php  if (count($error_array) > 0) : ?>
  <div class="error">
  	<?php foreach ($error_array as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
