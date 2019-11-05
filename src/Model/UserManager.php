<?php


namespace App\Model;

class UserManager extends AbstractManager
{


    /**
     *
     */
    const TABLE = 'user';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param array $user
     * @return int
     */
    public function insert(array $user): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (name, password) 
                                                    VALUES (:name, :password)");
        $statement->bindValue('name', $user['name'], \PDO::PARAM_STR);
        $statement->bindValue('password', $user['password'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }

    /**
     * Get one row from database by name and password.
     *
     * @param  string $name
     * @param  string $password
     *
     * @return array
     */
    public function connectMe(string $name, string $password)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE name = :name");
        $statement->bindValue('name', $name, \PDO::PARAM_STR);
        $statement->execute();

        $value = $statement->fetch();

        if (password_verify($password, $value['password']) == true) {
            return $value;
        }
    }
}
