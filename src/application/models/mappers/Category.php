<?php

class Model_Mapper_Category
{
    private $categoryTable;
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $result = $this->getCategoryTable()->fetchAll($where, $order, $count, $offset);
        if (0 === $result->count()) {
            return false;
        }
        $films = array();
        foreach ($result as $row) {
            $films[] = $this->rowToObject($row);
        }
    
        return $films;
    }
    
    public function find($categoryId)
    {
        $result = $this->getCategoryTable()->find($categoryId);
        if (0 === $result->count()) {
            return false;
        }
    
        return $this->rowToObject($result[0]);
    }
    
    public function insert(Model_Category $category)
    {
        $data = $this->objectToRow($category);
    
        return $this->getCategoryTable()->insert($data);
    }
    
    public function update(Model_Category $category)
    {
        $data = $this->objectToRow($category);
        $where = array('category_id = ?', $category->getCategoryId());
    
        return $this->getCategoryTable()->update($data, $where);
    }
    
    public function fetchByFilm($id)
    {
        $table = new Model_DbTable_FilmCategory;
        $result = $table->fetchAll(array('film_id = ?' => $id));
        $categories = array();
        foreach($result as $row) {
            $categories[] = $this->find($row['category_id']);
        }
        return $categories;
    }
    
    /**
     * @param Model_Category $category
     * @return array
     */
    private function objectToRow(Model_Category $category)
    {
        return array(
            'category_id' => $category->getCategoryId(),
            'name' => $category->getName(),
            'last_update' => $category->getLastUpdate()
        );
    }
    
    /**
     * @param array $data
     * @return Model_Category
     */
    private function rowToObject($data)
    {
        $category = new Model_Category;
        $category   ->setCategoryId($data['category_id'])
                    ->setName($data['name'])
                    ->setLastUpdate($data['last_update']);

        return $category;
    }
    
    
    /**
     * Lazy Loading du Table Film
     */
    private function getCategoryTable()
    {
        if(null === $this->categoryTable) {
            $this->categoryTable = new Model_DbTable_Category;
        }
        return $this->categoryTable;
    }
}
