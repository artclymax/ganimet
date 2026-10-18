<?php 
$page = get_page_by_path('about', OBJECT, 'page');

$title = get_field('about_stats_title') ?: get_field('about_stats_title', $page) ?? '';
$list = get_field('about_stats_list') ?: get_field('about_stats_list', $page) ?? '';
?>
<?php if ($list): ?>
	<section class="section about-stats" id="about-stats">
		<div class="container about-stats__container">
			<h2 class="about-stats__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<ul class="about-stats__list">
				<?php foreach ($list as $item): ?>
					<li class="about-stats__item about-stats-item card-box">
						<?php if ($image = $item['image']): ?>
							<div class="about-stats-item__image">
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
						<div class="about-stats-item__content">
							<h3 class="about-stats-item__title">
								<?php echo esc_html($item['title']) ?>
							</h3>
							<div class="about-stats-item__descr descr">
								<?php echo wp_kses_post($item['descr']) ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>