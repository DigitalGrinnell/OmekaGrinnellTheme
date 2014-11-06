<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>

<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<p><em>also: </em> <?php echo metadata('item', array('Dublin Core', 'Alternative Title')); ?></p>

<p><em>similar or related: </em> <?php echo metadata('item', array('Dublin Core', 'Relation')); ?></p>

<!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
        <?php echo files_for_item(array('imageSize' => 'thumbnail')); ?>
    <?php endif; ?>

    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
        <h2><?php echo __('Files'); ?></h2>
        <?php echo item_image_gallery(); ?>
    <?php endif; ?>

<!-- I think the following returns item relations. Not sure where to put this on the page. -->   
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
    
<div id="primary">

    <!-- The following returns description and bibliography citation. -->
    <h2>Description</h2>

<?php echo metadata('item', array('Dublin Core', 'Description')); ?>
    
    <h2>Bibliographic Citations</h2>
    <?php echo metadata('item', array('Dublin Core', 'Bibliographic Citation')); ?><p></p>

    <!-- The following prints a collection citation for this item. -->
    <h3><?php echo __('Citation'); ?></h3>
    <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
    
</div><!-- end primary -->

<aside id="sidebar">
 
<div id="instrumentdetails" class="element"><h2>Instrument Details</h2>
    
    <div class="element-text">
        <h3>Origins</h3>

        <h4>continent - region</h4>
        <p><?php echo metadata('item', array('Dublin Core', 'Coverage')); ?>

</p>

        <h4>nation -formation</h4>
        <p><?php echo metadata('item', array('Dublin Core', 'Spatial Coverage')); ?>
</p>
    
        <h3>Ensembles</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Is Part Of')); ?></p>
    
        <h3>Classification (Sachs-Von Hornbostel revised by 
            <a href="http://www.mimo-international.com/vocabulary.html">MIMO</a>)</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Subject')); ?></p>

        <h3>Design and Playing Features</h3>
        <h4>category</h4>

        <p><?php echo metadata('item', array('Item Type Metadata', 'Category')); ?></p>

        <h4>This section needs work</h4>

        <p><?php echo metadata('item', array('Item Type Metadata', 'Feature')); ?></p>

        <h3>Dimensions</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Format')); ?></p>
    
        <h3>Primary Materials</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Medium')); ?></p>

        <h3>Maker</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></p>
 
        <h3>Model</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Extent')); ?></p>

        <h3>Entry Author</h3>
        <p>

<?php echo metadata('item', array('Dublin Core', 'Contributor')); ?>

</p>
    </div>
</div>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (metadata('item', 'Collection Name')): ?>
        <div id="collection" class="element">
            <h2><?php echo __('Collection'); ?></h2>
        <div class="element-text">
            <p><?php echo link_to_collection_for_item(); ?></p>
        </div>
        </div>
    <?php endif; ?>
 
</aside>
 
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
 
<?php echo foot(); ?>
