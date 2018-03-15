<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;
use Symfony\Component\Security\Http\HttpUtils;

/**
 * @property FlashBagInterface flashBag
 */
class AuthenticationSuccessHandler extends DefaultAuthenticationSuccessHandler
{
    /**
     * AuthenticationSuccessHandler constructor.
     * @param HttpUtils $httpUtils
     * @param array $options
     * @param FlashBagInterface $flashBag
     */
    public function __construct(HttpUtils $httpUtils, array $options = array(), FlashBagInterface $flashBag)
    {
        parent::__construct($httpUtils, $options);

        $this->flashBag = $flashBag;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $this->flashBag->add('success', 'Successful authentication!');
        return parent::onAuthenticationSuccess($request, $token);
    }


}