<?php

namespace App\Services;

use App\Contracts\ProfileProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FakeProfileService implements ProfileProviderInterface
{

  public function fetchProfiles(int $limit = 1): array
  {
      try {
          // YAGNI : Pas besoin d'un client HTTP complexe ici, la façade Http suffit.
          $response = Http::timeout(5)->get("https://randomuser.me/api/?results={$limit}");
          
          if ($response->successful()) {
              return $response->json('results');
          }
      } catch (\Exception $e) {
          Log::error("Erreur lors de la récupération des profils : " . $e->getMessage());
      }

      return [];
  }

}
