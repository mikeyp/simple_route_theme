<?php

namespace Drupal\simple_route_theme\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Controller for returning the output of a theme function for a page.
 */
class ContentThemeController {

  /**
   * Return the rendered output.
   */
  public function getContentResult(Request $request) {
    return array('#theme' => $this->getThemeArgument($request));
  }

  /**
   * Get the theme hook argument from the request.
   */
  protected function getThemeArgument(Request $request) {
    return $request->attributes->get('_theme');
  }
}
