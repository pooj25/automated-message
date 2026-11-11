<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $baseUrl;
    protected string $apiKey;
    protected string $sessionId;
    protected string $defaultRecipient;

    public function __construct()
    {
        $this->baseUrl = config('services.openwa.url', 'http://localhost:2785');
        $this->apiKey = config('services.openwa.api_key', 'owa_k1_4c55b901515813692186149175caf552e99e06ee76dc9d578a6114301703ac87');
        $this->sessionId = config('services.openwa.session_id', 'd8721c9c-6e77-4be8-bbf8-29732fbbfd9f');
        $this->defaultRecipient = config('services.openwa.recipient', '919876543210');
    }

    /**
     * Send a WhatsApp message via OpenWA REST API
     *
     * @param string $message
     * @param string|null $phone
     * @return array
     */
    public function sendMessage(string $message, ?string $phone = null): array
    {
        $target = $phone ?: $this->defaultRecipient;

        // Strip non-digits
        $clean = preg_replace('/[^0-9]/', '', $target);

        // Auto prefix 91 if standard 10 digit Indian mobile number
        if (strlen($clean) === 10) {
            $clean = '91' . $clean;
        }

        $chatId = $clean . '@c.us';
        $endpoint = rtrim($this->baseUrl, '/') . "/api/sessions/{$this->sessionId}/messages/send-text";

        try {
            $response = Http::withHeaders([
                'X-API-Key' => $this->apiKey,
                'Content-Type' => 'application/json',
                'Bypass-Tunnel-Reminder' => 'true',
                'User-Agent' => 'OpenWA-Laravel-Client/1.0',
            ])->timeout(15)->post($endpoint, [
                'chatId' => $chatId,
                'text' => $message,
            ]);

            Log::info("OpenWA message dispatch to {$chatId}: " . $response->body());

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'data' => $response->json(),
            ];
        } catch (\Throwable $e) {
            Log::error("OpenWA message error: " . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
}
