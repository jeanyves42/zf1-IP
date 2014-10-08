<?php

class Model_Mapper_Actor
{
    private $actorTable;
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $result = $this->getActorTable()->fetchAll($where, $order, $count, $offset);
        if (0 === $result->count()) {
            return false;
        }
        $films = array();
        foreach ($result as $row) {
            $films[] = $this->rowToObject($row);
        }
    
        return $films;
    }
    
    public function find($actorId)
    {
        $result = $this->getActorTable()->find($actorId);
        if (0 === $result->count()) {
            return false;
        }
    
        return $this->rowToObject($result[0]);
    }
    
    public function insert(Model_Actor $actor)
    {
        $data = $this->objectToRow($actor);
    
        return $this->getActorTable()->insert($data);
    }
    
    public function update(Model_Actor $actor)
    {
        $data = $this->objectToRow($actor);
        $where = array('actor_id = ?', $actor->getActorId());
    
        return $this->getActorTable()->update($data, $where);
    }
    
    public function fetchByFilm($id)
    {
        $table = new Model_DbTable_FilmActor;
        $result = $table->fetchAll(array('film_id = ?' => $id));
        $actors = array();
        foreach($result as $row) {
            $actors[] = $this->find($row['actor_id']);
        }
        return $actors;
    }
    
    /**
     * @param Model_Actor $actor
     * @return array
     */
    private function objectToRow(Model_Actor $actor)
    {
        return array(
            'actor_id' => $actor->getActorId(),
            'first_name' => $actor->getFirstName(),
            'last_name' => $actor->getLastName(),
            'last_update' => $actor->getLastUpdate()
        );
    }
    
    /**
     * @param array $data
     * @return Model_Actor
     */
    private function rowToObject($data)
    {
        $actor = new Model_Actor;
        $actor  ->setActorId($data['actor_id'])
                ->setFirstName($data['first_name'])
                ->setLastName($data['last_name'])
                ->setLastUpdate($data['last_update']);

        return $actor;
    }
    
    
    /**
     * Lazy Loading du Table Film
     */
    private function getActorTable()
    {
        if(null === $this->actorTable) {
            $this->actorTable = new Model_DbTable_Actor;
        }
        return $this->actorTable;
    }
}