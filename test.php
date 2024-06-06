<?php

// Sample multidimensional category array
$categories = array(
    array(
        'name' => 'Category 1',
        'subcategories' => array(
            array('name' => 'Subcategory 1.1'),
            array('name' => 'Subcategory 1.2'),
            array(
                'name' => 'Subcategory 1.3',
                'subcategories' => array(
                    array('name' => 'Subcategory 1.3.1'),
                    array('name' => 'Subcategory 1.3.2')
                )
            )
        )
    ),
    array(
        'name' => 'Category 2',
        'subcategories' => array(
            array('name' => 'Subcategory 2.1'),
            array('name' => 'Subcategory 2.2')
        ) 
    )
);

// Function to recursively display categories and subcategories
function displayCategories($categories, $indent = 0) {
    foreach ($categories as $category) {
        echo str_repeat('&nbsp;', $indent * 4); // Adjust indentation
        echo $category['name'] . "<br>";
        if (isset($category['subcategories'])) {
            displayCategories($category['subcategories'], $indent + 1);
        }
    }
}

// Display the categories
displayCategories($categories);

?>
