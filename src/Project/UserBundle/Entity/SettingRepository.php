<?php

namespace Project\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SettingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SettingRepository extends EntityRepository
{
	public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM ProjectUserBundle:Setting p ORDER BY p.name ASC'
            )
            ->getResult();
    }
}
