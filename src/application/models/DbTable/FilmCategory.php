<?php 

class Model_DbTable_FilmCategory extends Zend_Db_Table_Abstract
{
    protected $_name = 'film_category';
    protected $_primary = array('film_id', 'category_id');
}