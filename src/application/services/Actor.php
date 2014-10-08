<?php 

class Service_Actor
{
    private $actorMapper;
    
    public function create(Model_Actor $actor)
    {
        return $this->getActorMapper()->insert($actor);
    
    }
    
    public function read($actorId)
    {
        return $this->getActorMapper()->find($actorId);
    }
    
    public function update(Model_Actor $actor)
    {
        return $this->getActorMapper()->update($actor);
    }
    
    public function delete($actorId)
    {
        $actorTable = new Model_DbTable_Actor;
    
        return $actorTable->delete($actorId);
    }
    
    public function getList($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getActorMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Lazy Loading du mapper Film
     */
    private function getActorMapper()
    {
        if(null === $this->actorMapper) {
            $this->actorMapper = new Model_Mapper_Actor();
        }
        return $this->actorMapper;
    }
}