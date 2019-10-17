<?php

namespace MP3000MP\BreadcrumbBundle\Tests;

use MP3000MP\BreadcrumbBundle\Breadcrumb;
use PHPUnit\Framework\TestCase;

/**
 * Class BreadcrumbTest.
 */
class BreadcrumbTest extends TestCase
{
    /**
     * Tests add new item with translation domain.
     */
    public function testAddItemWithTranslationDomain()
    {
        $breadcrumb = new Breadcrumb('messages', '@Breadcrumb/default.html.twig');
        $breadcrumb->addItem('test', null, [], 'customed_domain');

        $r = $breadcrumb->getItems();

        $this->assertSame('customed_domain', $r[0]->getTranslationDomain());
    }

    /**
     * Tests add new item without translation domain.
     */
    public function testAddItemWithoutTranslationDomain()
    {
        $breadcrumb = new Breadcrumb('messages', '@Breadcrumb/default.html.twig');
        $breadcrumb->addItem('test');

        $r = $breadcrumb->getItems();

        $this->assertSame('messages', $r[0]->getTranslationDomain());
    }

    /**
     * Tests getters and setters.
     */
    public function testGettersAndSetters()
    {
        $breadcrumb = new Breadcrumb('messages', '@Breadcrumb/default.html.twig');
        $idValue = 'id';
        $twigTemplateValue = 'twigTemplate';
        $translationDomainValue = 'translationDomain';
        $breadcrumb->setId($idValue);
        $this->assertSame($idValue, $breadcrumb->getId());
        $breadcrumb->setTwigTemplate($twigTemplateValue);
        $this->assertSame($twigTemplateValue, $breadcrumb->getTwigTemplate());
        $breadcrumb->setTranslationDomain($translationDomainValue);
        $this->assertSame($translationDomainValue, $breadcrumb->getTranslationDomain());
    }
}
