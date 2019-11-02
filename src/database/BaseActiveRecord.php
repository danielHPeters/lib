<?php

namespace lib\database;

use JsonSerializable;
use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;
use function get_object_vars;
use function property_exists;

/**
 * Class AbstractMapper.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
class BaseActiveRecord implements ActiveRecord, JsonSerializable {
  /**
   * @var Client
   */
  protected static $db;
  /**
   * @var string
   */
  protected static $table;

  public static function setDb (Client $db) {
    static::$db = $db;
  }

  public function getDb (): Client {
    return static::$db;
  }

  public static function find (string $conditions = ''): Collection {
    $collection = new ArrayList();
    static::$db->select(static::$table, $conditions);

    while ($data = static::$db->fetchArray()) {
      $collection->add(self::instantiate($data));
    }

    return $collection;
  }

  public static function findById (int $id): ActiveRecord {
    static::$db->select(static::$table, 'id = ' . $id);
    $data = static::$db->fetchArray();

    return $data !== null ? static::instantiate($data) : null;
  }

  public function insert () {
    static::$db->insert(static::$table, $this->jsonSerialize());
  }

  public function update () {
    // TODO Implement
  }

  public function delete () {
    // TODO Implement
  }

  private static function instantiate (array $record): ActiveRecord {
    $object = new static;

    foreach ($record as $property => $value) {
      if (property_exists($object, $property)) {
        $object->$property = $value;
      }
    }

    return $object;
  }

  /**
   * Serializes the entity to an array which can be used in json_encode.
   * Also serializes member entities.
   *
   * @return array This entity in array form
   */
  public function jsonSerialize (): array {
    $array = get_object_vars($this);
    foreach ($array as &$value) {
      if ($value instanceof ActiveRecord) {
        $value = $value->jsonSerialize();
      }
    }

    return $array;
  }
}
