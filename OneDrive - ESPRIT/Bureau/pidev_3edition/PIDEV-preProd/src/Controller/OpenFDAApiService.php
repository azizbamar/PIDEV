<?php


namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenFDAApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getDrugLabel(string $activeIngredient): array
    {
        $response = $this->client->request('GET', 'https://api.fda.gov/drug/label.json', [
            'query' => [
                'search' => 'active_ingredient:"'.$activeIngredient.'"',
                'limit' => 1,
            ],
        ]);

        return $response->toArray();
    }
}
