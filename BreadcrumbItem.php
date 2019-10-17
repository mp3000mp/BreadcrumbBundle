<?php

namespace MP3000MP\BreadcrumbBundle;

/**
 * One breadcrumb item (one link).
 *
 * Class BreadcrumbItem
 */
class BreadcrumbItem
{
    /** @var string */
    private $href;

    /** @var string */
    private $label;

    /** @var string */
    private $translation_domain;

    /** @var array */
    private $translation_args = [];

    /**
     * BreadcrumbItem constructor.
     *
     * @param string      $label
     * @param string|null $href
     * @param array       $translation_args
     * @param string      $translation_domain
     */
    public function __construct(string $label, ?string $href, array $translation_args, string $translation_domain)
    {
        $this->label = $label;
        $this->href = $href;
        $this->translation_args = $translation_args;
        $this->translation_domain = $translation_domain;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getTranslationDomain(): string
    {
        return $this->translation_domain;
    }

    /**
     * @return array
     */
    public function getTranslationArgs(): array
    {
        return $this->translation_args;
    }
}
