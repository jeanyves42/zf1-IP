<?php 

class Service_Category
{
    private $categoryMapper;
    
    public function create(Model_Category $category)
    {
        return $this->getCategoryMapper()->insert($category);
    
    }
    
    public function read($categoryId)
    {
        return $this->getCategoryMapper()->find($categoryId);
    }
    
    public function update(Model_Category $category)
    {
        return $this->getCategoryMapper()->update($category);
    }
    
    public function delete($categoryId)
    {
        $categoryTable = new Model_DbTable_Category;
    
        return $categoryTable->delete($categoryId);
    }
    
    public function getList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getCategoryMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Lazy Loading du mapper Category
     */
    private function getCategoryMapper()
    {
        if(null === $this->categoryMapper) {
            $this->categoryMapper = new Model_Mapper_Category();
        }
        return $this->categoryMapper;
    }
}
