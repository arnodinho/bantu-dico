<?php
/**
 * Created by PhpStorm.
 * User: arnaudyanga <arnaud.yanga@believedigital.com>
 * Date: 06/04/2020
 * Time: 13:39.
 */

namespace App\Tests\Controller;

use App\Tests\AbstractTest;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * Class AbstractControllerTest
 * @package App\Tests\Controller
 */
class AbstractControllerTest extends AbstractTest
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param ObjectProphecy $handler
     * @param $model
     */
    protected function mockRetrieveById(ObjectProphecy $handler, $model): void
    {
        $handler->retrieveById(
            Argument::is($model->getId())
        )
            ->shouldBeCalledOnce()
            ->willReturn($model);
    }

    /**
     * @param ObjectProphecy $handler
     * @param array $modelTab
     */
    protected function mockRetrieveAll(ObjectProphecy $handler, array $modelTab): void
    {
        $handler->retrieveAll()
            ->shouldBeCalledOnce()
            ->willReturn($modelTab);
    }
}