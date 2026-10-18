<?php
$page = get_page_by_path('home', OBJECT, 'page');
$archive_var = '';
$archive = '';
if (is_archive()) {
	$archive_var = get_query_var('pagename') ?: get_query_var('post_type') ?? '';
	$archive = get_page_by_path($archive_var, OBJECT, 'page');
}
$label = get_field('section_implementation_label') ?: get_field('section_implementation_label', $archive) ?: get_field('section_implementation_label', $page) ?? '';
$title = get_field('section_implementation_title') ?: get_field('section_implementation_title', $archive)  ?: get_field('section_implementation_title', $page) ?? '';
$descr = get_field('section_implementation_descr') ?: get_field('section_implementation_descr', $archive) ?: get_field('section_implementation_descr', $page) ?? '';
$list = get_field('section_implementation_list') ?: get_field('section_implementation_list', $archive) ?: get_field('section_implementation_list', $page) ?? '';
$type = get_field('section_implementation_type') ?: get_field('section_implementation_type', $archive) ?: get_field('section_implementation_type', $page) ?? '';
?>
<?php if ($list): ?>
	<section class="section section-implementation section-implementation--<?= esc_attr($type) ?>"
		id="section-implementation">
		<div class="container section-implementation__container grid-container grid-container--reverse">

			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>

			<ul class="section-implementation__list grid">
				<?php foreach ($list as $item): ?>
					<li class="section-implementation__item section-implementation-item card-box">
						<?php if ($item['image']): ?>
							<div class="section-implementation-item__image image-box">
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
						<div class="section-implementation-item__content">
							<h3 class="section-implementation-item__title title-4">
								<?php echo esc_html($item['title']) ?>
							</h3>
							<div class="section-implementation-item__descr descr">
								<?php echo wp_kses_post($item['descr']) ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>