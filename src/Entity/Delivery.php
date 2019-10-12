<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeliveryRepository")
 */
class Delivery
{

    const STATUS_OPEN = 'STATUS_OPEN';
    const STATUS_PENDING = 'STATUS_PENDING';
    const STATUS_VALIDATED = 'STATUS_VALIDATED';
    const STATUS_CANCELLED = 'STATUS_CANCELLED';
    const STATUS_ERROR = 'STATUS_ERROR';
    const STATUS_STOPPED = 'STATUS_STOPPED';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deliveryStatus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_OPEN      => 'status_open',
            self::STATUS_PENDING   => 'status_pending',
            self::STATUS_VALIDATED => 'status_validated',
            self::STATUS_CANCELLED => 'status_cancelled',
            self::STATUS_ERROR     => 'status_error',
            self::STATUS_STOPPED   => 'status_stopped',
        ];
    }

    public function getDeliveryStatus(): ?string
    {
        return $this->deliveryStatus;
    }

    public function setDeliveryStatus(string $deliveryStatus): self
    {
        $this->deliveryStatus = $deliveryStatus;

        return $this;
    }  
}
