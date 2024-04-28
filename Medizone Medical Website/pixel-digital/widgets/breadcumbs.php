<?php
class Elementor_pixel_digital_breadcumbs extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'breadcumbs';
    }

    public function get_title()
    {
        return esc_html__('Pixels Beadcumbs', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'fab fa-audible';
    }


    protected function register_controls()
    {
        //adding Controls

        // Function to get product categories as options


        $this->end_controls_section();
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['breadcumbs', 'bread'];
    }

    protected function render()
    {
        // Start the render function

            // Get the current post/page ID
            $post_id = get_queried_object_id();
        
            // Start building the breadcrumbs
            $breadcrumbs = '<div class="breadcrumbs">';
        
            // Home link
            $breadcrumbs .= '<a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'text-domain' ) . '</a>';
        
            // Check if it's a single post
            if ( is_singular() ) {
                $breadcrumbs .= '<span class="sep"> <i class="fas fa-angle-right" ></i> </span>';
                $breadcrumbs .= '<span>' . get_the_title( $post_id ) . '</span>';
            } elseif ( is_singular( 'page' ) ) {
                // Check if it's a single page
                $ancestors = get_post_ancestors( $post_id );
                if ( $ancestors ) {
                    // Loop through ancestors and add them to breadcrumbs
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $breadcrumbs .= '<span class="sep">  </span>';
                        $breadcrumbs .= '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . get_the_title( $ancestor ) . '</a>';
                    }
                }
                // Current page
                $breadcrumbs .= '<span class="sep"> / </span>';
                $breadcrumbs .= '<span>' . get_the_title( $post_id ) . '</span>';
            }
        
            // Close breadcrumbs div
            $breadcrumbs .= '</div>';
        
            // Output the breadcrumbs
            echo $breadcrumbs;
        
        


        // Close the render function
    }
}



?>

