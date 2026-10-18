<?php

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Контактные данные',
		'menu_title' => 'Контактные данные',
		'menu_slug' => 'opt-contacts',
	));

	//acf_add_options_page(array(
	//	'page_title' => 'Общие поля товаров',
	//	'menu_title' => 'Общие поля товаров',
	//	'menu_slug' => 'opt-products',
	//));

	acf_add_options_page(array(
		'page_title' => 'Шапка',
		'menu_title' => 'Шапка',
		'menu_slug' => 'opt-header',
	));

	acf_add_options_page(array(
		'page_title' => 'Подвал / Футер',
		'menu_title' => 'Подвал / Футер',
		'menu_slug' => 'opt-footer',
	));

	acf_add_options_page(array(
		'page_title' => 'Модальные окна',
		'menu_title' => 'Модальные окна',
		'menu_slug' => 'opt-modals',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница благодарности',
		'menu_title' => 'Страница благодарности',
		'menu_slug' => 'opt-thank_you',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница 404',
		'menu_title' => 'Страница 404',
		'menu_slug' => 'opt-page-404',
	));

}

// OPTIONS
add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// HEADER
	acf_add_local_field_group(array(
		'key' => 'group_header_settings',
		'title' => 'Поля шапки',
		'fields' => array(
			array(
				'key' => 'field_header_info_message',
				'name' => 'header_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			// Телефон
			array(
				'key' => 'field_header_phone',
				'label' => 'Телефон',
				'name' => 'header_phone',
				'type' => 'text',
				'instructions' => 'Если не указывать, по умолчанию, будет брать первый номер из контактных данных'
			),
			// messengers
			array(
				'key' => 'field_header_messengers',
				'label' => 'Мессенджеры',
				'name' => 'header_messengers',
				'type' => 'repeater',
				'instructions' => 'Если не указывать, по умолчанию, будет брать мессенджеры из первого номера из контактных данных',
				'sub_fields' => array(
					array(
						'key' => 'field_header_messengers_image',
						'label' => 'Картинка',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_header_messengers_link',
						'label' => 'Номер/ссылка',
						'name' => 'link',
						'type' => 'text',
					),
					array(
						'key' => 'field_header_messengers_title',
						'label' => 'Описание (для alt)',
						'name' => 'title',
						'type' => 'text',
					),
				)
			),
			// Кнопка
			array(
				'key' => 'field_header_btn',
				'label' => 'Кнопка в шапке',
				'name' => 'header_btn',
				'type' => 'link',
				'instructions' => 'Ссылка на модальное окно (якорь #modal-call) или страницу.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-header',
				),
			),
		),
	));

	// FOOTER
	acf_add_local_field_group(array(
		'key' => 'flds_opt_footer',
		'title' => 'Поля футера',
		'fields' => array(
			array(
				'key' => 'footer_info_message',
				'name' => 'footer_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки / футера.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'footer_descr',
				'name' => 'footer_descr',
				'label' => 'Описание',
				'type' => 'textarea',
				'new_lines' => 'wpautop',
				'rows' => 2,
			),
			array(
				'key' => 'footer_company',
				'name' => 'footer_company',
				'label' => 'Название компании',
				'type' => 'text',
			),
			array(
				'key' => 'footer_copy',
				'name' => 'footer_copy',
				'label' => 'Копирайт',
				'type' => 'text',
			),
			array(
				'key' => 'footer_links',
				'name' => 'footer_links',
				'label' => 'Ссылки',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'footer_links_link',
						'name' => 'footer_links_link',
						'label' => 'Ссылка',
						'type' => 'link',
					),
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-footer',
				),
			),
		),
	));

	// CONTACTS
	acf_add_local_field_group(array(
		'key' => 'group_contacts_page',
		'title' => 'Страница: Контакты',
		'fields' => array(
			array(
				'key' => 'field_contacts_tab_phones',
				'label' => 'Телефон',
				'name' => 'contacts_tab_phones',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_phones',
				'label' => 'Телефоны',
				'name' => 'contacts_phones',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_contact_phone_number',
				'button_label' => 'Добавить телефон',
				'sub_fields' => array(
					array(
						'key' => 'field_contact_phone_number',
						'label' => 'Номер телефона',
						'name' => 'phone',
						'type' => 'text',
					),
					array(
						'key' => 'field_contact_phone_messengers',
						'label' => 'Мессенджеры',
						'name' => 'messengers',
						'type' => 'repeater',
						'layout' => 'block',
						'collapsed' => 'field_messenger_title',
						'button_label' => 'Добавить мессенджер',
						'sub_fields' => array(
							array(
								'key' => 'field_messenger_image',
								'label' => 'Иконка',
								'name' => 'image',
								'type' => 'image',
								'return_format' => 'array',
							),
							array(
								'key' => 'field_messenger_link',
								'label' => 'Ссылка',
								'name' => 'link',
								'type' => 'text',
							),
							array(
								'key' => 'field_messenger_title',
								'label' => 'Название',
								'name' => 'title',
								'type' => 'text',
							)
						)
					)
				)
			),
			array(
				'key' => 'field_contacts_tab_email',
				'label' => 'Email',
				'name' => 'contacts_tab_email',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_emails',
				'label' => 'Email адреса',
				'name' => 'contacts_emails',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_contact_email_link',
				'button_label' => 'Добавить email',
				'sub_fields' => array(
					array(
						'key' => 'field_contact_email_link',
						'label' => 'Email',
						'name' => 'link',
						'type' => 'email',
					)
				)
			),
			array(
				'key' => 'field_contacts_tab_address_time',
				'label' => 'Адрес и время работы',
				'name' => 'contacts_tab_address_time',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_address',
				'label' => 'Адрес',
				'name' => 'contacts_address',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_contacts_time',
				'label' => 'Время работы',
				'name' => 'contacts_time',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_contacts_tab_section',
				'label' => 'Форма страницы контактов',
				'name' => 'contacts_tab_section',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_title_form',
				'label' => 'Заголовок формы',
				'name' => 'contacts_title_form',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_form',
				'label' => 'Шорткод формы',
				'name' => 'contacts_form',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_tab_map',
				'label' => 'Карта',
				'name' => 'contacts_tab_map',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_title_map',
				'label' => 'Заголовок карты',
				'name' => 'contacts_title_map',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_map',
				'label' => 'Карта',
				'name' => 'contacts_map',
				'type' => 'wysiwyg',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-contacts'
				)
			)
		),
		'menu_order' => 0,
	));

	// MODALS
	acf_add_local_field_group(array(
		'key' => 'group_opt_modals',
		'title' => 'Глобальные модальные окна',
		'fields' => array(
			array(
				'key' => 'field_modals_list',
				'label' => 'Список модальных окон',
				'name' => 'modals',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_modal_id',
				'button_label' => 'Добавить модальное окно',
				'sub_fields' => array(
					array(
						'key' => 'field_modal_id',
						'label' => 'ID модального окна',
						'name' => 'id',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 50,
						'instructions' => 'Только латиница, цифры, дефис. Пример: <code>order-form</code>. Используется в <code>id</code> и <code>data-modal</code>.',
						'prepend' => '#',
						'character_limit' => 50,
						'allow_custom' => 0,
					),
					array(
						'key' => 'field_modal_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_modal_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'wysiwyg',
					),
					array(
						'key' => 'field_modal_shortcode',
						'label' => 'Шорткод формы',
						'name' => 'shortcode',
						'type' => 'text',
						'placeholder' => '[contact-form-7 id="123"]',
						'instructions' => 'Вставьте шорткод форм (CF7, WPForms, Forminator и свой шорткод).',
					),
					array(
						'key' => 'field_modal_image',
						'label' => 'Фон',
						'name' => 'image',
						'type' => 'image',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-modals',
				),
			),
		),
	));

	// THANK YOU
	acf_add_local_field_group(array(
		'key' => 'flds_opt_thank_you',
		'title' => 'Страница благодарности',
		'fields' => array(
			array(
				'key' => 'field_thank_you_title',
				'name' => 'thank_you_title',
				'label' => 'Заголовок',
				'type' => 'text',
			),
			array(
				'key' => 'field_thank_you_descr',
				'name' => 'thank_you_descr',
				'label' => 'Описание',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_thank_you_btn',
				'name' => 'thank_you_btn',
				'label' => 'Кнопка',
				'type' => 'link',
			),
			array(
				'key' => 'field_thank_you_image',
				'name' => 'thank_you_image',
				'label' => 'Картинка',
				'type' => 'image',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-thank_you',
				),
			),
		),
	));

	// PAGE 404 
	acf_add_local_field_group(array(
		'key' => 'flds_opt_page_404',
		'title' => 'Страница благодарности',
		'fields' => array(
			array(
				'key' => 'field_page_404_title',
				'name' => 'page_404_title',
				'label' => 'Заголовок',
				'type' => 'text',
			),
			array(
				'key' => 'field_page_404_descr',
				'name' => 'page_404_descr',
				'label' => 'Описание',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_page_404_btn',
				'name' => 'page_404_btn',
				'label' => 'Кнопка',
				'type' => 'link',
			),
			array(
				'key' => 'field_page_404_image',
				'name' => 'page_404_image',
				'label' => 'Картинка',
				'type' => 'image',
			),
			array(
				'key' => 'field_page_404_image_404',
				'name' => 'page_404_image_404',
				'label' => 'Картинка c цифрой 404',
				'type' => 'image',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-page-404',
				),
			),
		),
	));

	// SECTIONS
});


add_action('acf/init', 'register_fields');
function register_fields()
{
	//! === HOME PAGE
	// hero + page
	acf_add_local_field_group(array(
		'key' => 'group_hero',
		'title' => 'Первый экран',
		'fields' => array(
			array(
				'key' => 'field_hero_title',
				'label' => 'Заголовок',
				'name' => 'hero_title',
				'type' => 'text'
			),
			array(
				'key' => 'field_hero_descr',
				'label' => 'Описание',
				'name' => 'hero_descr',
				'type' => 'wysiwyg'
			),
			array(
				'key' => 'field_hero_btn',
				'label' => 'Кнопка',
				'name' => 'hero_btn',
				'type' => 'link'
			),
			array(
				'key' => 'field_hero_image',
				'label' => 'Фон',
				'name' => 'hero_image',
				'type' => 'image'
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page'
				)
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 0,
	));
	// hero-home
	acf_add_local_field_group(array(
		'key' => 'group_hero_first_screen',
		'title' => 'Первый экран поля для главной',
		'fields' => array(
			array('key' => 'field_hero_label', 'label' => 'Надзаголовок', 'name' => 'hero_label', 'type' => 'text'),

			// Медиа-блок 1
			array(
				'key' => 'field_hero_media_first',
				'label' => 'Медиа-блок 1',
				'name' => 'hero_media_first',
				'type' => 'group',
				'sub_fields' => array(
					array('key' => 'field_hmf_img', 'label' => 'Изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
					array('key' => 'field_hmf_txt', 'label' => 'Текст', 'name' => 'text', 'type' => 'text')
				)
			),
			// Медиа-блок 2
			array(
				'key' => 'field_hero_media_second',
				'label' => 'Медиа-блок 2',
				'name' => 'hero_media_second',
				'type' => 'group',
				'sub_fields' => array(
					array('key' => 'field_hms_img', 'label' => 'Изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
					array('key' => 'field_hms_txt', 'label' => 'Текст', 'name' => 'text', 'type' => 'text')
				)
			),
			// Медиа-блок 3 (Цифра)
			array(
				'key' => 'field_hero_media_third',
				'label' => 'Медиа-блок 3 (Цифра)',
				'name' => 'hero_media_third',
				'type' => 'group',
				'sub_fields' => array(
					array('key' => 'field_hmt_num', 'label' => 'Число / Значение', 'name' => 'number', 'type' => 'text', 'placeholder' => '10+'),
					array('key' => 'field_hmt_txt', 'label' => 'Подпись', 'name' => 'text', 'type' => 'text')
				)
			),
			// Медиа-блок 4 (Только текст)
			array(
				'key' => 'field_hero_media_fourth',
				'label' => 'Медиа-блок 4 (Текст)',
				'name' => 'hero_media_fourth',
				'type' => 'group',
				'sub_fields' => array(
					array('key' => 'field_hfo_txt', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 3)
				)
			),
			// Медиа-блок 5
			array(
				'key' => 'field_hero_media_fifth',
				'label' => 'Медиа-блок 5',
				'name' => 'hero_media_fifth',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hfi_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
						'preview_size' => 'medium'
					),
					array(
						'key' => 'field_hfi_txt',
						'label' => 'Текст',
						'name' => 'text',
						'type' => 'text'
					)
				)
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php'
				)
			)
		),
		'menu_order' => 1,
	));
	//why-us + 
	acf_add_local_field_group(array(
		'key' => 'group_why_us_section',
		'title' => 'Секция: Почему выбирают нас',
		'fields' => array(
			array(
				'key' => 'field_why_us_label',
				'label' => 'Надзаголовок',
				'name' => 'why_us_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_why_us_title',
				'label' => 'Заголовок секции',
				'name' => 'why_us_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_why_us_descr',
				'label' => 'Описание секции',
				'name' => 'why_us_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_why_us_list',
				'label' => 'Список преимуществ',
				'name' => 'why_us_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_why_us_item_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => array(
					array(
						'key' => 'field_why_us_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_why_us_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_why_us_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				)
			),
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'archive-services.php'
				)
			)
		),
		'menu_order' => 2,
	));
	//section-implementation + 
	acf_add_local_field_group(array(
		'key' => 'group_section_implementation',
		'title' => 'Секция: Сферы применения',
		'fields' => array(
			array(
				'key' => 'field_impl_label',
				'label' => 'Надзаголовок',
				'name' => 'section_implementation_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_impl_title',
				'label' => 'Заголовок секции',
				'name' => 'section_implementation_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_impl_descr',
				'label' => 'Описание секции',
				'name' => 'section_implementation_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_impl_type',
				'label' => 'Модификатор секции (Вид карточек)',
				'name' => 'section_implementation_type',
				'type' => 'select',
				'choices' => array(
					'type-1' => 'Тип карточек 1',
					'type-2' => 'Тип карточек 2',
					'type-3' => 'Тип карточек 3',
				)
			),
			array(
				'key' => 'field_impl_list',
				'label' => 'Список сфер / Карточки',
				'name' => 'section_implementation_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_impl_item_title',
				'button_label' => 'Добавить карточку',
				'sub_fields' => array(
					array(
						'key' => 'field_impl_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_impl_item_title',
						'label' => 'Заголовок карточки',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_impl_item_descr',
						'label' => 'Описание карточки',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				)
			),
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'archive-services.php'
				)
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 3,
	));
	// how-to-order +
	acf_add_local_field_group(array(
		'key' => 'group_how_to_order_section',
		'title' => 'Секция: Как оформить заказ / Процесс работы',
		'fields' => array(
			array(
				'key' => 'field_hto_label',
				'label' => 'Надзаголовок',
				'name' => 'how_to_order_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_hto_title',
				'label' => 'Заголовок секции',
				'name' => 'how_to_order_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_hto_descr',
				'label' => 'Описание секции',
				'name' => 'how_to_order_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_hto_btn',
				'label' => 'Кнопка',
				'name' => 'how_to_order_btn',
				'type' => 'link',
			),
			array(
				'key' => 'field_hto_list',
				'label' => 'Список шагов',
				'name' => 'how_to_order_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_hto_item_title',
				'button_label' => 'Добавить шаг',
				'sub_fields' => array(
					array(
						'key' => 'field_hto_item_title',
						'label' => 'Заголовок шага',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_hto_item_descr',
						'label' => 'Описание шага',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				)
			),
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'archive-services.php'
				)
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			),
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-order.php'
				)
			)
		),
		'menu_order' => 4,
	));
	// section-portfolio +
	acf_add_local_field_group(array(
		'key' => 'group_section_portfolio',
		'title' => 'Секция: Примеры работ',
		'fields' => array(
			array(
				'key' => 'field_sp_label',
				'label' => 'Надзаголовок',
				'name' => 'section_portfolio_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_sp_title',
				'label' => 'Заголовок секции',
				'name' => 'section_portfolio_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_sp_descr',
				'label' => 'Описание секции',
				'name' => 'section_portfolio_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_sp_btn',
				'label' => 'Кнопка',
				'name' => 'section_portfolio_btn',
				'type' => 'link',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				)
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 5,
	));
	// faq
	acf_add_local_field_group(array(
		'key' => 'group_faq_home_section',
		'title' => 'Секция: Частые вопросы',
		'fields' => array(
			array(
				'key' => 'field_faq_label',
				'label' => 'Надзаголовок',
				'name' => 'faq_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_faq_title',
				'label' => 'Заголовок секции',
				'name' => 'faq_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_faq_descr',
				'label' => 'Описание секции',
				'name' => 'faq_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_faq_btn',
				'label' => 'Кнопка',
				'name' => 'faq_btn',
				'type' => 'link',
			),
			array(
				'key' => 'field_faq_list',
				'label' => 'Список вопросов',
				'name' => 'faq_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_faq_item_title',
				'button_label' => 'Добавить вопрос',
				'sub_fields' => array(
					array(
						'key' => 'field_faq_item_title',
						'label' => 'Вопрос',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_faq_item_descr',
						'label' => 'Ответ',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page'
				)
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 6,
	));
	// section-contacts-form
	acf_add_local_field_group(array(
		'key' => 'group_section_contacts_form',
		'title' => 'Секция: Обсудить задачу',
		'fields' => array(
			array(
				'key' => 'field_scf_label',
				'label' => 'Надзаголовок',
				'name' => 'section_contacts_form_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_scf_title',
				'label' => 'Заголовок секции',
				'name' => 'section_contacts_form_title',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
			),
			array(
				'key' => 'field_scf_descr',
				'label' => 'Описание секции',
				'name' => 'section_contacts_form_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_scf_form',
				'label' => 'Шорткод формы',
				'name' => 'section_contacts_form_form',
				'type' => 'text',
			),
			array(
				'key' => 'field_scf_image',
				'label' => 'Изображение',
				'name' => 'section_contacts_form_image',
				'type' => 'image',
				'return_format' => 'array',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page'
				)
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 7,
	));

	//! ABOUT
	// about-section
	acf_add_local_field_group(array(
		'key' => 'group_section_about_brief',
		'title' => 'Секция: Краткое описание',
		'fields' => array(
			array(
				'key' => 'field_sa_title',
				'label' => 'Заголовок секции',
				'name' => 'section_about_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_sa_descr',
				'label' => 'Описание секции',
				'name' => 'section_about_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_sa_image',
				'label' => 'Изображение секции',
				'name' => 'section_about_image',
				'type' => 'image',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-about.php'
				)
			)
		),
		'menu_order' => 0,
	));
	// about-stats
	acf_add_local_field_group(array(
		'key' => 'group_about_stats_section',
		'title' => 'Секция: Статистика',
		'fields' => array(
			array(
				'key' => 'field_ast_title',
				'label' => 'Заголовок секции',
				'name' => 'about_stats_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_ast_list',
				'label' => 'Список статистики',
				'name' => 'about_stats_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_ast_item_title',
				'button_label' => 'Добавить пункт',
				'sub_fields' => array(
					array(
						'key' => 'field_ast_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_ast_item_title',
						'label' => 'Заголовок / Значение',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_ast_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about.php'
				)
			)
		),
		'menu_order' => 3,
	));
	// about-services
	acf_add_local_field_group(array(
		'key' => 'group_about_services_section',
		'title' => 'Секция: Основные направления работы',
		'fields' => array(
			array(
				'key' => 'field_as_title',
				'label' => 'Заголовок секции',
				'name' => 'about_services_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_as_list',
				'label' => 'Список направлений',
				'name' => 'about_services_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_as_item_title',
				'button_label' => 'Добавить направление',
				'sub_fields' => array(
					array(
						'key' => 'field_as_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_as_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_as_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about.php'
				)
			)
		),
		'menu_order' => 4,
	));
	// about-benefits
	acf_add_local_field_group(array(
		'key' => 'group_about_benefits_section',
		'title' => 'Секция: Преимущества и мини-галерея',
		'fields' => array(
			array(
				'key' => 'field_ab_first_col',
				'label' => 'Первая колонка',
				'name' => 'about_benefits_first_col',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_ab_fc_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_ab_fc_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'wysiwyg',
					)
				)
			),
			array(
				'key' => 'field_ab_second_col',
				'label' => 'Вторая колонка',
				'name' => 'about_benefits_second_col',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_ab_sc_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_ab_sc_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'wysiwyg',
					)
				)
			),
			array(
				'key' => 'field_ab_gallery',
				'label' => 'Галерея',
				'name' => 'about_benefits_gallery',
				'type' => 'gallery',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about.php'
				)
			)
		),
		'menu_order' => 6,
	));


	//! SERVICES
	acf_add_local_field_group(array(
		'key' => 'group_hero_page_section',
		'title' => 'Первый экран: Страницы услуг',
		'fields' => array(
			array(
				'key' => 'field_hp_media_first',
				'label' => 'Медиа-блок 1',
				'name' => 'hero_media_first',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm1_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm1_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			),
			array(
				'key' => 'field_hp_media_second',
				'label' => 'Медиа-блок 2',
				'name' => 'hero_media_second',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm2_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm2_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			),
			array(
				'key' => 'field_hp_media_third',
				'label' => 'Медиа-блок 3',
				'name' => 'hero_media_third',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm3_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm3_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'archive-services.php'
				)
			)
		),
		'menu_order' => 2,
	));
	// services-section
	acf_add_local_field_group(array(
		'key' => 'group_services_section',
		'title' => 'Секция: Список услуг',
		'fields' => array(
			array(
				'key' => 'field_ss_title',
				'label' => 'Заголовок секции',
				'name' => 'services_section_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_ss_btn',
				'label' => 'Текст кнопки',
				'name' => 'services_section_btn',
				'type' => 'text',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'archive-services.php'
				)
			)
		),
		'menu_order' => 3,
	));
	// services-solutions
	acf_add_local_field_group(array(
		'key' => 'group_services_solutions',
		'title' => 'Секция: Подбор решения',
		'fields' => array(
			array(
				'key' => 'field_services_solutions_label',
				'label' => 'Надзаголовок',
				'name' => 'services_solutions_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_services_solutions_title',
				'label' => 'Заголовок секции',
				'name' => 'services_solutions_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_services_solutions_descr',
				'label' => 'Описание секции',
				'name' => 'services_solutions_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_services_solutions_list',
				'label' => 'Список решений',
				'name' => 'services_solutions_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_services_solutions_item_title',
				'button_label' => 'Добавить решение',
				'sub_fields' => array(
					array(
						'key' => 'field_services_solutions_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_services_solutions_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_services_solutions_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'archive-services.php'
				)
			)
		),
		'menu_order' => 4,
	));
	// single-services-content-title
	acf_add_local_field_group(array(
		'key' => 'group_single_service_content_title',
		'title' => 'Заголовок контента',
		'fields' => array(
			array(
				'key' => 'field_single_service_content_title',
				'label' => 'Заголовок',
				'name' => 'single_service_content_title',
				'type' => 'text',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 0,
	));
	// single_service_benefits
	acf_add_local_field_group(array(
		'key' => 'group_single_service_benefits',
		'title' => 'Секция: Преимущества услуги',
		'fields' => array(
			array(
				'key' => 'field_ssb_label',
				'label' => 'Надзаголовок',
				'name' => 'single_service_benefits_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_ssb_title',
				'label' => 'Заголовок секции',
				'name' => 'single_service_benefits_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_ssb_descr',
				'label' => 'Описание секции',
				'name' => 'single_service_benefits_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_ssb_list',
				'label' => 'Список преимуществ',
				'name' => 'single_service_benefits_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_ssb_item_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => array(
					array(
						'key' => 'field_ssb_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_ssb_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_ssb_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services'
				)
			)
		),
		'menu_order' => 5,
	));

	//! PORTFOLIO
	acf_add_local_field_group(array(
		'key' => 'group_hero_portfolio_media',
		'title' => 'Первый экран: Портфолио (Медиа-блоки)',
		'fields' => array(
			array(
				'key' => 'field_hpm_first',
				'label' => 'Медиа-блок 1',
				'name' => 'hero_media_first',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm_f_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm_f_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			),
			array(
				'key' => 'field_hpm_second',
				'label' => 'Медиа-блок 2',
				'name' => 'hero_media_second',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm_s_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm_s_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			),
			array(
				'key' => 'field_hpm_third',
				'label' => 'Медиа-блок 3',
				'name' => 'hero_media_third',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm_t_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm_t_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			),
			array(
				'key' => 'field_hpm_fourth',
				'label' => 'Медиа-блок 4',
				'name' => 'hero_media_fourth',
				'type' => 'group',
				'sub_fields' => array(
					array(
						'key' => 'field_hpm_fo_img',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hpm_fo_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'archive-portfolio.php'
				)
			)
		),
		'menu_order' => 0,
	));
	acf_add_local_field_group([
		'key' => 'group_portfolio_cat_fields',
		'title' => 'Настройки категории портфолио',
		'fields' => [
			[
				'key' => 'field_portfolio_cat_thumb',
				'label' => 'Изображение категории',
				'name' => 'portfolio_category_thumb',
				'type' => 'image',
			],
		],
		'location' => [
			[
				['param' => 'taxonomy', 'operator' => '==', 'value' => 'portfolio_category'],
			],
		],
		'menu_order' => 0,
		'position' => 'normal',
	]);
	acf_add_local_field_group(array(
		'key' => 'group_page_portfolio_section',
		'title' => 'Страница: Портфолио',
		'fields' => array(
			array(
				'key' => 'field_pp_label',
				'label' => 'Надзаголовок',
				'name' => 'page_portfolio_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_pp_title',
				'label' => 'Заголовок секции',
				'name' => 'page_portfolio_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_pp_descr',
				'label' => 'Описание секции',
				'name' => 'page_portfolio_descr',
				'type' => 'wysiwyg',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'archive-portfolio.php'
				)
			)
		),
		'menu_order' => 0,
	));

	//! ORDER
	// order calc data
	acf_add_local_field_group(array(
		'key' => 'group_order_calc_data',
		'title' => 'Секция: Данные заказа',
		'fields' => array(
			array(
				'key' => 'field_ocd_label',
				'label' => 'Надзаголовок',
				'name' => 'order_calc_data_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_ocd_title',
				'label' => 'Заголовок секции',
				'name' => 'order_calc_data_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_ocd_descr',
				'label' => 'Описание секции',
				'name' => 'order_calc_data_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_ocd_btn',
				'label' => 'Кнопка',
				'name' => 'order_calc_data_btn',
				'type' => 'link',
			),
			array(
				'key' => 'field_ocd_list',
				'label' => 'Список пунктов',
				'name' => 'order_calc_data_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_ocd_item_title',
				'button_label' => 'Добавить пункт',
				'sub_fields' => array(
					array(
						'key' => 'field_ocd_item_image',
						'label' => 'Заголовок',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_ocd_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_ocd_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-order.php'
				)
			)
		),
		'menu_order' => 5,
	));
	// order don't have template
	acf_add_local_field_group(array(
		'key' => 'group_dont_have_template',
		'title' => 'Секция: Если нет готового макета',
		'fields' => array(
			array(
				'key' => 'field_dht_label',
				'label' => 'Надзаголовок',
				'name' => 'dont_have_template_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_dht_title',
				'label' => 'Заголовок секции',
				'name' => 'dont_have_template_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_dht_descr',
				'label' => 'Описание секции',
				'name' => 'dont_have_template_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_dht_btn',
				'label' => 'Кнопка',
				'name' => 'dont_have_template_btn',
				'type' => 'link',
			),
			array(
				'key' => 'field_dht_list',
				'label' => 'Список пунктов',
				'name' => 'dont_have_template_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_dht_item_title',
				'button_label' => 'Добавить пункт',
				'sub_fields' => array(
					array(
						'key' => 'field_dht_item_image',
						'label' => 'Картинка',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_dht_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_dht_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-order.php'
				)
			)
		),
		'menu_order' => 6,
	));
	// order-payment
	acf_add_local_field_group(array(
		'key' => 'group_payment_delivery_orders',
		'title' => 'Секция: Оплата и доставка',
		'fields' => array(
			array(
				'key' => 'field_pd_label',
				'label' => 'Надзаголовок',
				'name' => 'payment_delivery_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_pd_title',
				'label' => 'Заголовок секции',
				'name' => 'payment_delivery_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_pd_descr',
				'label' => 'Описание секции',
				'name' => 'payment_delivery_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_pd_btn',
				'label' => 'Кнопка',
				'name' => 'payment_delivery_btn',
				'type' => 'link',
			),
			array(
				'key' => 'field_pd_list',
				'label' => 'Список пунктов',
				'name' => 'payment_delivery_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_pd_item_title',
				'button_label' => 'Добавить пункт',
				'sub_fields' => array(
					array(
						'key' => 'field_pd_item_image',
						'label' => 'Картинка',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_pd_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_pd_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					)
				)
			),
			array(
				'key' => 'field_pd_small',
				'label' => 'Доп. текст / Пометка',
				'name' => 'payment_delivery_small',
				'type' => 'wysiwyg',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-order.php'
				)
			)
		),
		'menu_order' => 7,
	));
}
