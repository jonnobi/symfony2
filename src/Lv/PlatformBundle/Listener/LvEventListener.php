<?php

namespace Lv\PlatformBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;


/**
 * @author co-yamada
 */
class LvEventListener
{
    /**
     *
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $this->get('session')->set('_locale', $this->getRequest()->getPreferredLanguage());

        $response = $event->getResponse();

        $response->setContent(mb_convert_encoding($response->getContent(), 'SJIS-win', 'UTF-8'));
    }

}
