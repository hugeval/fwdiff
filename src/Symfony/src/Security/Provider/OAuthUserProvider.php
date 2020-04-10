<?php

namespace App\Security\Provider;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class OAuthUserProvider extends \HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @return User|\HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser|\Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $email = $response->getEmail();
        if ($email) {
            /** @var \App\Entity\User|null $user */
            $user = $this->userRepository->findOneBy(['email' => $email]);
            if (!$user) {
                $user = new User();
            }
            $user->setEmail($email);
            $data = $response->getData();
            if (!empty($data['id']) && !$user->getGoogleId()) {
                $user->setGoogleId($data['id']);
            }
            if (!empty($data['name']) && !$user->getFullName()) {
                $user->setUsername(\mb_strtolower(\str_replace(' ', '_', $data['name'])));
                $user->setFullName($data['name']);
            }
            if (!$user->getPassword()) {
                $encodedPassword = $this->passwordEncoder->encodePassword($user, \microtime(true));
                $user->setPassword($encodedPassword);
            }
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $user;
        }

        return parent::loadUserByOAuthUserResponse($response);
    }
}
