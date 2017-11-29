<?php

namespace Influencers\Logger;

use Mockery\Exception;
use MongoDB\Client as Mongo;

class MongodbLogger
{
    protected $mongodbHost;
    protected $mongodbPort;

    protected $database = 'influencers';

    protected $collection = 'logs';

    function __construct()
    {
        $this->mongodbHost = env('mongodb_host');
        $this->mongodbPort = env('mongodb_port');

        try {
            $mongo = new Mongo('mongodb://' . $this->mongodbHost . ':' . $this->mongodbPort);
        }
        catch (Exception $e) {
            die($e->getMessage());
        }

        $db = $mongo->selectDatabase($this->database);
        $this->collection = $mongo->selectCollection($this->database, $this->collection);
    }

    /**
     * Listing Data in Collection.
     *
     * @param array $filter array to filter data with
     * @return Array of Data
     */
    public function index($filter = [], $options = [])
    {
        return $this->collection->find($filter, $options);
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
