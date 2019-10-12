<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Task", mappedBy="tag", cascade={"persist"})
     */
    private $listTasks;

    public function __toString() {
        return $this->name;
    }

    public function __construct()
    {
        $this->listTasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getListTasks(): Collection
    {
        return $this->listTasks;
    }

    public function addListTask(Task $listTask): self
    {
        if (!$this->listTasks->contains($listTask)) {
            $this->listTasks[] = $listTask;
            $listTask->addTag($this);
        }

        return $this;
    }

    public function removeListTask(Task $listTask): self
    {
        if ($this->listTasks->contains($listTask)) {
            $this->listTasks->removeElement($listTask);
            $listTask->removeTag($this);
        }

        return $this;
    }
}
