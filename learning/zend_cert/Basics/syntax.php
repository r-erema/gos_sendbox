<pre>
<?php echo '<&#063;php' . PHP_EOL; ?>
<? echo '<&#063;' . PHP_EOL; ?>
<?= '<&#063;=' . PHP_EOL; ?>
<script language="php">echo '&lt;script language="php"&gt;&lt;/script&gt;' . PHP_EOL;</script>
<%= '&lt;%'  . PHP_EOL; %>

<?php //comment?>not comment
<?php #comment?>not comment

<?php echo (3324.5.'8') . PHP_EOL; ?>
<?php echo 1, 'dsf', 5, PHP_EOL; ?>
<?php print 1 . PHP_EOL; ?>
<?php print (3 . PHP_EOL); ?>

<?php echo 7E1 . PHP_EOL; ?>

<?php var_dump((bool) ''); ?>
<?php var_dump((bool) '0'); ?>
<?php var_dump((bool) '001'); ?>
<?php var_dump((bool) -1); ?>
<?php var_dump((bool) 0); ?>
<?php var_dump((bool) 1e3); ?>
<?php var_dump((bool) null); ?>

</pre>