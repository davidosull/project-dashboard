<?php

// Register CTP
add_action('init', 'inovo_theme_cpt');

function inovo_theme_cpt()
{
  register_post_type($post_type_name, $post_type_options);

  $post_type_name = "project";
  $single_name    = "Project";
  $plural_name    = "Projects";
  $icon           = "dashicons-portfolio";

  $post_type_options = array(
    'label'           => $plural_name,
    'public'          => true,
    'menu_icon'       => $icon,
    'show_ui'         => true,
    'show_in_menu'    => true,
    'capability_type' => 'post',
    'hierarchical'    => true,
    'rewrite'         => array(
      'pages'      => true,
      'slug'       => $post_type_name,
      'with_front' => false
    ),
    'query_var'   => true,
    'has_archive' => false,
    'supports'    => array(
      'title',
    ),
    'labels' => array(
      'name'               => $plural_name,
      'singular_name'      => $single_name,
      'menu_name'          => $plural_name,
      'add_new'            => 'Add ' . $single_name,
      'add_new_item'       => 'Add New ' . $single_name,
      'edit'               => 'Edit',
      'edit_item'          => 'Edit ' . $single_name,
      'new_item'           => 'New ' . $single_name,
      'view'               => 'View ' . $single_name,
      'view_item'          => 'View ' . $single_name,
      'search_items'       => 'Search ' . $plural_name,
      'not_found'          => 'No ' . $plural_name . ' Found',
      'not_found_in_trash' => 'No ' . $plural_name . ' Found in Trash',
      'parent'             => 'Parent ' . $single_name
    )
  );
  register_post_type($post_type_name, $post_type_options);
}

// Register Taxonomies
add_action('init', 'inovo_theme_taxonomy');

function inovo_theme_taxonomy()
{
  // $single_name = "Platform";
  // $plural_name = "Platforms";

  // $labels = array(
  //   'name'                       => $single_name,
  //   'singular_name'              => $single_name,
  //   'search_items'               => 'Search ' . $plural_name,
  //   'popular_items'              => 'Popular ' . $plural_name,
  //   'all_items'                  => 'All ' . $plural_name,
  //   'parent_item'                => null,
  //   'parent_item_colon'          => null,
  //   'edit_item'                  => 'Edit ' . $single_name,
  //   'update_item'                => 'Update ' . $single_name,
  //   'add_new_item'               => 'Add New ' . $single_name,
  //   'new_item_name'              => 'New ' . $single_name . ' Name',
  //   'separate_items_with_commas' => 'Separate ' . strtolower($plural_name) . ' with commas',
  //   'add_or_remove_items'        => 'Add or remove ' . strtolower($plural_name),
  //   'choose_from_most_used'      => 'Choose from the most used ' . strtolower($plural_name),
  //   'menu_name'                  => $plural_name,
  // );

  // register_taxonomy(str_replace(" ", "-", strtolower($plural_name)), array('portfolios'), array(
  //   'hierarchical'          => false,
  //   'labels'                => $labels,
  //   'show_ui'               => true,
  //   'show_admin_column'     => true,
  //   'update_count_callback' => '_update_post_term_count',
  //   'query_var'             => true,
  //   'rewrite'               => array('slug' => str_replace(" ", "-", strtolower($single_name))),
  // ));
}

// Add to the public query variables available to WP_Query (for filtering)
function inovo_add_query_vars_filter($vars)
{
  array_push($vars, 'publication-type');
  return $vars;
}
add_filter('query_vars', 'inovo_add_query_vars_filter');

// Hide cpt taxonomy meta box
// function remove_job_tax_metabox()
// {
//   remove_meta_box('tagsdiv-level', 'jobs', 'side');
// }
// add_action('admin_menu', 'remove_job_tax_metabox');