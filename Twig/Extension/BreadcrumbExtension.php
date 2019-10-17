<?php

namespace MP3000MP\BreadcrumbBundle\Twig\Extension;

use MP3000MP\BreadcrumbBundle\BreadcrumbManager;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class BreadcrumbBundle.
 */
class BreadcrumbExtension extends AbstractExtension
{
    /** @var BreadcrumbManager */
    private $bread_crumb_manager;

    /**
     * BreadcrumbExtension constructor.
     *
     * @param BreadcrumbManager $bread_crumb_manager
     */
    public function __construct(BreadcrumbManager $bread_crumb_manager)
    {
        $this->bread_crumb_manager = $bread_crumb_manager;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('mp3000mp_breadcrumb_render', array($this, 'render'), ['needs_environment' => true]),
        ];
    }

    /**
     * @param Environment $environment
     * @param string      $breadCurmbId
     *
     * @return string
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(Environment $environment, string $breadcrumb_id = 'default')
    {
        $breadcrumb = $this->bread_crumb_manager->selectBreadcrumb($breadcrumb_id)
            ->getBreadcrumb();

        // render
        return $environment->render($breadcrumb->getTwigTemplate(), [
            'breadcrumb' => $breadcrumb,
        ]);
    }
}
