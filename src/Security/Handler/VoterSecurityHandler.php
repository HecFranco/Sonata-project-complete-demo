<?php
namespace App\Security\Handler;

use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Security\Handler\SecurityHandlerInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;

class VoterSecurityHandler implements SecurityHandlerInterface
{
    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;
    /**
     * @var array
     */
    private $superAdminRoles;

    /**
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @param array $superAdminRoles
     */
    public function __construct( AuthorizationCheckerInterface $authorizationChecker, array $superAdminRoles )
    {
        $this->authorizationChecker = $authorizationChecker;
        $this->superAdminRoles = $superAdminRoles;
    }
    
    
    public function isGranted(AdminInterface $admin, $attributes, $object = null)
    {
        if (!is_array($attributes)) {
            $attributes = [$attributes];
        }
        
        foreach ($attributes as $pos => $attribute) {
            $attributes[$pos] = sprintf($this->getBaseRole($admin), $attribute);
        }

        $allRole = sprintf($this->getBaseRole($admin), 'ALL');

        try {
            return $this->authorizationChecker->isGranted($this->superAdminRoles)
                || $this->authorizationChecker->isGranted($attributes, $object)
                || $this->authorizationChecker->isGranted([$allRole], $object);
        } catch (AuthenticationCredentialsNotFoundException $e) {
            return false;
        }
    }
    
    public function getBaseRole( AdminInterface $admin )
    {
        return 'ROLE_' . str_replace('.', '_', strtoupper($admin->getCode())) . '_%s';
    }

    public function buildSecurityInformation( AdminInterface $admin )
    {
        return array();
    }

    public function createObjectSecurity( AdminInterface $admin, $object )
    {
    }

    public function deleteObjectSecurity( AdminInterface $admin, $object )
    {
    }
}