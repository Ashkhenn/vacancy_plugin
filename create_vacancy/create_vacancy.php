<?php
/*
Plugin Name: Add Vacancy 
Description: for creat best vacancy
Version: 1.0
Author: Ashkhen
*/

function create_vacancy_post_type() {
    register_post_type('vacancy', array(
        'labels' => array(
            'name' => 'Vacancies',
            'singular_name' => 'Vacancy',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'author'),
    ));
}
add_action('init', 'create_vacancy_post_type');


function vacancy_admin_page() {
    if (isset($_POST['submit_vacancy'])) {
        $title = sanitize_text_field($_POST['vacancy_title']);
        $content = wp_kses_post($_POST['vacancy_content']);

        $new_vacancy = array(
            'post_title' => $title,
            'post_content' => $content,
            'post_type' => 'vacancy',
            'post_status' => 'publish',
        );

        $vacancy_id = wp_insert_post($new_vacancy);

        if ($vacancy_id) {
            echo '<div class="updated">Vacancy added successfully!</div>';
        }
    }
    ?>

    <div class="wrap">
        <h2>Add a Job Vacancy</h2>
        <form method="post" action="">
            <label for="vacancy_title">Title:</label>
            <input type="text" name="vacancy_title" id="vacancy_title" required><br>
            <label for="vacancy_content">Content:</label>
            <textarea name="vacancy_content" id="vacancy_content" rows="5" required></textarea><br>
            <input type="submit" name="submit_vacancy" value="Publish Vacancy">
        </form>
    </div>
    
    <?php
}

function add_vacancy_admin_menu() {
    add_menu_page('Vacancy Plugin', 'Vacancies', 'manage_options', 'vacancy-admin', 'vacancy_admin_page');
}
add_action('admin_menu', 'add_vacancy_admin_menu');
?>