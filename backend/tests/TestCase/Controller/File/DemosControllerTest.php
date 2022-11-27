<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\File\DemosController Test Case
 *
 * @uses \App\Controller\File\DemosController
 */
class DemosControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public function testDownloadCsv()
    {
        $this->get('/file/demos/downloadCsv');
        $this->assertResponseOk();
    }

    public function testDownloadTsv()
    {
        $this->get('/file/demos/downloadTsv');
        $this->assertResponseOk();
    }
}
