<?php

namespace App\Lib\File;

use Cake\I18n\FrozenTime;
use CsvCombine\Export\CsvExport;

/**
 * Abstract class for CSV/TSV file export
 *
 * Need to hold this instance in a variable since this purge tmp files in destructor.
 * e.g.) $exporter = new XxxxExporter();
 */
abstract class AbstractCsvExporter
{
    const EXPORT_DIR = TMP;

    private array $defaultExportConfig = [
        'export_encoding' => 'UTF-8',
    ];

    private CsvExport $exporter;

    private string $tmpFilePath;

    /**
     * @return void
     */
    public function __construct(array $exportConfig = [])
    {
        $this->exporter = new CsvExport();
        $this->tmpFilePath = self::EXPORT_DIR . FrozenTime::now()->i18nFormat('yyyyMMdd_HHmmss') . '_' . rand(0, 10000);
        $this->defaultExportConfig = array_merge($this->defaultExportConfig, $exportConfig);
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        $this->purgeTmpFile();
    }

    ##############################################################################
    # Abstract
    ##############################################################################

    /**
     * Get header part
     * @return array<string|int>
     */
    abstract protected function getHeaders(): array;

    /**
     * Get data part
     * @return array<array<mixed>>
     */
    abstract protected function getDataList(): array;

    ##############################################################################
    # Public Methods
    ##############################################################################

    /**
     * Create exporting CSV file then return its filepath
     * @return string
     */
    public function exportCsv(): string
    {
        $this->exporter->make($this->makeExportData(), $this->tmpFilePath, $this->defaultExportConfig);

        return $this->tmpFilePath;
    }

    /**
     * Create exporting TSV file then return its filepath
     * @return string
     */
    public function exportTsv(): string
    {
        $exportConfig = array_merge($this->defaultExportConfig, ['delimiter' => "\t"]);
        $this->exporter->make($this->makeExportData(), $this->tmpFilePath, $exportConfig);

        return $this->tmpFilePath;
    }

    ##############################################################################
    # Private Methods
    ##############################################################################

    /**
     * Purge tmp file
     * @return void
     */
    private function purgeTmpFile(): void
    {
        unlink($this->tmpFilePath);
    }

    /**
     * Make data to export
     * @return array
     */
    private function makeExportData(): array
    {
        return array_merge([$this->getHeaders()], $this->getDataList());
    }
}
