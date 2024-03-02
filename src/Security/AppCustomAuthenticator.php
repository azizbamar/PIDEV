<?php

namespace App\Security;
<<<<<<< HEAD

use App\Service\TwilioService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
=======
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
<<<<<<< HEAD
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016

class AppCustomAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';
<<<<<<< HEAD
    private SessionInterface $session;
    
    public function __construct(public TwilioService $smsGenerator,private UrlGeneratorInterface $urlGenerator,SessionInterface $session)
   {
    $this->urlGenerator = $urlGenerator;
    $this->session = $session;
=======

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(Security::LAST_USERNAME, $email);
<<<<<<< HEAD
        
=======

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }
<<<<<<< HEAD
public function sendSms(TwilioService $smsGenerator)
   {
      
        // Numéro vérifier par twilio. Un seul numéro autorisé pour la version de test.

       //Appel du service
       $code =$this->generateSixDigitCode();
       $this->session->set('authentication_code', 123);

       // Set a flag to indicate that the user has completed the first factor
       $this->session->set('2fa_authenticated', true);
    //    $smsGenerator->sendSms('+21692741748' ,$code);

     
   }
   function generateSixDigitCode(): int
{
    return mt_rand(100000, 999999);
}

public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
{
    $user = $token->getUser();

    if ($user instanceof \App\Entity\User) {
        // Assuming your User entity has a method getId()
        if ($this->session->get('2fa_authenticated')) {
            // User has completed the second factor, proceed with the regular authentication success logic
            return null; // Allow Symfony to handle the success redirect
        }

        // Generate a 6-digit code

        // Store the code in the session


        // Send the SMS with the generated code
        $this->sendSms($this->smsGenerator);

        // Redirect to the 2FA page with the user ID as a query parameter
        $url = $this->urlGenerator->generate('two_factor_authentication');

        return new RedirectResponse($url);
    }
}
=======

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
        $user = $token->getUser();

        if ($user instanceof \App\Entity\User) {
            // Assuming your User entity has a method getId()
            $userId = $user->getId();
    
            // Redirect to the 'profile' route with the user ID as a query parameter
            $url = $this->urlGenerator->generate('profile');
    
            return new RedirectResponse($url);
        }
    
        // Handle the case where the user is not an instance of your User class
    
        return new RedirectResponse($this->urlGenerator->generate('users-profile'));
    }

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
