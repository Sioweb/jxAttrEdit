<?php

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';
 
/**
 * Module information
 */
$aModule = [
    'id'           => 'jxattredit',
    'title'        => 'jxAttrEdit - Product Attibute Editor',
    'description'  => [
        'de' => 'Attribut-Editor für Artikel.',
        'en' => 'Attribute Editor for Products.'
    ],
    'thumbnail'    => 'jxattredit.png',
    'version'      => '0.6.0',
    'author'       => 'Joachim Barthel',
    'url'          => 'https://github.com/job963/jxAttrEdit',
    'email'        => 'jobarthel@gmail.com',
    'extend'       => [
        //'oxattributelist' => 'jxattredit/application/model/attributelist_jxattredit',
        \OxidEsales\Eshop\Application\Model\AttributeList::class => 
            \Job963\Oxid\AttrEdit\Model\AttributeList::class
    ],
    'controllers'       => [
        'article_jxattredit' => \Job963\Oxid\AttrEdit\Controller\Admin\ArticleAttributes::class
    ],
    'events'       => [
        'onActivate'   => 'Job963\Oxid\AttrEdit\Core\Events::onActivate',
        'onDeactivate' => 'Job963\Oxid\AttrEdit\Core\Events::onDeactivate'
    ],
    'templates'    => [
        'article_jxattredit.tpl' => 'jx/AttrEdit/views/admin/tpl/article_jxattredit.tpl'
    ],
    'settings' => [
        [
            'group' => 'JXATTREDIT_DISPLAY', 
            'name'  => 'sJxAttrEditNumberOfColumns', 
            'type'  => 'select', 
            'value' => '2',
            'constraints' => '2|3|4'
        ]
    ],
    'blocks' => [
        [
            'template' => 'attribute_main.tpl',
            'block' => 'admin_attribute_main_form',
            'file' => 'views/blocks/admin/admin_attribute_main_form.tpl',
        ],
    ]
];