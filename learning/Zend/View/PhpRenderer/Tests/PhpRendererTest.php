<?php

namespace learning\Zend\View\PhpRenderer\Tests;

use PHPUnit\Framework\TestCase;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver\AggregateResolver;
use Zend\View\Resolver\RelativeFallbackResolver;
use Zend\View\Resolver\TemplateMapResolver;
use Zend\View\Resolver\TemplatePathStack;

class PhpRendererTest extends TestCase
{
    public function testPhpRenderer()
    {
        $renderer = new PhpRenderer();
        $resolver = new AggregateResolver();
        $renderer->setResolver($resolver);
        $map = new TemplateMapResolver([
            'layout' => __DIR__ . '/view/layout.phtml',
            'index/index' => __DIR__ . '/view/index/index.phtml',
        ]);
        $stack = new TemplatePathStack([
            'script_paths' => [
                __DIR__ . '/view',
                'fake/dir'
            ]
        ]);

        $resolver->attach($map)
                 ->attach($stack)
                 ->attach(new RelativeFallbackResolver($map))
                 ->attach(new RelativeFallbackResolver($stack));

        $view = new ViewModel(['var' => 'test']);
        $view->setTemplate('view.phtml');
        $html = $renderer->render($view);
        $this->assertEquals('<h1>test</h1>', $html);
    }
}
