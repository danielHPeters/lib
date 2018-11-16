<?php

namespace lib\filter;

interface Filter {
  public function filter(array $variables): void ;
}
