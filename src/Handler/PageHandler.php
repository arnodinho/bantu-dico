<?php
/**
 * Created by PhpStorm.
 * User: arnaudyanga <arnaud.yanga@believedigital.com>
 * Date: 18/02/2020
 * Time: 16:39.
 */

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Page;
use App\Entity\StorableEntityInterface;
use App\Manager\PageManager;

/**
 * Class PageHandler.
 */
class PageHandler extends AbstractHandler implements HandlerInterface
{
    /**
     * @var PageManager
     */
    protected PageManager $pageManager;

    /**
     * PageHandler constructor.
     * @param PageManager $pageManager
     */
    public function __construct(PageManager $pageManager)
    {
        $this->pageManager = $pageManager;
    }

    /**
     * @param int $id
     * @return Page|null
     */
    public function retrieveById(int $id)
    {
        return $this->pageManager->findById($id);
    }

    /**
     * @return array|null
     */
    public function retrieveAll(): ?array
    {
        return $this->pageManager->findAll();
    }

    /**
     * @param StorableEntityInterface $entity
     */
    public function create(StorableEntityInterface $entity): void
    {
        $this->pageManager->save($entity);
    }

    public function deleteById(int $id)
    {
        if ($entity = $this->pageManager->findById($id)) {
            $this->pageManager->delete($entity);
        }
    }

    public function update(StorableEntityInterface $entity):void
    {
        $this->pageManager->save($entity);
    }
}
