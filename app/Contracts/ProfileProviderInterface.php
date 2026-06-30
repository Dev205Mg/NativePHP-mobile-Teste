<?php

namespace App\Contracts;

interface ProfileProviderInterface
{
  /**
     * Récupère une liste de profils.
     */
    public function fetchProfiles(int $limit = 1): array;
}
