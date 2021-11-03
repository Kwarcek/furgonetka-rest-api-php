<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Label
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Label extends Entity
{
    const PAGE_FORMAT_A4 = 'a4';
    const PAGE_FORMAT_A6 = 'a4';

    const FILE_FORMAT_PDF = 'pdf';
    const FILE_FORMAT_ZPL = 'zpl';
    const FILE_FORMAT_EPL = 'epl';

    /** @var string $pageFormat */
    public string $pageFormat = self::PAGE_FORMAT_A4;

    /** @var string $fileFormat */
    public string $fileFormat = self::FILE_FORMAT_PDF;

    /** @var bool $addCuttingLine */
    public bool $addCuttingLine = false;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page_format' => $this->pageFormat,
            'file_format' => $this->fileFormat,
            'add_cutting_line' => $this->addCuttingLine,
        ];
    }
}