<?php 

class Model_Actor
{
    /**
     * @var integer
     */
    private $actorId;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $lastUpdate;
	/**
     * @return the $actorId
     */
    public function getActorId()
    {
        return $this->actorId;
    }

	/**
     * @param number $actorId
     */
    public function setActorId($actorId)
    {
        $this->actorId = $actorId;
        return $this;
    }

	/**
     * @return the $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

	/**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

	/**
     * @return the $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

	/**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

	/**
     * @return the $lastUpdate
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

	/**
     * @param string $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

}