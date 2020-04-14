// Creates Team Member Custom Post Type
function teammember_init() {
    $args = array(
            'label'                => 'TeamMember',
            'public'               => true,
            'publicly_queryable'   => true,
            'show_ui'              => true,
            'hierarchical'         => false,
            'query_var'            => true,
            'rewrite'              => array('slug' => 'teammember'),
            'capability_type'      => 'post',
            'has_archive'          => true,        
            'menu_icon'            => 'dashicons-video-alt',
            'supports' => array(
                    'title',
                    'editor',
                    'excerpt',
                    'trackbacks',
                    'custom-fields',
                    'comments',
                    'revisions',
                    'thumbnail',
                    'author',
                    'page-attributes',)
        );
    register_post_type( 'teammember', $args );
}
add_action( 'init', 'teammember_init' );
