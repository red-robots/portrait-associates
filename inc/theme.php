<?php
/**
 * Custom theme functions.
 *
 * 
 *
 * @package ACStarter
 */

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 327px 126px;
  	width: 327px;
  	height: 126px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/*-------------------------------------
  Hide Admin Bar
---------------------------------------*/
show_admin_bar(false);


// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

/*-------------------------------------
	Adds Options page for ACF.
---------------------------------------*/
if( function_exists('acf_add_options_page') ) {acf_add_options_page();}

/*-------------------------------------
  Hide Front End Admin Menu Bar
---------------------------------------*/
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
 /*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
/*-------------------------------------
  Custom WYSIWYG Styles

  If you are using the Plugin: MRW Web Design Simple TinyMCE

  Keep this commented out to keep from getting duplicate "Format" dropdowns

---------------------------------------*/
// function acc_custom_styles($buttons) {
//   array_unshift($buttons, 'styleselect');
//   return $buttons;
// }
// add_filter('mce_buttons_2', 'acc_custom_styles');


/*
* Callback function to filter the MCE settings


  But always use this to get the custom formats

*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
  $style_formats = array(  
    // Each array child is a format with it's own settings
    
    // A block element
    array(  
      'title' => 'Block Color',  
      'block' => 'span',  
      'classes' => 'custom-color-block',
      'wrapper' => true,
      
    ),
    // inline color
    array(  
      'title' => 'Custom Color',  
      'inline' => 'span',  
      'classes' => 'custom-color',
      'wrapper' => true,
      
    ),
     array(
        'title' => 'Header 2',
        'format' => 'h2',
        //'icon' => 'bold'
    ),
    array(
        'title' => 'Header 3',
        'format' => 'h3'
    ),
    array(
        'title' => 'Paragraph',
        'format' => 'p'
    )
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 
// Add styles to WYSIWYG in your theme's editor-style.css file
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
/*-------------------------------------
  Change Admin Labels
---------------------------------------*/
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News Item';
    //$submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News Item';
        $labels->add_new = 'Add News Item';
        $labels->add_new_item = 'Add News Item';
        $labels->edit_item = 'Edit News Item';
        $labels->new_item = 'News Item';
        $labels->view_item = 'View News Item';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
    }
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

/*-------------------------------------
  Add a last and first menu class option
---------------------------------------*/

function ac_first_and_last_menu_class($items) {
  foreach($items as $k => $v){
    $parent[$v->menu_item_parent][] = $v;
  }
  foreach($parent as $k => $v){
    $v[0]->classes[] = 'first';
    $v[count($v)-1]->classes[] = 'last';
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');

add_filter( 
  'bwsplgns_get_pdf_print_content', 
  function( $content) {
    global $post;
    $id = $post->ID;

    if(strcmp(get_post_type($id),'artist')==0){ 
      ob_start();
          $photo = get_field("photo_of_artist",$id); 
        $bio = get_field("bio", $id);  
          if($photo){ 
          echo '<img src="'.$photo['sizes']['medium'].'" alt="'.$photo['alt'].'">';
          } 
          if($bio){ 
          echo '<header>';
            echo '<h2>Bio</h2>';
          echo '</header>';
          echo '<div class="copy">';
              echo $bio; 
          echo '</div><!--.copy-->';
          } 
          $medium = get_field("medium", $id);// -> title -> type -> subject + price 
          if($medium){
            foreach($medium as $row){
              $title = $row['title'];
              $col_1_title = $row['column_1_title'];
              $col_2_title = $row['column_2_title'];
              $type = $row['type'];
              $desc = $row['medium_pricing_description'];
              echo '<div class="medium">';
                if($title){
                  echo '<header>';
                    echo "<h2>$title</h2>";
                  echo "</header>";
                }
                if($type){
                  echo '<table>';
                    if($col_1_title||$col_2_title){
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th></th>';
                          echo '<th>';
                            if($col_1_title){
                              echo $col_1_title;		
                            }
                          echo '</th>';
                          echo '<th>';
                            if($col_2_title){
                              echo $col_2_title;
                            }
                          echo '</th>';
                        echo '</tr>';
                      echo '</thead>';
                    }
                    echo '<tbody>';
                      foreach($type as $t){
                        $subject = $t['subject'];
                        $price_1 = $t['price_one'];
                        $price_2 = $t['price_two'];
                        echo '<tr>';
                          echo '<td>';
                            if($subject){
                              echo $subject;
                            }
                          echo '</td>';
                          if($col_1_title||$price_1){
                            echo "<td>";
                            if($price_1){
                              echo $price_1;
                            }
                            echo "</td>";
                          }
                          if($col_2_title||$price_2){
                            echo "<td>";
                            if($price_2){
                              echo $price_2;
                            }
                            echo "</td>";
                          }
                        echo '</tr>';
                      }
                    echo "</tbody>";
                  echo "</table>";
                }
                if($desc){
                  echo '<div class="copy">';
                    echo $desc;
                  echo '</div><!--.copy-->'; 	
                }
                $procedure = get_field("procedure", $id);
                if($procedure){
                  echo "<header>";
                    echo "<h2>Procedure</h2>";
                  echo "</header>";
                  echo '<div class="copy">';
                    echo $procedure;
                  echo '</div><!--.copy-->'; 	
                }
                $notable_commissions = get_field("notable_commissions", $id);
                if($notable_commissions){
                  echo "<header>";
                    echo "<h2>Notable Commissions</h2>";
                  echo "</header>";
                  echo '<div class="copy">';
                    echo $notable_commissions;
                  echo '</div><!--.copy-->'; 	
                } 	
              echo '</div><!--.medium-->';
            }
          }
          $gallery = get_field("gallery_of_work", $id);  
          if($gallery){ 
            foreach($gallery as $image){ 
            echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';
            } 
          }
      return ob_get_clean();
    }
    return $content;
  }
);