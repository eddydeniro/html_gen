<?php
declare(strict_types = 1);

namespace Html;

final class StringElement implements ElementInterface
{
    private $children = [];

    public static function create(string ...$children)
    {
        return new static(...$children);
    }

    public function __construct(string ...$children)
    {
        $this->children = $children;
    }

    public function __call(string $name, array $arguments): ElementInterface
    {
        return $this;
    }

    public function __toString(): string
    {
        return implode('', $this->children);
    }

    public function data(string $key, $value): ElementInterface
    {
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'tag' => 'raw',
            'children' => $this->children,
        ];
    }

    public function __serialize()
    {
        return $this->jsonSerialize();
    }

    public function __unserialize($data)
    {
        $this->children = $data['children'];
    }
}
