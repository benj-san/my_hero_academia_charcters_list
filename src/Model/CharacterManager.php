<?php


namespace App\Model;

class CharacterManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'characters';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * Get all row from database.
     *
     * @return array
     */
    public function selectAllByCategory($category): array
    {
        $myQuery =  $this->pdo->query("SELECT characters.id,
       $this->table.name,
       $this->table.description,
       $this->table.picture,
       $this->table.background,
       category.title
        FROM $this->table
             JOIN category 
             ON category.id = $this->table.category_id
             WHERE $this->table.category_id = $category");
        $categoriesHeroes = $myQuery->fetchAll();
        return $categoriesHeroes;
    }


    /**
     * @param array $character
     * @return int
     */
    public function insert(array $character): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (name, description, category_id) 
                                                    VALUES (:name, :description, :category)");
        $statement->bindValue('name', $character['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $character['description'], \PDO::PARAM_STR);
        $statement->bindValue('category', $character['category_id'], \PDO::PARAM_STR);

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
     * @param array $character
     * @return bool
     */
    public function update(array $character): bool
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET 
                 name = :name, 
                 description = :description 
        WHERE id=:id");
        $statement->bindValue('id', $character['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $character['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $character['description'], \PDO::PARAM_STR);

        return $statement->execute();
    }

}