<?php

namespace O2W\O2WBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class SlugController extends Controller
{

    public $models = array(
        "secciones",
        "contenidos",
        'menus_item'
    );
    /**
     * @Template
     */
    public function findAction($slug)
    {
        foreach ($this->models as $model) {
            if ($item = $model::factory()->selectFirst("slug like '$slug'")) {
                break;
            }
        }

        if (isset($item)) {
            if ($controller = $item->getController()) {
                $response = $this->forward(
                    $controller,
                    array(
                        'model' => $model,
                        'item' => $item
                    )
                );
                return $response;
            }
        }

        throw $this->createNotFoundException('Page not found.');
    }

}
