<?php 

class Model_Category
{
    /**
     * @var integer
     */
    private $categoryId;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $lastUpdate;
	/**
     * @return the $categoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

	/**
     * @param number $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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