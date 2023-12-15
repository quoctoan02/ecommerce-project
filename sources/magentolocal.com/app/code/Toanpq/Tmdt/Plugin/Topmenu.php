<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Created By : Rohan Hapani
 */
namespace Toanpq\Tmdt\Plugin;

use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\UrlInterface;

class Topmenu {
    /**
     * @var NodeFactory
     */
    protected $nodeFactory;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param NodeFactory  $nodeFactory
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        NodeFactory $nodeFactory,
        UrlInterface $urlBuilder
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->urlBuilder = $urlBuilder;
    }

    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
                                          $outermostClass = '',
                                          $childrenWrapClass = '',
                                          $limit = 0
    ) {
        /**
         * Parent Menu
         */
        $menuNode1 = $this->nodeFactory->create(
            [
                'data' => $this->getNodeAsArray("News", "tmdt/index/news"),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree(),
            ]
        );
        $menuNode2 = $this->nodeFactory->create(
            [
                'data' => $this->getNodeAsArray("Currency Rate", "tmdt/index/currencyrate"),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree(),
            ]
        );
        $menuNode3 = $this->nodeFactory->create(
            [
                'data' => $this->getNodeAsArray("Weather", "tmdt/index/weather"),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree(),
            ]
        );
        /**
         * Add Child Menu
         */
//        $menuNode->addChild(
//            $this->nodeFactory->create(
//                [
//                    'data' => $this->getNodeAsArray("Sub Menu", "tmdt/index/weather"),
//                    'idField' => 'id',
//                    'tree' => $subject->getMenu()->getTree(),
//                ]
//            )
//        );
        $subject->getMenu()->addChild($menuNode1);
        $subject->getMenu()->addChild($menuNode2);
        $subject->getMenu()->addChild($menuNode3);
    }

    protected function getNodeAsArray($name, $id) {
        $url = $this->urlBuilder->getUrl($id);
        return [
            'name' => __($name),
            'id' => $id,
            'url' => $url,
            'has_active' => false,
            'is_active' => false,
        ];
    }
}
