<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
if (!is_active_sidebar('sidebar-1')) {
    $args = array(
        'orderby' => $orderby,
        'order' => $order,
        'hide_empty' => 0,
        'include' => $ids,
        'parent' => 0,
    );

    $categories = get_terms('product_cat', $args);
    ?>
    <div id="ajax-filter">
        <div id='category'>  <label> Select Category : </label>
            <select name='category' id="category">
                <option> Select Category </option>
                <?php foreach ($categories as $category) : ?> 
                    <option value="<?php echo $category->slug; ?>"> <?php echo $category->name; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="custom_range">
        <label for="amount">Price Range:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;width: 100%;padding: 0;">
        <div id="slider-range" style="width: 100%;float: right;"></div>
        </div>
    </div> 

    <?php
    return;
}
?>
<aside id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->
