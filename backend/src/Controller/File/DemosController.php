<?php

declare(strict_types=1);

namespace App\Controller\File;

use App\Controller\AppController;
use App\Lib\File\DemoExporter;
use Cake\Http\Response;
use Cake\I18n\FrozenTime;

/**
 * File/Demos Controller
 */
class DemosController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->disableAutoRender();
    }

    public function downloadCsv(): Response
    {
        $this->request->allowMethod(['get']);

        $exporter = new DemoExporter();
        $tmpFilepath = $exporter->setProperties()->exportCsv();

        $now = FrozenTime::now()->i18nFormat('yyyyMMdd_HHmmss');
        $exportName = "{$now}_demo.csv";

        $response = $this->response->withFile($tmpFilepath, ['download' => true, 'name' => $exportName]);

        return $response;
    }

    public function downloadTsv(): Response
    {
        $this->request->allowMethod(['get']);

        $exporter = new DemoExporter();
        $tmpFilepath = $exporter->setProperties()->exportTsv();

        $now = FrozenTime::now()->i18nFormat('yyyyMMdd_HHmmss');
        $exportName = "{$now}_demo.tsv";

        $response = $this->response->withFile($tmpFilepath, ['download' => true, 'name' => $exportName]);

        return $response;
    }
}
