<?php
/**
 * Subforum repository.
 */
namespace Repository;

use Doctrine\DBAL\Connection;

/**
 * Class SubforumRepository.
 *
 * @package Repository
 */

class SubforumRepository
{
    /**
     * Doctrine DBAL connection.
     *
     * @var \Doctrine\DBAL\Connection $db
     */

    protected $db;
    /**
     * SubforumRepository constructor.
     *
     * @param \Doctrine\DBAL\Connection $db
     */

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }
    /**
     * Fetch all records.
     *
     * @return array Result
     */

    public function findAll()
    {
        $queryBuilder = $this->queryAll();
        return $queryBuilder->execute()->fetchAll();
    }

    protected function queryAll()
    {
        $queryBuilder = $this->db->createQueryBuilder();
        return $queryBuilder->select('s.name', 's.idSubforum')
            ->from('forum_subforum', 's');
    }
}