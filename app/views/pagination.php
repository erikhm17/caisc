<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<ul class="pagination">
			<?php echo $presenter->render(); ?>
			</uk>
<?php endif; ?>