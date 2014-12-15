<?php

namespace Module\AuthTest\Controller;

use BusinessLogic\Users\Entity\UserEntity;
use BusinessLogic\UsersTest\Entity\Provider\UserEntityProvider;
use LibraryTest\Controller\AbstractFunctionalControllerTestCase;
use Test\Bootstrap;
use Zend\Http\Request;
use Zend\Http\Response;

class NoAccessControllerFunctionalTest extends AbstractFunctionalControllerTestCase
{
    const LOGIN_URL = '/auth/login',
        UNKNOWN_USER_ROLE = 'unknown';

    public function setUp()
    {
        parent::setUp();
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();

        Bootstrap::setupServiceManager();
    }

    public function testNotFoundAction()
    {
        $this->prepareUserAuthenticationForUnknownRole();
        $this->prepareConfigAclForUnknownRole();

        $this->dispatch(self::LOGIN_URL, Request::METHOD_GET);

        $this->assertResponseStatusCode(Response::STATUS_CODE_302);
        $this->assertRedirectTo('/auth/no-access');
    }

    private function prepareUserAuthenticationForUnknownRole()
    {
        $userEntity = UserEntityProvider::createEntityWithRandomData();

        $ref = new \ReflectionClass(UserEntity::class);
        $prop = $ref->getProperty('allowedRoles');
        $prop->setAccessible(true);
        $prop->setValue($userEntity, ['admin', self::UNKNOWN_USER_ROLE]);

        $userEntity->setRole(self::UNKNOWN_USER_ROLE);

        $this->prepareAuthenticateMock(true, $userEntity);
    }

    private function prepareConfigAclForUnknownRole()
    {
        $config = $this->getApplicationServiceLocator()->get('Config');
        $config['acl'][self::UNKNOWN_USER_ROLE] = [
            'parents' => [],
            'allow' => [
                'Module\\Auth' => [
                    'NoAccess:index'
                ]
            ],
            'deny' => []
        ];

        $this->setMockToServiceLocator('Config', $config);
    }
}