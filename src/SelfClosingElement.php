<?php
declare(strict_types = 1);

namespace Html;

final class SelfClosingElement implements ElementInterface
{
    use ElementTrait;

    public static function create(string $tagName, array $attributes, int $options = 0)
    {
        return new static($tagName, $attributes[0] ?? [], $options);
    }

    public function __toString(): string
    {
        return $this->getOpeningHtml();
    }

    public function jsonSerialize(): array
    {
        return [
            'tag' => $this->tagName,
            'attributes' => $this->attributes,
        ];
    }

    public function __serialize()
    {
        return $this->jsonSerialize();
    }

    public function __unserialize($data)
    {
        $this->tagName = $data['tag'];
        $this->attributes = $data['attributes'];
    }
}
