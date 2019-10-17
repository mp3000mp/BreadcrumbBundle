<?php

namespace MP3000MP\BreadcrumbBundle;

/**
 * Public service.
 *
 * Class BreadcrumbManager
 */
class BreadcrumbManager
{
    /** @var Breadcrumb[] */
    private $breadCrumbList = [];

    /** @var string */
    private $selectedBreadcrumbId = 'default';

    /** @var string */
    private $translationDomain;

    /** @var string */
    private $twigTemplate;

    /**
     * BreadcrumbManager constructor.
     * 'default' breadCrumb is implicitly created and selected.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->translationDomain = $options['translation_domain'];
        $this->twigTemplate = $options['twig_template'];
        $this->selectBreadcrumb('default');
    }

    /**
     * Get an existing breadCrumb or create a new one and return it.
     *
     * @param string $breadCrumbId
     *
     * @return $this
     */
    public function selectBreadcrumb(string $breadCrumbId): self
    {
        if (!isset($this->breadCrumbList[$breadCrumbId])) {
            $this->createBreadcrumb($breadCrumbId);
        }
        $this->selectedBreadcrumbId = $breadCrumbId;

        return $this;
    }

    /**
     * Create a new breadCrumb.
     *
     * @param string $breadCrumbId
     */
    private function createBreadcrumb(string $breadCrumbId): void
    {
        $this->breadCrumbList[$breadCrumbId] = new Breadcrumb($this->translationDomain, $this->twigTemplate);
    }

    /**
     * Get id of the selected breadcrumb.
     *
     * @return string
     */
    public function getSelectedBreadcrumbId(): string
    {
        return $this->selectedBreadcrumbId;
    }

    /**
     * Set translation domain to the selected breadCrumb.
     *
     * @param string $translation_domain
     *
     * @return $this
     */
    public function setTranslationDomain(string $translation_domain): self
    {
        $this->breadCrumbList[$this->selectedBreadcrumbId]->setTranslationDomain($translation_domain);

        return $this;
    }

    /**
     * Set Twig template to the selected breadCrumb.
     *
     * @param string $twig_template
     *
     * @return BreadcrumbManager
     */
    public function setTwigTemplate(string $twig_template): self
    {
        $this->breadCrumbList[$this->selectedBreadcrumbId]->setTwigTemplate($twig_template);

        return $this;
    }

    /**
     * Add an item to the selected breadcrumb.
     *
     * @param $href
     * @param $label
     *
     * @return $this
     */
    public function addItem(string $label, ?string $href = null, array $tanslation_args = [], string $translation_domain = null): self
    {
        $this->breadCrumbList[$this->selectedBreadcrumbId]->addItem($label, $href, $tanslation_args, $translation_domain);

        return $this;
    }

    /**
     * Set id to the selected breadcrumb.
     *
     * @param string $id
     *
     * @return BreadcrumbManager
     */
    public function setId(string $id): self
    {
        $this->breadCrumbList[$this->selectedBreadcrumbId]->setId($id);

        return $this;
    }

    /**
     * Get selected breadcrumb.
     *
     * @return Breadcrumb
     */
    public function getBreadcrumb(): Breadcrumb
    {
        return $this->breadCrumbList[$this->selectedBreadcrumbId];
    }
}
