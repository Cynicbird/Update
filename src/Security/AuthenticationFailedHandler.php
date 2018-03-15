<?php

namespace App\Security;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;
use Symfony\Component\Security\Http\HttpUtils;

class AuthenticationFailedHandler extends DefaultAuthenticationFailureHandler
{
    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    /**
     * AuthenticationFailedHandler constructor.
     * @param HttpKernelInterface $httpKernel
     * @param HttpUtils $httpUtils
     * @param array $options
     * @param LoggerInterface|null $logger
     * @param FlashBagInterface $flashBag
     */
    public function __construct(
        HttpKernelInterface $httpKernel,
        HttpUtils $httpUtils,
        array $options = array(),
        LoggerInterface $logger = null,
        FlashBagInterface $flashBag
    )

    {
        parent::__construct($httpKernel, $httpUtils, $options, $logger);
        $this->flashBag = $flashBag;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $this->flashBag->add('warning', 'Invalid Credentials');
        return parent::onAuthenticationFailure($request, $exception);
    }


}