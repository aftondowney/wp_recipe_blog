<?php
/*
Plugin Name: Recipe Custom Post Type
Description: Custom Post Types for recipes.
Author: Afton Downey
Author URI: https://github.com/aftondowney
*/

add_action('init', 'recipe_cpt');

function recipe_cpt() {
  register_post_type('recipe', array(
    'labels' => array(
      'name' => 'Recipes',
      'singular_name' => 'Recipe',
    ),
    'description' => 'Recipes that I make at home.',
    'public' => true,
    'menu_position' => 20,
    'supports' => array('title', 'editor', 'custom-fields')
  ));
}
