<?php

namespace Drupal\simple_route_theme\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Controller for returning the output of a theme function for a page.
 */
class ContentThemeController {

  /**
   * The theme hook to use to build the output.
   *
   * @var string
   */
  protected $themeHook;

  /**
   * The request service.
   *
   * @var \Symfony\Component\HttpFoundation\Request;
   */
  protected $request;

  /**
   * Constructs a new ContentThemeController.
   *
   * @param string $theme_hook
   *   The theme hook to use for generating the content.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request.
   */
  function __construct($theme_hook) {
    $this->themeHook = $theme_hook;
  }

  /**
   * Return the rendered output.
   */
  function getContent() {
    return array('#theme' => $this->themeHook);
  }
}
