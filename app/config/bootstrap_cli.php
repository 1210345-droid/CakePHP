<?php
declare(strict_types=1);

use Cake\Core\Configure;

Configure::write('Error.ignoredDeprecationPaths', [
    'vendor/cakephp/cakephp/src/TestSuite/Fixture/FixtureInjector.php',
]);
