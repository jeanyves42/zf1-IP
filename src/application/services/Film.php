<?php 

class Service_Film
{
    private $filmMapper;
    
    /**
     * @param Model_Film $film
     */
    public function create(Model_Film $film)
    {
        return $this->getFilmMapper()->insert($film);
        
    }
    
    /**
     * @param integer $filmId
     */
    public function read($filmId)
    {
        return $this->getFilmMapper()->find($filmId);
    }
    
    /**
     * @param Model_Film $film
     */
    public function update(Model_Film $film)
    {
        return $this->getFilmMapper()->update($film);
    }

    /**
     * @param integer $filmId
     */
    public function delete($filmId)
    {
        $filmTable = new Model_DbTable_Film;
        
        return $filmTable->delete($filmId);
    }
    

    public function getList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getFilmMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Lazy Loading du mapper Film
     */
    private function getFilmMapper()
    {
        if(null === $this->filmMapper) {
            $this->filmMapper = new Model_Mapper_Film();
        }
        return $this->filmMapper;
    }
}