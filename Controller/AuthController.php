<?php

namespace GT\AuthBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;


class AuthController extends Controller
{

    /**
     * @return mixed
     */
	public function loginAction()
    {


		$title_page = $this->container->getParameter('gt_auth.title_page');
		$title_block = $this->container->getParameter('gt_auth.title_block');
		$header_tpl = $this->container->getParameter('gt_auth.header_tpl');
		$footer_tpl = $this->container->getParameter('gt_auth.footer_tpl');
		$redirect_success = $this->container->getParameter('gt_auth.redirect_success');

		$securityContext = $this->container->get('security.context');
		if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

		    $request = $this->getRequest();
		    $session = $request->getSession();

		    if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		    } else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
		    }

			return $this->render('FrappuccinoAppAdminBundle:Auth:login.html.twig', array(
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				"title_page" => $title_page,
				"title_block" => $title_block,
				"header_tpl" => $header_tpl,
				"footer_tpl" => $footer_tpl,
				'error' => $error,
				));

		} else {
		    return $this->redirect($this->generateUrl($redirect_success));
		}
    }


    public function logoutAction()
    {
		$this->get('request')->getSession()->invalidate();
    }

}