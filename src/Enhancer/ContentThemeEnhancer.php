<?php

namespace Drupal\simple_route_theme\Enhancer;

use Symfony\Cmf\Component\Routing\Enhancer\RouteEnhancerInterface;
use Symfony\Component\HttpFoundation\Request;

class ContentThemeEnhancer implements RouteEnhancerInterface {

  /**
   * {@inheritdoc}
   */
  public function enhance(array $defaults, Request $request) {
    if (empty($defaults['_controller'])) {
      if (!empty($defaults['_theme'])) {
        $defaults['_controller'] = 'Drupal\simple_route_theme\Controller\ContentThemeController:getContentResult';
      }
    }
    return $defaults;
  }
}
