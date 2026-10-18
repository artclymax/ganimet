<?php
$page = 'option';
$modals = get_field('modals', $page) ?? [];
?>

<?php if ($modals): ?>
	<?php foreach ($modals as $item):
		// Санитизация ID: только латиница, цифры, дефис, нижнее подчёркивание
		$raw_id = $item['id'] ?? '';
		$id = preg_replace('/[^a-z0-9\-_]/i', '', sanitize_title($raw_id));

		// Пропускаем итерацию, если после очистки ID пустой
		if (empty($id))
			continue;

		$title = $item['title'] ?? '';
		$descr = $item['descr'] ?? '';
		$shortcode = $item['shortcode'] ?? '';
		$image = $item['image'] ?? '';
		?>

		<!-- OVERLAY -->
		<div class="modal modal-<?= esc_attr($id) ?>" id="<?= esc_attr($id) ?>" data-modal
			style="--bg-modal: url('<?= esc_url($item['image']['url'] ?? '') ?>');">
			<!-- MODAL -->
			<div class="modal__box modal-call__box" data-modal-box>
				<!-- CLOSE-BTN -->
				<button class="modal__close-btn modal-close-btn" data-modal-close aria-label="Закрыть модальное окно"
					type="button">
					<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M22 4.125C31.8688 4.125 39.875 12.1312 39.875 22C39.875 31.8688 31.8688 39.875 22 39.875C12.1312 39.875 4.125 31.8688 4.125 22C4.125 12.1312 12.1312 4.125 22 4.125ZM22 6.875C13.65 6.875 6.875 13.65 6.875 22C6.875 30.35 13.65 37.125 22 37.125C30.35 37.125 37.125 30.35 37.125 22C37.125 13.65 30.35 6.875 22 6.875ZM26.5273 15.5273C27.0643 14.9904 27.9357 14.9904 28.4727 15.5273C29.0096 16.0643 29.0096 16.9357 28.4727 17.4727L23.9453 22L28.4727 26.5273C29.0096 27.0643 29.0096 27.9357 28.4727 28.4727C27.9357 29.0096 27.0643 29.0096 26.5273 28.4727L22 23.9453L17.4727 28.4727C16.9357 29.0096 16.0643 29.0096 15.5273 28.4727C14.9904 27.9357 14.9904 27.0643 15.5273 26.5273L20.0547 22L15.5273 17.4727C14.9904 16.9357 14.9904 16.0643 15.5273 15.5273C16.0643 14.9904 16.9357 14.9904 17.4727 15.5273L22 20.0547L26.5273 15.5273Z"
							fill="#A88445" />
					</svg>

				</button>
				<!-- BODY -->
				<div class="modal__body">
					<div class="modal__wrapper">
						<?php if ($title): ?>
							<h3 class="modal__title title-2" id="<?= esc_attr($id) ?>-title">
								<?php echo esc_html($title) ?>
							</h3>
						<?php endif; ?>
						<?php if ($descr): ?>
							<div class="modal__descr descr" id="<?= esc_attr($id) ?>-desc">
								<?php echo wp_kses_post($descr) ?>
							</div>
						<?php endif; ?>
						<?php if ($shortcode): ?>
							<div class="modal__form">
								<?php echo do_shortcode($shortcode) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>