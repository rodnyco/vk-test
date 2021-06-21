<?php


namespace App\Model\Interactive\Monster;


use App\Model\Battle;
use App\Model\Interactive\InteractiveInterface;

class Monster implements InteractiveInterface
{
    protected int $power;
    protected int $selfDamage;

    private bool $isDefeated = false;

    public function create(int $powerFrom, int $powerTo, int $selfDamage): InteractiveInterface
    {
        $this->power        = rand($powerFrom, $powerTo);
        $this->selfDamage   = $selfDamage;

        return $this;
    }

    public function isDefeated(): bool
    {
        return $this->isDefeated;
    }

    public function kill(): void
    {
        $this->isDefeated = true;
    }

    public function toDamage(): void
    {
        $damage = $this->power - $this->selfDamage;
        if($damage >= 0) {
            $this->power = $damage;
        } else {
            $this->power = 0;
            $this->kill();
        }
    }

    /**
     * @inheritDoc
     */
    public function startInteracting(): void
    {
        $battle = new Battle($this);
        $battle->start();
    }

    /**
     * @inheritDoc
     */
    public function getPoints(): int
    {
        return $this->power;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return "Монстр";
    }
}