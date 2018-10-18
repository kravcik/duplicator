<?php

namespace Duplicator;

use Nette;
use Nette\PhpGenerator as Code;


class Extension extends Nette\DI\CompilerExtension
{
	public function afterCompile(Code\ClassType $class)
	{
            $init = $class->getMethods()['initialize'];
            $config = $this->validateConfig(['name' => 'addDuplicator', 'container' => \Code\Component\Container::class, 'form' => \Code\Component\Form::class]);

            $init->addBody(Duplicator::class . '::register(?*);', [$config]);
	}
}