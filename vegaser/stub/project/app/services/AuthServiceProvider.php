<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawomir.zytko@gmail.com>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Phalcon\DiInterface;
use Vegas\DI\ServiceProviderInterface;
use Phalcon\Mvc\Url as UrlResolver;
use \Vegas\Session\Adapter\Files as SessionAdapter;

class AuthServiceProvider implements ServiceProviderInterface
{
    const SERVICE_NAME = 'auth';

    /**
     * {@inheritdoc}
     */
    public function register(DiInterface $di)
    {
        $di->set(self::SERVICE_NAME, function () use ($di) {
            $adapter = new \Vegas\Security\Authentication\Adapter\Standard($di->get('userPasswordManager'));
            $adapter->setSessionStorage($di->get('sessionManager')->createScope('auth'));
            $auth = new \Vegas\Security\Authentication($adapter);

            return $auth;
        }, true);
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            UserPasswordManagerServiceProvider::SERVICE_NAME
        );
    }
} 