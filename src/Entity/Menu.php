<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Prodigious\Sonata\MenuBundle\Model\Menu as BaseMenu;

/**
 * Class Menu
 *
 * @ORM\Table(name="sonata_menu")
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu extends BaseMenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Class constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
}