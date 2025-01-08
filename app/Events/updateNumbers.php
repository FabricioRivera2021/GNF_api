<?php

namespace App\Events;

use App\Models\Estados;
use App\Models\Numeros;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class updateNumbers implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $numeros;

    /**
     * Create a new event instance.
     */
    public function __construct($numeros)
    {
        $this->numeros = $numeros;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('numeros'),
        ];
    }

    public function broadcastAllNumbers($id = null)
    {
        // Fetch and prepare data for the event
        if ($id && $id != 1) {
            $estado = Estados::findOrFail($id);
            $numeros = Numeros::with('filas', 'estados', 'customers', 'user')
                ->whereHas('estados', function ($query) {
                    // Filter for estados where 'parallamar' is 1
                    $query->where('parallamar', 1);
                })
                ->where('estados_id', $estado->id)
                ->get()
                ->map(function ($numero) {
                    return [
                        'numero' => $numero->numero,
                        'fila_prefix' => $numero->filas->prefix,
                        'fila' => $numero->filas->filas,
                        'estado' => $numero->estados->estados,
                        'estados_id' => $numero->estados->id,
                        'nombre' => $numero->customers,
                        'user' => $numero->user?->name,
                        'pausado' => $numero->paused,
                        'cancelado' => $numero->canceled,
                        'created_at' => $numero->created_at,
                        'modified_at' => $numero->updated_at,
                    ];
                });

            // Dispatch the event
            broadcast(new updateNumbers($numeros));
            return;
        }

        // For the "ALL" filter case
        $numeros = Numeros::with('filas', 'estados', 'customers', 'user')
            ->get()
            ->map(function ($numero) {
                return [
                    'numero' => $numero->numero,
                    'fila_prefix' => $numero->filas->prefix,
                    'fila' => $numero->filas->filas,
                    'estado' => $numero->estados->estados,
                    'estado_id' => $numero->estados->id,
                    'nombre' => $numero->customers,
                    'user' => $numero->user?->name,
                    'pausado' => $numero->paused,
                    'cancelado' => $numero->canceled,
                    'created_at' => $numero->created_at,
                    'modified_at' => $numero->updated_at,
                ];
            });

        // Dispatch the event
        broadcast(new updateNumbers($numeros));
    }
}
