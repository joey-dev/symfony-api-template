<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
    }

    public function loadUsers(ObjectManager $manager)
    {
        $mainUser = $this->createMainUser();
        $testUser = $this->createTestUser();

        $manager->persist($mainUser);
        $manager->persist($testUser);
        $manager->flush();
    }

    private function createMainUser(): User
    {
        $user = new User();
        $user->setUsername("joey");
        $user->setFirstName("joey");
        $user->setLastName("stil");
        $user->setEmail("joeystil3@gmail.com");
        $user->setPassword($this->userPasswordEncoder->encodePassword(
            $user,
            "Tester123"
        ));

        return $user;
    }

    private function createTestUser(): User
    {
        $user = new User();
        $user->setUsername("test");
        $user->setFirstName("test");
        $user->setLastName("test");
        $user->setEmail("test@test.test");
        $user->setPassword($this->userPasswordEncoder->encodePassword(
            $user,
            "test123"
        ));

        return $user;
    }
}
