<?php
$page = get_page_by_path('home', OBJECT, 'page');
$archive_var = '';
$archive = '';
if (is_archive()) {
	$archive_var = get_query_var('pagename') ?: get_query_var('post_type') ?? '';
	$archive = get_page_by_path($archive_var, OBJECT, 'page');
}
$label = get_field('why_us_label') ?: get_field('why_us_label', $archive) ?: get_field('why_us_label', $page) ?? '';
$title = get_field('why_us_title') ?: get_field('why_us_title', $archive) ?: get_field('why_us_title', $page) ?? '';
$descr = get_field('why_us_descr') ?: get_field('why_us_descr', $archive) ?: get_field('why_us_descr', $page) ?? '';
$list = get_field('why_us_list') ?: get_field('why_us_list', $archive) ?: get_field('why_us_list', $page) ?? '';

$class = $args['class'] ?? '';
$is_reverse = $args['is_reverse'] ?? false;
?>
<?php if ($list): ?>
	<section class="section why-us <?= esc_attr($class); ?>" id="why-us">
		<div class="container why-us__container grid-container <?php echo $is_reverse ? 'grid-container--reverse' : ''; ?>">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>
			<ul class="why-us__list grid">
				<?php foreach ($list as $item): ?>
					<li class="why-us__item why-us-item card-box">
						<div class="why-us-item__header">
							<?php if ($item['image']): ?>
								<div class="why-us-item__image">
									<?php echo wp_get_attachment_image(
										$item['image']['ID'],
										'large',
										false,
										array(
											'class' => 'img',
											'alt' => $item['image']['alt'] ?: $item['title']
										)
									); ?>
								</div>
							<?php endif; ?>
							<h3 class="why-us-item__title">
								<?php echo esc_html($item['title']) ?>
							</h3>
						</div>
						<div class="why-us-item__descr descr">
							<?php echo wp_kses_post($item['descr']) ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>