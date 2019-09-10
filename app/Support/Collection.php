<?php

declare(strict_types=1);

namespace App\Support;

use IteratorAggregate;
use JsonSerializable;

final class Collection implements IteratorAggregate, JsonSerializable
{
    private $items;

    /**
     * Collection constructor.
     */
    public function __construct()
    {
        $this->items = [];
    }

    public function get(): array
    {
        return $this->items;
    }

    public function push(int $item): void
    {
        array_push($this->items, $item);
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        yield from $this->items;
    }

    public function merge(Collection $newCollection): void
    {
        foreach ($newCollection as $itemOfNewCollection) {
            $this->items[] = $itemOfNewCollection;
        }
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): string
    {
        return $this->toJson();
    }
}
