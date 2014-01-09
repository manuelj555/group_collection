<?php

namespace K2\GroupExtension\Twig\Extension;

use Twig_Extension;
use Twig_SimpleFilter;

/**
 * Description of AssetsExtension
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class GroupExtension extends Twig_Extension
{

    public function getName()
    {
        return 'group';
    }

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('group', array($this, 'group')),
        );
    }

    public function group($items)
    {
        
    }

}
