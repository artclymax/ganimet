<?php
$page = 'option';

$phones = get_field('contacts_phones', $page) ?? '';
$time = get_field('contacts_time', $page) ?? '';
$addresses = get_field('contacts_addresses', $page) ?? '';
$emails = get_field('contacts_emails', $page) ?? '';

$btn = get_field('header_btn', $page) ?? [];
$header_phone = get_field('header_phone', $page) ?: $phones[0]['phone'] ?? '';
$header_messengers = get_field('header_messengers', $page) ?: $phones[0]['messengers'] ?? '';
?>

<header class="header" data-auto-calc="header, height">
	<div class="container header__container">
		<!-- LOGO -->
		<div class="header__logo logo">
			<?php mx_logo(); ?>
		</div>

		<!-- MENU -->
		<nav class="header__menu header-menu">
			<button class="header-menu__close-btn menu-close-btn visible-tablet" type="button" aria-label="Закрыть меню">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M18.75 6.81984L17.1802 5.25L12 10.4302L6.81984 5.25L5.25 6.81984L10.4302 12L5.25 17.1802L6.81984 18.75L12 13.5698L17.1802 18.75L18.75 17.1802L13.5698 12L18.75 6.81984Z"
						fill="currentColor" />
				</svg>
			</button>
			<div class="header-menu__wrapper">
				<div class="header-menu__item">
					<h3 class="header-menu__title visible-tablet">
						Навигация
					</h3>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'header-menu',
						'container' => false,
						'menu_class' => 'header-menu__list',
						'depth' => 1,
						'fallback_cb' => false
					));
					?>
				</div>

				<div class="header-menu__contacts-box visible-tablet">
					<?php get_template_part('partials/contacts-box'); ?>
					<!-- BTN -->
					<?php if ($btn): ?>
						<a class="header-menu__btn btn" href="<?php echo esc_html($btn['url']) ?>">
							<?php echo esc_html($btn['title']) ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</nav>

		<?php if ($btn || $header_messengers): ?>
			<div class="header__btn-box hidden-tablet">
				<?php if ($header_messengers): ?>
					<ul class="header__messengers contacts-box__sublist">
						<?php foreach ($header_messengers as $msg): ?>
							<li class="contacts-box__subitem">
								<a class="contacts-box__sublink link-icon" href="<?php echo esc_attr($msg['link']) ?>" aria-label="<?= esc_attr($msg['title']) ?>">
									<?php echo wp_get_attachment_image($msg['image']['ID'], 'large', false, ['class' => 'img', 'alt' => $msg['image']['alt'] ?: $msg['title']]); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<!-- BTN -->
				<?php if ($btn): ?>
					<a class="header__btn btn btn--dark" href="<?php echo esc_html($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<!-- VISIBLE MOBILE PHONE -->
		<?php if ($header_phone): ?>
			<a class="header__phone-btn phone-btn visible-tablet" aria-label="Телефон"
				href="tel:+<?php echo esc_attr(correct_phone($header_phone)); ?>">
				<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M24.9993 18.9686V22.5816C25.0006 22.917 24.9318 23.249 24.7971 23.5563C24.6625 23.8636 24.465 24.1395 24.2174 24.3662C23.9698 24.593 23.6774 24.7656 23.359 24.873C23.0407 24.9805 22.7033 25.0204 22.3686 24.9902C18.6554 24.5875 15.0885 23.3212 11.9547 21.293C9.03906 19.4439 6.56712 16.9769 4.7144 14.067C2.67503 10.9252 1.40589 7.34809 1.00979 3.62554C0.979639 3.29251 1.0193 2.95685 1.12624 2.63995C1.23319 2.32305 1.40508 2.03185 1.63097 1.78488C1.85686 1.53791 2.1318 1.34059 2.43829 1.20548C2.74478 1.07037 3.0761 1.00043 3.41115 1.00012H7.03129C7.61692 0.994364 8.18466 1.20133 8.62869 1.58245C9.07273 1.96356 9.36276 2.49281 9.44472 3.07155C9.59752 4.22778 9.88089 5.36305 10.2894 6.4557C10.4518 6.88675 10.4869 7.35522 10.3907 7.8056C10.2944 8.25597 10.0708 8.66938 9.7464 8.99682L8.21387 10.5263C9.9317 13.5414 12.4331 16.0378 15.4542 17.7522L16.9867 16.2228C17.3148 15.899 17.729 15.6758 18.1803 15.5798C18.6315 15.4837 19.1009 15.5188 19.5328 15.6808C20.6277 16.0885 21.7652 16.3713 22.9237 16.5238C23.5099 16.6064 24.0452 16.901 24.4279 17.3518C24.8106 17.8026 25.0139 18.378 24.9993 18.9686Z"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		<?php endif; ?>

		<!-- BURGER -->
		<button class="header__burger-btn burger-btn-icon header-mobile-btn visible-tablet" type="button"
			aria-label="Открыть/закрыть меню">
			<svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M21 18C21.5523 18 22 18.4477 22 19C22 19.5523 21.5523 20 21 20H1C0.447715 20 0 19.5523 0 19C0 18.4477 0.447715 18 1 18H21ZM21 12C21.5523 12 22 12.4477 22 13C22 13.5523 21.5523 14 21 14H1C0.447715 14 0 13.5523 0 13C0 12.4477 0.447715 12 1 12H21ZM21 6C21.5523 6 22 6.44772 22 7C22 7.55228 21.5523 8 21 8H1C0.447715 8 0 7.55228 0 7C0 6.44772 0.447715 6 1 6H21ZM21 0C21.5523 0 22 0.447715 22 1C22 1.55228 21.5523 2 21 2H1C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0H21Z"
					fill="currentColor" />
			</svg>

		</button>
	</div>
</header>