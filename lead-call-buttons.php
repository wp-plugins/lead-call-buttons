<?php 

    $count = 0;
    
    $bg_color = LCB_get_setting( 'lead_call_buttons', 'general', 'bg-color' );
    $text_color = LCB_get_setting( 'lead_call_buttons', 'general', 'text-color' );
    
    if( empty($bg_color) ){
        $bg_color = "#000";
    }if( empty($text_color) ){
        $text_color = "#fff";
    }
    
    $callnow_title = LCB_get_setting( 'lead_call_buttons', 'general', 'callnow-title' );
    $callnow_icon = LCB_get_setting( 'lead_call_buttons', 'general', 'callnow-icon' );
    $callnow_number = LCB_get_setting( 'lead_call_buttons', 'general', 'callnow-number' );
    
    $schedule_title = LCB_get_setting( 'lead_call_buttons', 'general', 'schedule-title' );
    $schedule_icon = LCB_get_setting( 'lead_call_buttons', 'general', 'schedule-icon' );
    $schedule_link = LCB_get_setting( 'lead_call_buttons', 'general', 'schedule-link' );
    
    $map_title = LCB_get_setting( 'lead_call_buttons', 'general', 'map-title' );
    $map_icon = LCB_get_setting( 'lead_call_buttons', 'general', 'map-icon' );
    $map_link = LCB_get_setting( 'lead_call_buttons', 'general', 'map-link' );
    
    if ( !empty ($callnow_number) ) { $count++; }
    if ( !empty ($schedule_link) ) { $count++; }
    if ( !empty ($map_link) ) { $count++; }
          
    if ( $count == 0) { 
        $class = "";
        $main_div = " ";
    } if ( $count == 1 ) {
        $class = "one-whole";
        $main_div = "<div class='main_buttons'>";       
    } if ( $count == 2) { 
        $class = "one-half";
        $main_div = "<div class='main_buttons'>";     
    } if ( $count == 3) { 
        $class = "one-third";
        $main_div = "<div class='main_buttons'>";      
    }
	
    echo $main_div;
    	 
	if ( !empty ($callnow_number) ) { ?>
	
    	<div class="callnow_area on <?php echo $class;?>">
            <a href="<?php echo $callnow_number;?>">
        		<div class="callnow_bottom">
        			<span class="b_callnow">
                        <?php echo $callnow_icon; ?>
                        <?php echo $callnow_title; ?>
                    </span>
        		</div>
            </a>
    	</div>

	<?php } ?>
    
    <?php 
	
	if ( !empty ($schedule_link) ) { ?>
	
    	<div class="schedule_area on <?php echo $class;?>">
            <a href="<?php echo $schedule_link; ?>">
        		<div class="schedule_bottom">
        			<span class="b_schedule">
                        <?php echo $schedule_icon; ?>
                        <?php echo $schedule_title; ?>
                    </span>
        		</div>
            </a>
    	</div>

	<?php } ?>
     
    <?php 
	
	if ( !empty ($map_link) ) { ?>
	
    	<div class="map_area on <?php echo $class;?>">
            <a href="<?php echo $map_link; ?>">
        		<div class="map_bottom">
        			<span class="b_map">
                        <?php echo $map_icon; ?>
                        <?php echo $map_title; ?>
                    </span>
        		</div>
            </a>
    	</div>

	<?php }     
        if ( $count != 0) { 
    ?>
        </div>
    <?php 
        }    
    ?>
    
    <style>
      .main_buttons {
         background: <?php echo $bg_color; ?>;
         color: <?php echo $text_color; ?>;
      }
      .main_buttons .on a {
    	 color: <?php echo $text_color; ?>;
      }
    </style>

	
	

