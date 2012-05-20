<?php

use \Symfony\Component\ClassLoader\UniversalClassLoader;
require_once __DIR__.'/UniversalClassLoader.php';

$classLoader = new UniversalClassLoader;
$classLoader->registerNamespace( 'Mongrel', __DIR__.'/../../' );
$classLoader->register();