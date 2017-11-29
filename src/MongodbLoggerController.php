<?php

namespace Influencers\Logger;

use MongoDB\Client as Mongo;

class MongodbLogger
{
    protected $database = 'influencers';

    protected $collection = 'logs';

    function __construct()
    {
        $mongo = new Mongo('mongodb://127.0.0.1:27017');
        $db = $mongo->selectDatabase($this->database);
        $this->collection = $mongo->selectCollection($this->database, $this->collection);
    }

    /**
     * Listing Data in Collection.
     *
     * @param array $filter array to filter data with
     * @return Array of Data
     */
    public function index($filter = [])
    {
        return $this->collection->find($filter);
    }

    /**
     * Inserting Record in Collection.
     *
     * @param mixed $record Record to insert in collection
     * @return InsertOneResult
     */
    public function insert($record)
    {
        return $this->collection->insertOne($record);
    }
}
