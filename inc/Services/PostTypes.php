<?php

namespace DomenART\Theme\Services;

use DomenART\Theme\Service;
use DomenART\Theme\Service_Container;

/**
 * Class PostTypes
 *
 * @package DomenART\Theme
 */
class PostTypes implements Service
{

    /**
     * @param Service_Container $container
     */
    public function register(Service_Container $container): void
    {
    }

    /**
     * @param Service_Container $container
     */
    public function boot(Service_Container $container): void
    {
        \add_action('init', [$this, 'register_post_types']);
    }

    /**
     * @return string
     */
    public function get_service_name(): string
    {
        return 'post_types';
    }

    public function register_post_types(): void
    {
        \register_post_type('project', [
            'label'  => null,
            'labels' => [
                'name' => 'Проекты',
                'all_items' => 'Все проекты',
                'singular_name' => 'Проект',
                'add_new' => 'Добавить новый',
                'add_new_item' => 'Добавление проекта',
                'edit_item' => 'Редактирование проекта',
                'new_item' => 'Новый проект',
                'view_item' => 'Смотреть проект',
                'search_items' => 'Искать проект',
                'not_found' => 'Не найдено',
                'not_found_in_trash' => 'Не найдено в корзине',
                'parent_item_colon' => 'Проект',
                'menu_name' => 'Проекты',
            ],
            'description' => '',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => null,
            'rest_base' => null,
            'menu_position' => 9,
            'menu_icon' => null,
            'hierarchical' => false,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
            'taxonomies' => ['project_category'],
            'has_archive' => false,
            'rewrite' => true,
            'query_var' => true,
        ]);
        
        register_taxonomy('project_category', ['project'], [
            'label' => '',
            'labels' => [
                'name' => 'Категории',
                'singular_name' => 'Категория',
                'search_items' => 'Искать категории',
                'all_items' => 'Все категории',
                'view_item' => 'Смотреть категорию',
                'parent_item' => 'Родительская категория',
                'parent_item_colon' => 'Родительская категория:',
                'edit_item' => 'Редактировать категорию',
                'update_item' => 'Обновить категорию',
                'add_new_item' => 'Новая категория',
                'new_item_name' => 'Новое название категории',
                'menu_name' => 'Категории',
                'back_to_items' => 'Вернуться к категориям',
            ],
            'description' => '',
            'public' => true,
            'hierarchical' => false,
            'rewrite' => true,
            'capabilities' => [],
            'meta_box_cb' => 'post_categories_meta_box',
            'show_admin_column' => false,
            'show_in_rest' => null,
            'rest_base' => null,
        ]);
    }

}
