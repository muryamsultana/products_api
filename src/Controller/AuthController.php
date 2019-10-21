<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
# Import those
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UsersRepository;

class AuthController extends AbstractController
{
	/** @var UsersRepository $userRepository */
    private $usersRepository;

    /**
     * AuthController Constructor
     *
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
    /**
     * @Route("/auth", name="auth")
     */
    public function index()
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }
	/**
	 * Register new user
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function register(Request $request)
	{
		$newUserData['email']    = $request->get('email');
		$newUserData['password'] = $request->get('password');

		$user = $this->usersRepository->createNewUser($newUserData);

		return new Response(sprintf('User %s successfully created', $user->getUsername()));
	}
}
