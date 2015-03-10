<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
 
<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<?php if (metadata('item', array('Dublin Core', 'Alternative Title'))): ?>
<p><em>also: </em> <?php echo metadata('item', array('Dublin Core', 'Alternative Title'), array('delimiter' => ', ')); ?></p>
<?php endif; ?>

<?php if (metadata('item', array('Dublin Core', 'Relation'))): ?>
<p><em>similar or related: </em> <?php echo metadata('item', array('Dublin Core', 'Relation'), array('delimiter' => ', ')); ?></p>
<?php endif; ?>



<!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>

        <div id="itemfiles" class="element">
        <?php set_loop_records('files', get_current_record('item')->Files); //get all the files for the item ?>
        <?php foreach(loop('files') as $file): //loop through the files and display the file and it's metadata ?>
            <div class="file-display">
            <?php echo file_markup(get_current_record('file'), array('imageSize' => 'fullsize')); ?>
            <?php // echo files_for_item(array('imageSize' => 'thumbnail')); ?>
                <div class="file-metadata">
                <?php $dublin_files = all_element_texts($file, array('show_element_sets' => array ('Dublin Core'), 'return_type' => 'array')); ?>
                <?php if (isset($dublin_files['Dublin Core']['Title']) && isset($dublin_files['Dublin Core']['Description'])) : ?>
                <?php echo $dublin_files['Dublin Core']['Description'][0]; ?>
                <?php endif; ?>
                </div>
            </div>

        <?php endforeach; ?>
        <?php // echo files_for_item(array('imageSize' => 'thumbnail')); ?>
        

    <?php endif; ?>
</div>

    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
        <h2><?php echo __('Files'); ?></h2>
        <?php echo item_image_gallery(); ?>
    <?php endif; ?>


<!-- I think the following returns item relations. Not sure where to put this on the page or even if using it. -->   
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
	<?php if (metadata('item', array('Dublin Core', 'Spatial Coverage'))): ?>
        <p><b><i>continent - </i></b>
        <?php echo metadata('item', array('Dublin Core', 'Spatial Coverage'), array('delimiter' => ' - ')); ?></p>
        <?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Source'))): ?>
        <p><b><i>region - </i></b>
	<?php echo metadata('item', array('Dublin Core', 'Source'), array('delimiter' => ' - ')); ?></p>
        <?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Coverage'))): ?>
        <p><b><i>nation - </i></b>
        <?php echo metadata('item', array('Dublin Core', 'Coverage'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Type'))): ?>
        <p><b><i>formation - </i></b>
        <?php echo metadata('item', array('Dublin Core', 'Type'), array('delimiter' => ', ')); ?></p>
    	<?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Is Part Of'))): ?>
        <h3>Ensembles</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Is Part Of'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
    
        <h3>Classification (Sachs-Von Hornbostel revised by 
            <a href="http://www.mimo-international.com/vocabulary.html">MIMO</a>)</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => ', ')); ?></p>

        <h3>Design and Playing Features</h3>
        <p><b><i>category</i></b> - 
	<?php echo metadata('item', array('Item Type Metadata', 'Category'), array('delimiter' => ', ')); ?></p>

<!-- following gives the category features for aerophones -->
<?php if (metadata('item', array('Item Type Metadata', 'air cavity design'))): ?>
	<p><b><i>air cavity design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'air cavity design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'source and direction of airstream'))): ?>
	<p><b><i>source and direction of airstream</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'source and direction of airstream')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'energy transducer that activates sound'))): ?>
	<p><b><i>energy transducer that activates sound</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'energy transducer that activates sound')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity'))): ?>
	<p><b><i>means of modifying shape and dimensions of standing wave in air cavity</i></b> - 
	<?php echo metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'overblowing utilization'))): ?>
	<p><b><i>overblowing utilization</i></b> - 
	<?php echo metadata('item', array('Item Type Metadata', 'overblowing utilization')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitch production'))): ?>
	<p><b><i>pitch production</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'pitch production')); ?></p>
<?php endif; ?>

<!-- following gives the category features for chordophones -->
<?php if (metadata('item', array('Item Type Metadata', 'string carrier design single drum'))): ?>
	<p><b><i>string carrier design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'string carrier design single drum')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'resonator design, chordophone'))): ?>
	<p><b><i>resonator design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'resonator design, chordophone')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'string courses'))): ?>
	<p><b><i>string courses</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'string courses')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'vibrational length'))): ?>
	<p><b><i>vibrational length</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'vibrational length')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'string tension control'))): ?>
	<p><b><i>string tension control</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'string tension control')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'method of sounding'))): ?>
	<p><b><i>method of sounding</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'method of sounding')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitches per string course'))): ?>
	<p><b><i>pitches per string course</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'pitches per string course')); ?></p>
<?php endif; ?>

<!-- following gives the category features for idiophones -->
<?php if (metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s'))): ?>
	<p><b><i>basic form of sonorous object/s</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded'))): ?>
	<p><b><i>sound objects per instrument</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'resonator design'))): ?>
	<p><b><i>resonator design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'resonator design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'number of players'))): ?>
	<p><b><i>number of players</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'number of players')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sounding principle'))): ?>
	<p><b><i>sounding principle</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sounding principle')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound exciting agent'))): ?>
	<p><b><i>sound exciting agent</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound exciting agent')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'energy input motion by performer'))): ?>
	<p><b><i>energy input motion by performer</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'energy input motion by performer')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitch of sound produced'))): ?>
	<p><b><i>pitch of sound produced</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'pitch of sound produced')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound modification'))): ?>
	<p><b><i>sound modification</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound modification')); ?></p>
<?php endif; ?>

<!-- following gives the category features for membranophones -->
<?php if (metadata('item', array('Item Type Metadata', 'number of drums comprising instrument'))): ?>
	<p><b><i>number of drums comprising instrument</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'number of drums comprising instrument')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'shell design'))): ?>
	<p><b><i>shell design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'shell design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'number and function of membranes'))): ?>
	<p><b><i>number and function of membranes</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'number and function of membranes')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane design'))): ?>
	<p><b><i>membrane design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'membrane design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane attachment'))): ?>
	<p><b><i>membrane attachment</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'membrane attachment')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane tension control'))): ?>
	<p><b><i>membrane tension control</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'membrane tension control')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sounding'))): ?>
	<p><b><i>sounding</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sounding')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound modifiers'))): ?>
	<p><b><i>sound modifiers</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound modifiers')); ?></p>
<?php endif; ?>


        <h3>Dimensions</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Format'), array('delimiter' => ', ')); ?></p>
    
        <h3>Primary Materials</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Medium'), array('delimiter' => ', ')); ?></p>
        
        <?php if (metadata('item', array('Dublin Core', 'Publisher'))): ?>
        <h3>Maker</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Publisher'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
 
        <?php if (metadata('item', array('Dublin Core', 'Extent'))): ?>
        <h3>Model</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Extent'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>

        <?php if (metadata('item', array('Dublin Core', 'Contributor'))): ?>
        <h3>Entry Author</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Contributor'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>

    </div>
</div>

<!-- The following prints a citation for this item. -->
 <div id="item-citation" class="element">
	<h2><?php echo __('Citation'); ?></h2>
	<div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
	</div>
</div>

 
</aside>

 
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
 
<?php echo foot(); ?>
