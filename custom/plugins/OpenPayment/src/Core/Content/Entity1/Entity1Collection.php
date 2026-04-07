<?php declare(strict_types=1);

namespace Swag\OpenPayment\Core\Content\Entity1;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void add(Entity1Entity $entity)
 * @method void set(string $key, Entity1Entity $entity)
 * @method Entity1Entity[] getIterator()
 * @method Entity1Entity[] getElements()
 * @method Entity1Entity|null get(string $key)
 * @method Entity1Entity|null first()
 * @method Entity1Entity|null last()
 */
class Entity1Collection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return Entity1Entity::class;
    }
}
