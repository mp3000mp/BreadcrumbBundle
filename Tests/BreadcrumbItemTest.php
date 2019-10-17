<?php

namespace MP3000MP\BreadcrumbBundle\Tests;

use MP3000MP\BreadcrumbBundle\BreadcrumbItem;
use PHPUnit\Framework\TestCase;

/**
 * Class BreadcrumbItemTest.
 */
class BreadcrumbItemTest extends TestCase
{
    /**
     * Tests getters and setters.
     */
    public function testGettersAndSetters()
    {
        $hrefValue = 'href';
        $labelValue = 'label';
        $translationArgsValue = ['translation' => 'args'];
        $translationDomainValue = 'translationDomain';
        $breadcrumbItem = new BreadcrumbItem($labelValue, $hrefValue, $translationArgsValue, $translationDomainValue);
        $this->assertSame($hrefValue, $breadcrumbItem->getHref());
        $this->assertSame($labelValue, $breadcrumbItem->getLabel());
        $this->assertSame($translationArgsValue, $breadcrumbItem->getTranslationArgs());
        $this->assertSame($translationDomainValue, $breadcrumbItem->getTranslationDomain());
    }
}
