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
        <?php echo files_for_item(array('imageSize' => 'thumbnail')); ?>
    <?php endif; ?>

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

        <h4><i>continent - region</i></h4>
        <p><?php echo metadata('item', array('Dublin Core', 'Spatial Coverage'), array('delimiter' => ' - ')); ?> - 
	<?php echo metadata('item', array('Dublin Core', 'Source'), array('delimiter' => ' - ')); ?>

</p>

        <h4><i>nation - formation</i></h4>
        <p><?php echo metadata('item', array('Dublin Core', 'Coverage'), array('delimiter' => ', ')); ?> - 
        <?php echo metadata('item', array('Dublin Core', 'Type'), array('delimiter' => ', ')); ?>
</p>
    
        <?php if (metadata('item', array('Dublin Core', 'Is Part Of'))): ?>
        <h3>Ensembles</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Is Part Of'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
    
        <h3>Classification (Sachs-Von Hornbostel revised by 
            <a href="http://www.mimo-international.com/vocabulary.html">MIMO</a>)</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => ', ')); ?></p>

        <h3>Design and Playing Features</h3>
        <h4><i>category</i></h4>

        <p><?php echo metadata('item', array('Item Type Metadata', 'Category'), array('delimiter' => ', ')); ?></p>

        <!-- The following IF-ELSEIF-ELSEIF-ELSEIF sections checks the music instrument's category, then displays the features for only that category -->
<?php $category = metadata('item', array('Item Type Metadata', 'Category')); ?>
<?php if ($category == 'aerophone'): ?>
	{
	<h4>air cavity design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'air cavity design')); ?></p>
	<h4>source and direction of airstream</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'source and direction of airstream')); ?></p>
	<h4>energy transducer that activates sound</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'energy transducer that activates sound')); ?></p>
	<h4>means of modifying shape and dimensions of standing wave in air cavity</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity')); ?></p>
	<h4>overblowing utilization</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'overblowing utilization')); ?></p>
	<h4>pitch production</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'pitch production')); ?></p>
	}
<?php elseif ($category == 'chordophone'): ?>
	{
	<h4>string carrier design single drum</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'string carrier design single drum')); ?></p>
	<h4>resonator design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'resonator design, chordophone')); ?></p>
	<h4>string courses</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'string courses')); ?></p>
	<h4>vibrational length</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'vibrational length')); ?></p>
	<h4>string tension control</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'string tension control')); ?></p>
	<h4>method of sounding</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'method of sounding')); ?></p>
	<h4>pitches per string course</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'pitches per string course')); ?></p>
	}
<?php elseif ($category == 'idiophone'): ?>
	{
	<h4>basic form of sonorous object/s</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s')); ?></p>
	<h4>sound objects per instrument</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded')); ?></p>
	<h4>resonator design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'resonator design')); ?></p>
	<h4>number of players</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'number of players')); ?></p>
	<h4>sounding principle</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sounding principle')); ?></p>
	<h4>sound exciting agent</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound exciting agent')); ?></p>
	<h4>energy input motion by performer</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'energy input motion by performer')); ?></p>
	<h4>pitch of sound produced</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'pitch of sound produced')); ?></p>
	<h4>sound modification</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound modification')); ?></p>
	}
<?php elseif ($category == 'membranophone'): ?>
	{
	<h4>number of drums comprising instrument</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'number of drums comprising instrument')); ?></p>
	<h4>shell design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'shell design')); ?></p>
	<h4>number and function of membranes</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'number and function of membranes')); ?></p>
	<h4>membrane design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'membrane design')); ?></p>
	<h4>membrane attachment</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'membrane attachment')); ?></p>
	<h4>membrane tension control</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'membrane tension control')); ?></p>
	<h4>sounding</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sounding')); ?></p>
	<h4>sound modifiers</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound modifiers')); ?></p>
	}
<?php endif; ?>

<!-- following repeats the category features for aerophones, because I can't get the if-elseif section to work -->
<?php if (metadata('item', array('Item Type Metadata', 'air cavity design'))): ?>
	<h4>air cavity design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'air cavity design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'source and direction of airstream'))): ?>
	<h4>source and direction of airstream</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'source and direction of airstream')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'energy transducer that activates sound'))): ?>
	<h4>energy transducer that activates sound</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'energy transducer that activates sound')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity'))): ?>
	<h4>means of modifying shape and dimensions of standing wave in air cavity</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'overblowing utilization'))): ?>
	<h4>overblowing utilization</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'overblowing utilization')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitch production'))): ?>
	<h4>pitch production</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'pitch production')); ?></p>
<?php endif; ?>

<!-- following repeats the category features for chordophones, because I can't get the if-elseif section to work -->
<?php if (metadata('item', array('Item Type Metadata', 'string carrier design single drum'))): ?>
	<h4>string carrier design single drum</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'string carrier design single drum')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'resonator design, chordophone'))): ?>
	<h4>resonator design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'resonator design, chordophone')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'string courses'))): ?>
	<h4>string courses</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'string courses')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'vibrational length'))): ?>
	<h4>vibrational length</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'vibrational length')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'string tension control'))): ?>
	<h4>string tension control</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'string tension control')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'method of sounding'))): ?>
	<h4>method of sounding</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'method of sounding')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitches per string course'))): ?>
	<h4>pitches per string course</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'pitches per string course')); ?></p>
<?php endif; ?>

<!-- following repeats the category features for idiophones, because I can't get the if-elseif section to work -->
<?php if (metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s'))): ?>
	<h4>basic form of sonorous object/s</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded'))): ?>
	<h4>sound objects per instrument</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'resonator design'))): ?>
	<h4>resonator design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'resonator design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'number of players'))): ?>
	<h4>number of players</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'number of players')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sounding principle'))): ?>
	<h4>sounding principle</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sounding principle')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound exciting agent'))): ?>
	<h4>sound exciting agent</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound exciting agent')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'energy input motion by performer'))): ?>
	<h4>energy input motion by performer</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'energy input motion by performer')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitch of sound produced'))): ?>
	<h4>pitch of sound produced</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'pitch of sound produced')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound modification'))): ?>
	<h4>sound modification</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound modification')); ?></p>
<?php endif; ?>

<!-- following repeats the category features for membranophones, because I can't get the if-elseif section to work -->
<?php if (metadata('item', array('Item Type Metadata', 'number of drums comprising instrument'))): ?>
	<h4>number of drums comprising instrument</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'number of drums comprising instrument')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'shell design'))): ?>
	<h4>shell design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'shell design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'number and function of membranes'))): ?>
	<h4>number and function of membranes</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'number and function of membranes')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane design'))): ?>
	<h4>membrane design</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'membrane design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane attachment'))): ?>
	<h4>membrane attachment</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'membrane attachment')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane tension control'))): ?>
	<h4>membrane tension control</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'membrane tension control')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sounding'))): ?>
	<h4>sounding</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sounding')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound modifiers'))): ?>
	<h4>sound modifiers</h4>
	<p><?php echo metadata('item', array('Item Type Metadata', 'sound modifiers')); ?></p>
<?php endif; ?>


        <h3>Dimensions</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Format'), array('delimiter' => ', ')); ?></p>
    
        <h3>Primary Materials</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Medium'), array('delimiter' => ', ')); ?></p>
        
        <?php if (metadata('item', array('Dublin Core', 'Creator'))): ?>
        <h3>Maker</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Creator'), array('delimiter' => ', ')); ?></p>
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
