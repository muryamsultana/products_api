<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
	/*UserPasswordEncoderInterface $encoder */
	private $encoder;
	/** EntityManager $manager */
	private $manager;
    public function __construct(ManagerRegistry $registry,UserPasswordEncoderInterface $encoder)
    {
        parent::__construct($registry, Users::class);

		$this->manager = $registry->getEntityManager();
		$this->encoder = $encoder;
    }
	/**
 * Create a new user
 * @param $data
 * @return Users
 * @throws \Doctrine\ORM\ORMException
 * @throws \Doctrine\ORM\OptimisticLockException
*/
	public function createNewUser($data)
	{
		$user = new Users();
		$user->setEmail($data['email'])
        ->setPassword($this->encoder->encodePassword($user, $data['password']));

		$this->manager->persist($user);
		$this->manager->flush();

		return $user;
	}

    // /**
    //  * @return Users[] Returns an array of Users objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Users
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
