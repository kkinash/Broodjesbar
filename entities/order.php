<?php
declare(strict_types=1);
// entities/order.php



class order {
    private int $id;
    private string $brood;
    private string $person;
    private string $status;	

    public function __construct(int $id, string $brood, string $person, string $status) {
        $this->id = $id;
        $this->brood = $brood;
        $this->person = $person;
        $this->status = $status;
    }

   /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of broodid
     */ 
    public function getBrood()
    {
        return $this->brood;
    }

    /**
     * Set the value of broodid
     *
     * @return  self
     */ 
    public function setBroodid($brood)
    {
        $this->brood = $brood;

        return $this;
    }

    /**
     * Get the value of userid
     */ 
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set the value of userid
     *
     * @return  self
     */ 
    public function setPersonid($person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}