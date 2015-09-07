<?php

namespace Odiseo\Bundle\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class NotificationController extends Controller
{
	public function indexAction(Request $request)
    {
		$notifications = $this->get('odiseo_notification.repository.notification')->findByOwner($this->getUser());

   		return $this->render('OdiseoNotificationBundle:Frontend/Notification:index.html.twig', array(
            'notifications' => $notifications
        ));
    }

    public function markAsReadAction(Request $request)
    {
        if($exceptType = $request->get('exceptType'))
        {
            $this->get('odiseo_notification.repository.notification')->markAsReadByOwnerAndExceptType($this->getUser(), $exceptType);
        }

        if($type = $request->get('type'))
        {
            $this->get('odiseo_notification.repository.notification')->markAsReadByOwnerAndTypes($this->getUser(), array($type));
        }

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}
