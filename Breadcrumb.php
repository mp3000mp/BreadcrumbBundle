<?php

namespace MP3000MP\BreadcrumbBundle;

/**
 * One breadcrumb.
 *
 * Class BreadcrumbManager
 */
class Breadcrumb
{
    /** @var string */
    private $id;

    /** @var string */
    private $translation_domain;

    /** @var string */
    private $twig_template;

    /** @var BreadcrumbItem[] */
    private $itemList = [];

    /**
     * Breadcrumb constructor.
     *
     * @param string $translation_domain
     * @param string $twig_template
     */
    public function __construct(string $translation_domain, string $twig_template)
    {
        $this->translation_domain = $translation_domain;
        $this->twig_template = $twig_template;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * set translation domain by default.
     *
     * @param string $translation_domain
     */
    public function setTranslationDomain(string $translation_domain): void
    {
        $this->translation_domain = $translation_domain;
    }

    /**
     * @return string
     */
    public function getTranslationDomain(): string
    {
        return $this->translation_domain;
    }

    /**
     * @param string $twig_template
     */
    public function setTwigTemplate(string $twig_template): void
    {
        $this->twig_template = $twig_template;
    }

    /**
     * @return string
     */
    public function getTwigTemplate()
    {
        return $this->twig_template;
    }

    /**
     * @return BreadcrumbItem[]
     */
    public function getItems(): array
    {
        return $this->itemList;
    }

    /**
     * Create new item and select it.
     *
     * @param string $label
     * @param string $href
     */
    public function addItem(string $label, ?string $href = null, array $tanslation_args = [], string $translation_domain = null): void
    {
        if (null === $translation_domain) {
            $translation_domain = $this->translation_domain;
        }
        $breadCrumbItem = new BreadcrumbItem($label, $href, $tanslation_args, $translation_domain);
        $this->itemList[] = $breadCrumbItem;
    }
}
