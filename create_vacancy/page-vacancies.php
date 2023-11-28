<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancy</title>
    <style>
        h2 {
            font-size: 24px;
            color: #333;
            font-family: cursive;
        }

        div {
            width: 100%;
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        div img{
            max-width: 700px;
            max-height: 700px;
        }
    </style>
</head>
<body>
    
</body>
</html>


<?php

$args = array(
    'post_type' => 'vacancy', 
    'posts_per_page' => -1, 
);

$vacancy_query = new WP_Query($args);

if ($vacancy_query->have_posts()) {
    while ($vacancy_query->have_posts()) {
        $vacancy_query->the_post();
        echo '<h2>' . get_the_title() . '</h2>';
        echo '<div>' . get_the_content() . '</div>';
    }
} else {
    echo 'No vacancies found.';
}

wp_reset_postdata();
?>

