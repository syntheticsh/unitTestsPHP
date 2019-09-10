<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    private $collection;

    public function setUp(): void
    {
        $this->collection = new \App\Support\Collection();

        parent::setUp();
    }

    /** @test */
    public function emptyInstantiatedCollectionReturnsNoFiles()
    {
        $this->assertEmpty($this->collection->get());
    }

    /** @test */
    public function countIsCorrectForItemsPassedIn()
    {
        $this->collection->push(1);
        $this->collection->push(2);
        $this->collection->push(3);
        $this->assertEquals(3, $this->collection->count());
    }

    /** @test */
    public function itemsReturnedMatchItemsPassedIn()
    {
        $this->collection->push(1);
        $this->collection->push(2);

        $this->assertCount(2, $this->collection->get());
        $this->assertEquals(1, $this->collection->get()[0]);
        $this->assertEquals(2, $this->collection->get()[1]);
    }

    /** @test */
    public function collectionIsInstanceOdIterator()
    {
        $this->assertInstanceOf( IteratorAggregate::class, $this->collection);
    }

    /** @test */
    public function collectionCanBeIterated()
    {
        $this->collection->push(1);
        $this->collection->push(2);
        $this->collection->push(3);

        foreach ($this->collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(Iterator::class, $this->collection->getIterator());
    }

    /** @test */
    public function collectionCanBeMergedWithAnotherCollection()
    {
        $this->collection->push(1);
        $this->collection->push(2);

        $newCollection = new \App\Support\Collection();
        $newCollection->push(3);
        $newCollection->push(4);
        $newCollection->push(5);

        $this->collection->merge($newCollection);

        $this->assertEquals(5, $this->collection->count());
    }

    /** @test */
    public function canAddToExistingCollection()
    {
        $this->collection->push(1);
        $this->collection->push(2);

        $this->assertEquals(2, $this->collection->count());
    }

    /** @test */
    public function collectionCanBeJsonEncoded()
    {
        $this->collection->push(1);
        $this->collection->push(2);

        $this->assertIsString( $this->collection->toJson());
        $this->assertEquals('[1,2]', $this->collection->toJson());
    }

    /** @test */
    public function jsonEcodingCollectionReturnsJson()
    {
        $this->collection->push(1);
        $this->collection->push(2);

        $json = json_encode($this->collection);

        $this->assertIsString( $json);
        $this->assertEquals('"[1,2]"', $json);
    }
}
