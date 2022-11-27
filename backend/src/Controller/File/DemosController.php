<?php

declare(strict_types=1);

namespace App\Controller\File;

use App\Controller\AppController;
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

        // $exporter = new DemoCsvExporter();
        // $tmpFilepath = $exporter->setProperties($project->id)->export();

        $now = FrozenTime::now()->i18nFormat('yyyyMMdd_HHmmss');
        $exportName = "{$now}_demo.csv";

        // $response = $this->response->withFile($tmpFilepath, ['download' => true, 'name' => $exportName]);

        return $this->response;
    }
}
