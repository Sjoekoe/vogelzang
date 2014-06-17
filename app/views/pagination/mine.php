<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);

	$trans = $environment->getTranslator();
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<ul class="pager pagination-centered">
		<?php
			echo $presenter->getPrevious('<span class="glyphicon glyphicon-arrow-left"></span>');

			echo $presenter->getNext('<span class="glyphicon glyphicon-arrow-right"></span>');
		?>
	</ul>
<?php endif; ?>
