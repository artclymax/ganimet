<?php
/*
Template Name: Архив услуги
*/
?>
<?php get_header(); ?>
<?php get_template_part('partials/components/hero-page', 'services' ) ?>

<?php get_template_part('partials/services-section'); ?>
<?php get_template_part('partials/services-solutions'); ?>
<?php get_template_part('partials/section-implementation'); ?>
<?php get_template_part('partials/why-us'); ?>
<?php get_template_part('partials/how-to-order', null, ['is_reverse' => true]); ?>
<?php get_template_part('partials/faq-section'); ?>

<?php get_template_part('partials/section-contacts-form'); ?>

<?php get_footer(); ?>