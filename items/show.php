<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
 
<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<p><em>also: </em> <?php echo metadata('item', array('Dublin Core', 'Alternative Title'), array('delimiter' => ', ')); ?></p>


<p><em>similar or related: </em> <?php echo metadata('item', array('Dublin Core', 'Relation'), array('delimiter' => ', ')); ?></p>



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
    <p></p>
    
    <h2>Bibliographic Citations</h2>
    <?php echo metadata('item', array('Dublin Core', 'Bibliographic Citation'), array('delimiter' => ', ')); ?>

    
</div><!-- end primary -->

 
<aside id="sidebar">
 
<div id="instrumentdetails" class="element"><h2>Instrument Details</h2>
    
    <div class="element-text">
        <h3>Origins</h3>

        <h4>continent - region</h4>
        <p><?php echo metadata('item', array('Dublin Core', 'Coverage'), array('delimiter' => ', ')); ?>

</p>

        <h4>nation -formation</h4>
        <p><?php echo metadata('item', array('Dublin Core', 'Spatial Coverage'), array('delimiter' => ', ')); ?>
</p>
    
        <?php if (metadata('item', array('Dublin Core', 'Is Part Of'))): ?>
        <h3>Ensembles</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Is Part Of'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
    
        <h3>Classification (Sachs-Von Hornbostel revised by 
            <a href="http://www.mimo-international.com/vocabulary.html">MIMO</a>)</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => ', ')); ?></p>

        <h3>Design and Playing Features</h3>
        <h4>category</h4>

        <p><?php echo metadata('item', array('Item Type Metadata', 'Category'), array('delimiter' => ', ')); ?></p>

        <h4>This section needs work</h4>

        <p><?php echo metadata('item', array('Item Type Metadata', 'Feature'), array('delimiter' => ', ')); ?></p>

        <h3>Dimensions</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Format'), array('delimiter' => ', ')); ?></p>
    
        <h3>Primary Materials</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Medium'), array('delimiter' => ', ')); ?></p>

        <h3>Maker</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Creator'), array('delimiter' => ', ')); ?></p>
 
        <h3>Model</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Extent'), array('delimiter' => ', ')); ?></p>

        <h3>Entry Author</h3>
        <p>

<?php echo metadata('item', array('Dublin Core', 'Contributor'), array('delimiter' => ', ')); ?>




</p>
    </div>
</div>

 
 
</aside>

 
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
 
<?php echo foot(); ?>
