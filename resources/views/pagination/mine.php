<?php
	$presenter = new Illuminate\Pagination\BootstrapThreePresenter($paginator);
?>

<?php if ($paginator->total() > 1): ?>
	<ul class="pager pagination-centered">
		<?php
			echo $presenter->getPreviousButton('<span class="glyphicon glyphicon-arrow-left"></span>');

			echo $presenter->getNextButton('<span class="glyphicon glyphicon-arrow-right"></span>');
		?>
	</ul>
<?php endif; ?>
