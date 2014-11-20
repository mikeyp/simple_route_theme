<?php

/**
 * @file
 * Definition of Drupal\simple_route_theme\EventSubscriber\ContentThemeControllerSubscriber.php
 */

namespace Drupal\simple_route_theme\EventSubscriber;

use Drupal\simple_route_theme\Controller\ContentThemeController;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;


/**
 * Class ContentThemeControllerSubscriber
 * @package Drupal\simple_route_theme\EventSubscriber
 */
class ContentThemeControllerSubscriber implements EventSubscriberInterface, ContainerAwareInterface {

  use ContainerAwareTrait;

  public function onRequestDeriveThemeWrapper(GetResponseEvent $event) {
    $request = $event->getRequest();

    if ($theme_hook = $request->attributes->get('_theme')) {
      $controller = new ContentThemeController($theme_hook, $request);
      $request->attributes->set('_content', array($controller, 'getContent'));
    }
  }

  /**
   * Registers the methods in this class that should be listeners.
   *
   * @return array
   *   An array of event listener definitions.
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('onRequestDeriveThemeWrapper', 29);

    return $events;
  }

}
