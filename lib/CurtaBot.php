<?php

declare(strict_types=1);

class CurtaBot
{
    protected $pdo;
    protected $calculator;

    /**
     * CurtaBot constructor.
     * @param PDO $pdo
     * @param Calculator $calculator
     */
    public function __construct(PDO $pdo, Calculator $calculator)
    {
        $this->pdo = $pdo;
        $this->calculator = $calculator;
    }

    /**
     * @param $augend
     * @param $addend
     * @return mixed
     */
    public function addination($augend, $addend)
    {
        return $this->calculator->add($augend, $addend);
    }

    /**
     * @param $minuend
     * @param $subtrahend
     * @return mixed
     */
    public function subtractination($minuend, $subtrahend)
    {
        return $this->calculator->subtract($minuend, $subtrahend);
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getSumById($id)
    {
        try {
            $sql = 'SELECT id, vala, valb, valc FROM numbers WHERE id = :id';
            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':id', $id);
            $statement->execute();

            $data = $statement->fetchAll();

            if (count($data) != 1) {
                throw new InvalidArgumentException("Invalid id: $id");
            }

            return $this->calculator->add($data[0]['vala'], $data[0]['valb']);
        } catch (PDOException $e) {
            throw new Exception("Error calculating sum", 1, $e);
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getDifferenceById($id)
    {
        try {
            $sql = 'SELECT id, vala, valb, valc FROM numbers WHERE id = :id';
            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':id', $id);
            $statement->execute();

            $data = $statement->fetchAll();

            if (count($data) != 1) {
                throw new InvalidArgumentException("Invalid id: $id");
            }

            return $this->calculator->subtract($data[0]['vala'], $data[0]['valb']);
        } catch (PDOException $e) {
            throw new Exception("Error calculating difference", 1, $e);
        }
    }

}
