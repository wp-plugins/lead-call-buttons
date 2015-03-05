<?php

global $LCB_settings;

$LCB_settings[] = array(
    'section_id' => 'general',
    'section_title' => '',
    'section_description' => 'Settings for Lead Call Buttons. Leave Link field blank to hide button.',
    'section_order' => 5,
    'fields' => array(
        array(
            'id' => 'callnow-title',
            'title' => 'Button Title',
            'desc' => 'Title.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'callnow-icon',
            'title' => 'Icon',
            'desc' => 'Font Awesome Icon.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'callnow-number',
            'title' => 'Link',
            'desc' => 'Phone number.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'schedule-title',
            'title' => 'Button Title',
            'desc' => 'Title.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'schedule-icon',
            'title' => 'Icon',
            'desc' => 'Font Awesome Icon.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'schedule-link',
            'title' => 'Link',
            'desc' => 'Link.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'map-title',
            'title' => 'Button Title',
            'desc' => 'Title.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'map-icon',
            'title' => 'Icon',
            'desc' => 'Font Awesome Icon.',
            'type' => 'text',
            'std' => ''
        ),      
        array(
            'id' => 'map-link',
            'title' => 'Link',
            'desc' => 'Link.',
            'type' => 'text',
            'std' => ''
        ),    
        array(
            'id' => 'bg-color',
            'title' => 'Background Color',
            'desc' => 'Background Color.',
            'type' => 'color',
            'std' => ''
        ),
        array(
            'id' => 'text-color',
            'title' => 'Text Color',
            'desc' => 'Text Color.',
            'type' => 'color',
            'std' => ''
        ),
        array(
            'id' => 'custom-css',
            'title' => 'Custom CSS',
            'desc' => 'Custom css coding area. Use !important if needed. Otherwise Leave Empty',
            'type' => 'textarea',
            'std' => ''
        )
    )
);


?>