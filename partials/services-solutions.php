<?php
$page = get_page_by_path('services', OBJECT, 'page');

$label = get_field('services_solutions_label') ?: get_field('services_solutions_label', $page->ID);
$title = get_field('services_solutions_title') ?: get_field('services_solutions_title', $page->ID);
$descr = get_field('services_solutions_descr') ?: get_field('services_solutions_descr', $page->ID);
$btn = get_field('services_solutions_btn') ?: get_field('services_solutions_btn', $page->ID);
$list = get_field('services_solutions_list') ?: get_field('services_solutions_list', $page->ID);

?>
<?php if ($list): ?>
	<section class="section services-solutions" id="services-solutions">
		<div class="container services-solutions__container grid-container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
			]); ?>
			<ul class="services-solutions__list">
				<?php foreach ($list as $item): ?>
					<li class="services-solutions__item services-solutions-item card-box">
						<?php if ($item['image']): ?>
							<div class="services-solutions-item__image image-box">
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
						<div class="services-solutions-item__content">
							<h3 class="services-solutions-item__title title-3">
								<?php echo esc_html($item['title']) ?>
							</h3>
							<?php if ($item['descr']): ?>
								<div class="services-solutions-item__descr descr">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>