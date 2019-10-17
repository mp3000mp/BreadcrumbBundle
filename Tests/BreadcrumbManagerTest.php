<?php

namespace MP3000MP\BreadcrumbBundle\Tests;

use MP3000MP\BreadcrumbBundle\BreadcrumbManager;
use PHPUnit\Framework\TestCase;

/**
 * Class BreadcrumbManagerTest.
 */
class BreadcrumbManagerTest extends TestCase
{
    /**
     * Tests get default breadcrumb when no settings.
     */
    public function testSelectBreadcrumbExists()
    {
        $breadcrumbManager = new BreadcrumbManager(['translation_domain' => 'messages', 'twig_template' => '']);
        $breadcrumb = $breadcrumbManager->selectBreadcrumb('default')
            ->addItem('test')
            ->getBreadcrumb();

        $this->assertSame('default', $breadcrumbManager->getSelectedBreadcrumbId());
        $this->assertCount(1, $breadcrumb->getItems());
    }

    /**
     * Tests get not existing breadcrumb.
     */
    public function testSelectBreadcrumbDoesNotExists()
    {
        $breadcrumbManager = new BreadcrumbManager(['translation_domain' => 'messages', 'twig_template' => '']);
        $breadcrumb = $breadcrumbManager->selectBreadcrumb('default2')
            ->addItem('test')
            ->selectBreadcrumb('default')
            ->getBreadcrumb();

        $this->assertCount(0, $breadcrumb->getItems());
    }

    /**
     * Tests getters and setters.
     */
    public function testGettersAndSetters()
    {
        $breadcrumbManager = new BreadcrumbManager(['translation_domain' => 'messages', 'twig_template' => '']);
        $idValue = 'id';
        $twigTemplateValue = 'twigTemplate';
        $translationDomainValue = 'translationDomain';
        $breadcrumbManager->setId($idValue);
        $breadcrumbManager->setTwigTemplate($twigTemplateValue);
        $breadcrumbManager->setTranslationDomain($translationDomainValue);
        $breadCrumb = $breadcrumbManager->getBreadcrumb();
        $this->assertSame($idValue, $breadCrumb->getId());
        $this->assertSame($twigTemplateValue, $breadCrumb->getTwigTemplate());
        $this->assertSame($translationDomainValue, $breadCrumb->getTranslationDomain());
    }
}
