<?php

declare(strict_types=1);

namespace App\Lib\File;

use App\Lib\File\AbstractCsvExporter;

class DemoExporter extends AbstractCsvExporter
{
    private array $articles;

    /**
     * Set data to properties
     * @return self
     */
    public function setProperties(): self
    {
        // add more
        $this->articles = [
            [1, 'How to download CSV in CakePHP', 1, '2022-01-01 12:00'],
            [2, 'How to download TSV in CakePHP', 2, '2022-01-02 08:00'],
        ];

        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getHeaders(): array
    {
        return [
            'ID',
            'Title',
            'Status',
            'Created'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getDataList(): array
    {
        $dataList = [];

        foreach ($this->articles as $article) {
            // process data if needed
            $dataList[] = $article;
        }

        return $dataList;
    }
}
