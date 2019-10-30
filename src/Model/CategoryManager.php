<?php


namespace App\Model;


class CategoryManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'category';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    /**
     * @param array $category
     * @return int
     */
    public function insert(array $category): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (title) VALUES (:title_ph)");
        $statement->bindValue('title_ph', $category['title'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }


    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


    /**
     * @param array $category
     * @return bool
     */
    public function update(array $category): bool
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET 
                title = :title_ph,
        WHERE id=:id");
        $statement->bindValue('id', $category['id'], \PDO::PARAM_INT);
        $statement->bindValue('title_ph', $category['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}