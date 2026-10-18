<?php
$page = get_page_by_path('about', OBJECT, 'page');

$title = get_field('about_services_title') ?: get_field('about_services_title', $page) ?? '';
$list = get_field('about_services_list') ?: get_field('about_services_list', $page) ?? '';
?>
<?php if ($list): ?>
	<section class="section about-services" id="about-services">
		<div class="container about-services__container">
			<h2 class="about-services__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<ul class="about-services__list grid">
				<?php foreach ($list as $item): ?>
					<li class="about-services__item about-services-item card-box">
						<?php if ($item['image']): ?>
							<div class="about-services-item__image image-box">
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
						<div class="about-services-item__content">
							<h3 class="about-services-item__title title-3">
								<?php echo esc_html($item['title']) ?>
							</h3>
							<div class="about-services-item__descr descr">
								<?php echo wp_kses_post($item['descr']) ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>