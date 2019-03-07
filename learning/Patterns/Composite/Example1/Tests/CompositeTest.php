<?php
declare(strict_types=1);

namespace learning\Patterns\Composite\Tests;

use learning\Patterns\Composite\Example1\Form,
    learning\Patterns\Composite\Example1\InputElement,
    learning\Patterns\Composite\Example1\TextElement,
    PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase
{

    public function testRender(): void
    {
        $form = new Form();
        $form->addElement(new TextElement('Email:'));
        $form->addElement(new InputElement());
        $embed = new Form();
        $embed->addElement(new TextElement('Password:'));
        $embed->addElement(new InputElement());
        $form->addElement($embed);

        $this->assertEquals(
            '<form>Email:<input type="text" /><form>Password:<input type="text" /></form></form>',
            $form->render()
        );
    }

}