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

        // \acf_add_options_page(array(
        //     'page_title' => 'Параметры',
        //     'menu_title' => 'Параметры',
        //     'menu_slug' => 'acf-options',
        //     'capability' => 'edit_posts',
        //     'redirect' => false,
        // ));
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
                'name'               => 'Проект', // основное название для типа записи
                'singular_name'      => 'Проект', // название для одной записи этого типа
                'add_new'            => 'Добавить проект', // для добавления новой записи
                'add_new_item'       => 'Добавление проекта', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
                'new_item'           => 'Новый проект', // текст новой записи
                'view_item'          => 'Смотреть проект', // для просмотра записи этого типа.
                'search_items'       => 'Искать проект', // для поиска по этим типам записи
                'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
                'parent_item_colon'  => 'Проект', // для родителей (у древовидных типов)
                'menu_name'          => 'Проекты', // название меню
            ],
            'description'            => '',
            'public'                 => true,
            // 'publicly_queryable'  => null, // зависит от public
            // 'exclude_from_search' => null, // зависит от public
            // 'show_ui'             => null, // зависит от public
            // 'show_in_nav_menus'   => null, // зависит от public
            'show_in_menu'           => true, // показывать ли в меню админки
            // 'show_in_admin_bar'   => null, // зависит от show_in_menu
            'show_in_rest'        => null, // добавить в REST API. C WP 4.7
            'rest_base'           => null, // $post_type. C WP 4.7
            'menu_position'       => 9,
            'menu_icon'           => null,
            //'capability_type'   => 'post',
            //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
            //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
            'hierarchical'        => false,
            'supports'            => ['title', 'editor', 'thumbnail', 'excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
            'taxonomies'          => ['category'],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ]);

        
        // register_taxonomy( 'taxonomy', [ 'post' ], [
        //     'label'                 => '', // определяется параметром $labels->name
        //     'labels'                => [
        //         'name'              => 'Genres',
        //         'singular_name'     => 'Genre',
        //         'search_items'      => 'Search Genres',
        //         'all_items'         => 'All Genres',
        //         'view_item '        => 'View Genre',
        //         'parent_item'       => 'Parent Genre',
        //         'parent_item_colon' => 'Parent Genre:',
        //         'edit_item'         => 'Edit Genre',
        //         'update_item'       => 'Update Genre',
        //         'add_new_item'      => 'Add New Genre',
        //         'new_item_name'     => 'New Genre Name',
        //         'menu_name'         => 'Genre',
        //         'back_to_items'     => '← Back to Genre',
        //     ],
        //     'description'           => '', // описание таксономии
        //     'public'                => true,
        //     // 'publicly_queryable'    => null, // равен аргументу public
        //     // 'show_in_nav_menus'     => true, // равен аргументу public
        //     // 'show_ui'               => true, // равен аргументу public
        //     // 'show_in_menu'          => true, // равен аргументу show_ui
        //     // 'show_tagcloud'         => true, // равен аргументу show_ui
        //     // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        //     'hierarchical'          => false,

        //     'rewrite'               => true,
        //     //'query_var'             => $taxonomy, // название параметра запроса
        //     'capabilities'          => array(),
        //     'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        //     'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        //     'show_in_rest'          => null, // добавить в REST API
        //     'rest_base'             => null, // $taxonomy
        //     // '_builtin'              => false,
        //     //'update_count_callback' => '_update_post_term_count',
        // ] );
    }

}
