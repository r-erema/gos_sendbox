<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 11.44
 */

namespace learning\Doctrine\src;
use Doctrine\ORM\EntityRepository;

/**
 * Class BugRepository
 * @package learning\Doctrine\src
 */
class BugRepository extends EntityRepository {

    /**
     * @param int $number
     * @return array
     */
    public function getRecentBugs($number = 30) {
        $dql = 'SELECT b, e, r FROM learning\Doctrine\src\Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getResult();
    }

    /**
     * @param int $number
     * @return array
     */
        public function getRecentBugsArray($number = 30) {
        $dql = "SELECT b, e, r, p FROM learning\Doctrine\src\Bug b JOIN b.engineer e ".
               "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getArrayResult();
    }

    /**
     * @param $userId
     * @param int $number
     * @return array
     */
    public function getUsersBugs($userId, $number = 15) {
        $dql = "SELECT b, e, r FROM learning\Doctrine\src\Bug b JOIN b.engineer e JOIN b.reporter r ".
               "WHERE b.status = 'OPEN' AND e.id = ?1 OR r.id = ?1 ORDER BY b.created DESC";

        return $this->getEntityManager()->createQuery($dql)
                             ->setParameter(1, $userId)
                             ->setMaxResults($number)
                             ->getResult();
    }

    /**
     * @return array
     */
    public function getOpenBugsByProduct() {
        $dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM learning\Doctrine\src\Bug b ".
               "JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
        return $this->getEntityManager()->createQuery($dql)->getScalarResult();
    }
}