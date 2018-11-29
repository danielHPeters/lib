<?php

namespace lib\database;

interface DatabaseConnectionManager {
  public function getAdapter (string $adapterClass): Adapter;
}
