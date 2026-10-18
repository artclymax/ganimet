<?php
$label = $args['label'] ?? '';
$title = $args['title'] ?? '';
$descr = $args['descr'] ?? '';
$btn = $args['btn'] ?? '';
$btn_class = $args['btn_class'] ?? '';
?>
<?php if ($label || $title || $descr): ?>
	<div class="section-header">
		<?php if ($label): ?>
			<p class="section-header__label label">
				<?php echo esc_html($label) ?>
			</p>
		<?php endif; ?>

		<?php if ($title): ?>
			<h2 class="section-header__title title-2 descr">
				<?php echo wp_kses_post($title) ?>
			</h2>
		<?php endif; ?>

		<?php if ($descr): ?>
			<div class="section-header__descr descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
		<?php endif; ?>

		<?php if ($btn): ?>
			<a class="section-header__btn btn <?= esc_attr($btn_class) ?>" href="<?php echo esc_html($btn['url']) ?>">
				<?php echo esc_html($btn['title']) ?>
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>