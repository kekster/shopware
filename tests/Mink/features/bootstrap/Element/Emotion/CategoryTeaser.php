<?php

namespace Element\Emotion;

use Element\MultipleElement;

/**
 * Element: CategoryTeaser
 * Location: Emotion element for category teasers
 *
 * Available retrievable properties:
 * - name (string, e.g. "Tees und Zubehör")
 * - image (string, e.g. "genuss_tees_banner.jpg")
 * - link (string, e.g. "/genusswelten/tees-und-zubehoer/")
 */
class CategoryTeaser extends MultipleElement implements \HelperSelectorInterface
{
    /**
     * @var array $selector
     */
    protected $selector = ['css' => 'div.emotion-element > div.category-teaser-element'];

    /**
     * Returns an array of all css selectors of the element/page
     * @return string[]
     */
    public function getCssSelectors()
    {
        return [
            'name' => 'div.teaser_headline > h3',
            'image' => 'div.teaser_img',
            'link' => 'div.teaser_box > a'
        ];
    }

    /**
     * Returns the category name
     * @return array[]
     */
    public function getNameProperty()
    {
        $elements = \Helper::findElements($this, ['name', 'link']);

        $names = [
            $elements['name']->getText(),
            $elements['link']->getAttribute('title')
        ];

        return \Helper::getUnique($names);
    }

    /**
     * Returns the category image
     * @return array
     */
    public function getImageProperty()
    {
        $elements = \Helper::findElements($this, ['image']);
        return $elements['image']->getAttribute('style');
    }

    /**
     * Returns the category link
     * @return array
     */
    public function getLinkProperty()
    {
        $elements = \Helper::findElements($this, ['link']);
        return $elements['link']->getAttribute('href');
    }
}