<?php



class Character
{

    /**
     * @var INT
     */
    private $id;

    /**
     * @var STRING
     */
    private $name;

    /**
     * @var STRING
     */
    private $japanese_name;

    /**
     * @var STRING
     */
    private $description;

    /**
     * @return int
     */
    public function getId(): INT
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): STRING
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Character
     */
    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getJapaneseName(): STRING
    {
        return $this->japanese_name;
    }

    /**
     * @param string $japanese_name
     * @return Character
     */
    public function setJapaneseName(STRING $japanese_name): Character
    {
        $this->japanese_name = $japanese_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): STRING
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Character
     */
    public function setDescription(STRING $description): Character
    {
        $this->description = $description;
        return $this;
    }

    public function updateIt (\PDO $database, INT $heroId, STRING $heroName, STRING $heroDescription)
    {
        $query = 'UPDATE characters SET name = :name, description= :description WHERE id = :id';
        $prepare = $database->prepare($query);
        $prepare->execute([':name'=>$heroName, ':description'=>$heroDescription, ':id'=>$heroId]);
    }

    public function deleteIt (\PDO $database, INT $heroId){
        $sql = "DELETE FROM characters WHERE id = :id";
        $supp = $database->prepare($sql);
        $supp->execute([':id'=> $heroId]);
    }

    public function addIt(\PDO $database, STRING $heroName, STRING $heroDescription)
    {
        $sql = "INSERT INTO characters (name, description ) VALUES (:name, :description)";
        $myQuery = $database->prepare($sql);
        $myQuery->execute([':name' => $heroName, ':description' => $heroDescription]);
    }

    /*public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }*/

}