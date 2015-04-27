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
        <?php $f = 0; ?>
        <div class="row">
        <?php foreach(loop('files') as $file): //loop through the files and display the file and it's metadata 

            if($f % 4 == 0) : ?>
                </div><div class="row">
            <?php endif; ?>
            
            <div class="file-display col-md-3">
            <?php echo file_markup(get_current_record('file'), array('imageSize' => 'fullsize')); ?>
            <?php echo metadata('file', array('Dublin Core', 'Alternative Title')); ?>
            <?php $f++;?>
            </div>

        <?php endforeach; ?>
        <?php // echo files_for_item(array('imageSize' => 'thumbnail')); ?>
        <!-- row div -->
        </div>

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
        
    <h2>Bibliographic Citations</h2>
    <?php echo metadata('item', array('Dublin Core', 'Bibliographic Citation'), array('delimiter' => ', ')); ?>

    
</div><!-- end primary -->

 
<aside id="sidebar">
 
<div id="instrumentdetails" class="element"><h2>Instrument Details</h2>
    
    <div class="element-text">
        <h3>Origins</h3>
	    <?php if (metadata('item', array('Dublin Core', 'Spatial Coverage'))): $continent = metadata('item', array('Dublin Core', 'Spatial Coverage')); ?>
            <p><b><i>continent - </i></b>
            <?php echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'81_s:"'.$continent.'"')).'">'.$continent.'</a>'; ?></p>
        <?php endif; ?>


        <?php if (metadata('item', array('Dublin Core', 'Source'))): $region = metadata('item', array('Dublin Core', 'Source')); ?>
        <p><b><i>region - </i></b>
	    <?php echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'48_s:"'.$region.'"')).'">'.$region.'</a>'; ?></p>
        <?php endif; ?>


        <?php if (metadata('item', array('Dublin Core', 'Coverage'))): $coverage = metadata('item', array('Dublin Core', 'Coverage')); ?>
        <p><b><i>nation - </i></b>
        <?php echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'38_s:"'.$coverage.'"')).'">'.$coverage.'</a>'; ?></p>
        <?php endif; ?>
        

        <?php if (metadata('item', array('Dublin Core', 'Type'))): ?>
        <p><b><i>formation - </i></b>
        <?php $formation = metadata('item', array('Dublin Core', 'Type'), array('delimiter' => ', ')); ?>
        <?php echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'51_s:"'.$formation.'"')).'">'.$formation.'</a>'; ?></p>
    	<?php endif; ?>
        
        <!-- If it's part of an ensemble get the link to the ensemble slug -->
        <?php if (metadata('item', array('Dublin Core', 'Is Part Of'))): ?>
        

        <h3>Ensembles</h3>
        <p>
        <?php
        $ensemblesExhibit = get_db()->getTable('Exhibit')->find(3); 
        $isPartOfEnsembles = metadata('item', array('Dublin Core', 'Is Part Of'), array('delimiter' => ', ')); 
        $ensembles = explode(', ', $isPartOfEnsembles);
        foreach ($ensembles as $ensemble) {
            $ensemblePage = get_record('ExhibitPage', array('title'=>$ensemble));
            echo "<a href='".exhibit_builder_exhibit_uri($ensemblesExhibit, $ensemblePage)."'>".$ensemble."</a><br />";
        }?>
        </p>
        
        <?php endif; ?>
    
        <h3>Classification (Sachs-Von Hornbostel revised by 
            <a href="http://www.mimo-international.com/vocabulary.html">MIMO</a>)</h3>
        <p>
        <?php $classification = metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => ', ')); ?>
        <?php echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'49_s:"'.$classification.'"')).'">'.$classification.'</a>:'; ?>
        <?php 
            $db = get_db();
            $select = $db->select()
                         ->from('wmi.mimo')
                         ->where('class = ?', $classification);
            $stmt = $db->query($select);
            $result = $stmt->fetchAll();
            print($result[0]['definition']);
        ?>
        </p>



        </p>

        <h3>Design and Playing Features</h3>
        <?php $category = metadata('item', array('Item Type Metadata', 'Category'), array('delimiter' => ', ')); ?>
        <p><b><i>category -</i></b> 
        <?php echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'92_s:"'.$category.'"')).'">'.$category.'</a>'; ?></p>
        


        

        <?php 
        $instrumentFeatures = array('air cavity design', 'source and direction of airstream', 'energy transducer that activates sound', 'means of modifying shape and dimensions of standing wave in air cavity',  'overblowing utilization', 'pitch production','string carrier design', 'resonator design, chordophone', 'string courses', 'vibrational length', 'string tension control', 'method of sounding', 'pitches per string course','basic form of sonorous object/s', 'sound objects per instrument', 'resonator design', 'number of players', 'sounding principle', 'sound exciting agent', 'energy input motion by performer', 'pitch of sound produced', 'sound modification','number of drums comprising instrument', 'shell design', 'number and function of membranes', 'membrane design', 'membrane attachment', 'membrane tension control', 'sounding', 'sound modifiers');
        foreach ($instrumentFeatures as $feature) {
            if (metadata('item', array('Item Type Metadata', $feature))) {
                $facetid = get_db()->getTable('SolrSearchField')->findByLabel($feature);
                $facetstr = 'solr-search/?q=*&facet=' . $facetid->element_id . '_s:"' . metadata('item', array('Item Type Metadata', $feature)) . '"';
                //echo $facetstr;
                $faceturl = url($facetstr);
                ?><p><b><i><?php echo $feature ?></i></b> - <a href='<?php echo $faceturl; ?>'><?php echo metadata('item', array('Item Type Metadata', $feature)); ?></a></p>
                <?php }
            }?>




        <h3>Dimensions</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Format'), array('delimiter' => ', ')); ?></p>
    
        <h3>Primary Materials</h3>
        <?php $materials = explode(', ', metadata('item', array('Dublin Core', 'Medium'), array('delimiter' => ', '))); ?>
        <p>
        <?php 
        $i=0;
        foreach ($materials as $material) :
            echo '<a href="'.url('/solr-search', array('q'=>'*', 'facet'=>'79_s:"'.$material.'"')).'">'.$material.'</a>';
            if ($i != (count($materials)-1)) :
                echo ', ';
            endif;
        endforeach;
        ?></p>
        
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
