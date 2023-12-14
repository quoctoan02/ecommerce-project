<?php
namespace Toanpq\Tmdt\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class News extends Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }
}