<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo item_search_filters(); ?>

<?php echo pagination_links(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Creator')] = 'Dublin Core,Creator';
$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>

<?php 
$c=0;
foreach (loop('items') as $item): 
    if ($c==0): echo '<div class="row">'; endif;
    echo '<div class="col-md-3 col-sm-6 text-center">';
    echo link_to_item(item_image('square_thumbnail'));
    echo '<br />';
    echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink'));
    fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item));
    echo '</div>';
    if ($c==3): echo '</div>'; $c=0; else: $c++; endif;
endforeach;
if ($c<=3): echo '</div>'; endif;
?>


<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>

