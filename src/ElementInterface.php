<?php
declare(strict_types = 1);

namespace Html;

use JsonSerializable;

interface ElementInterface extends JsonSerializable
{
    public function __call(string $name, array $arguments): ElementInterface;

    public function __toString(): string;

    public function data(string $key, $value): ElementInterface;
}
