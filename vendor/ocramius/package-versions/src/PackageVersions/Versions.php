<?php

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    const VERSIONS = array (
  'doctrine/annotations' => 'v1.6.0@c7f2050c68a9ab0bdb0f98567ec08d80ea7d24d5',
  'doctrine/cache' => 'v1.7.1@b3217d58609e9c8e661cd41357a54d926c4a2a1a',
  'doctrine/collections' => 'v1.5.0@a01ee38fcd999f34d9bfbcee59dbda5105449cbf',
  'doctrine/common' => 'v2.8.1@f68c297ce6455e8fd794aa8ffaf9fa458f6ade66',
  'doctrine/dbal' => 'v2.6.3@e3eed9b1facbb0ced3a0995244843a189e7d1b13',
  'doctrine/doctrine-bundle' => '1.8.1@eb6e4fb904a459be28872765ab6e2d246aac7c87',
  'doctrine/doctrine-cache-bundle' => '1.3.2@9baecbd6bfdd1123b0cf8c1b88fee0170a84ddd1',
  'doctrine/doctrine-migrations-bundle' => 'v1.3.1@a9e506369f931351a2a6dd2aef588a822802b1b7',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/instantiator' => '1.1.0@185b8868aa9bf7159f5f953ed5afb2d7fcdc3bda',
  'doctrine/lexer' => 'v1.0.1@83893c552fd2045dd78aef794c31e694c37c0b8c',
  'doctrine/migrations' => 'v1.6.2@e3faf7c96b8a6084045dedcaf51f74c7834644d4',
  'doctrine/orm' => 'v2.6.0@374e7ace49d864dad8cddbc55346447c8a6a2083',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'ocramius/package-versions' => '1.2.0@ad8a245decad4897cc6b432743913dad0d69753c',
  'ocramius/proxy-manager' => '2.2.0@81d53b2878f1d1c40ad27270e64b51798485dfc5',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/log' => '1.0.2@4ebe3a8bf773a19edfe0a84b6585ba3d401b724d',
  'psr/simple-cache' => '1.0.0@753fa598e8f3b9966c886fe13f370baa45ef0e24',
  'symfony/cache' => 'v4.0.3@1ebe207de664355b1699d35b12b0563c38a47b4e',
  'symfony/config' => 'v4.0.3@0e86d267db0851cf55f339c97df00d693fe8592f',
  'symfony/console' => 'v4.0.3@fe0e69d7162cba0885791cf7eea5f0d7bc0f897e',
  'symfony/debug' => 'v4.0.3@9ae4223a661b56a9abdce144de4886cca37f198f',
  'symfony/dependency-injection' => 'v4.0.3@67bf5e4f4da85624f30a5e43b7f43225c8b71959',
  'symfony/doctrine-bridge' => 'v4.0.3@85d54596a1fe1089536ce03979a1992bf71b7e04',
  'symfony/event-dispatcher' => 'v4.0.3@74d33aac36208c4d6757807d9f598f0133a3a4eb',
  'symfony/filesystem' => 'v4.0.3@760e47a4ee64b4c48f4b30017011e09d4c0f05ed',
  'symfony/finder' => 'v4.0.3@8b08180f2b7ccb41062366b9ad91fbc4f1af8601',
  'symfony/flex' => 'v1.0.61@f872f8faccf5ff95678e1e428f460a333ba1e5d0',
  'symfony/framework-bundle' => 'v4.0.3@7d80f8dcebce598b03dfe75a8669d8a1942687cd',
  'symfony/http-foundation' => 'v4.0.3@03fe5171e35966f43453e2e5c15d7fe65f7fb23b',
  'symfony/http-kernel' => 'v4.0.3@f707ed09d3b5799a26c985de480d48b48540d41a',
  'symfony/lts' => 'dev-master@396c5fca8d73d01186df37d7031321a3c0c2bf92',
  'symfony/maker-bundle' => 'v1.0.2@bf97703ddb68c6b37bd6bab5f5ebd5c7542ca1ef',
  'symfony/orm-pack' => 'v1.0.5@1b58f752cd917a08c9c8df020781d9c46a2275b1',
  'symfony/polyfill-mbstring' => 'v1.6.0@2ec8b39c38cb16674bbf3fea2b6ce5bf117e1296',
  'symfony/routing' => 'v4.0.3@a34b58ed26cc090f99b2ef833d609a6884581b3c',
  'symfony/yaml' => 'v4.0.3@b84f646b9490d2101e2c25ddeec77ceefbda2eee',
  'zendframework/zend-code' => '3.3.0@6b1059db5b368db769e4392c6cb6cc139e56640d',
  'zendframework/zend-eventmanager' => '3.2.0@9d72db10ceb6e42fb92350c0cb54460da61bd79c',
  'symfony/dotenv' => 'v4.0.3@afb6923923e22874dac20bd042167ccb8df1d158',
  '__root__' => 'dev-master@4bc16b4da20e1f0fe91ba3aa6f9c00c5918eb698',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException if a version cannot be located
     */
    public static function getVersion(string $packageName) : string
    {
        if (! isset(self::VERSIONS[$packageName])) {
            throw new \OutOfBoundsException(
                'Required package "' . $packageName . '" is not installed: cannot detect its version'
            );
        }

        return self::VERSIONS[$packageName];
    }
}