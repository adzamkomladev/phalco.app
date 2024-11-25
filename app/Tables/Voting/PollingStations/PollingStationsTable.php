<?php

namespace App\Tables\Voting\PollingStations;

use App\Models\PollingStation;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class PollingStationsTable extends Table
{
    protected string $model = PollingStation::class;

    public function __construct(public readonly ?int $electionId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')->label('Name')
                ->extra((fn(PollingStation $pollingStation) => ['id' => $pollingStation->id])),
            Columns\TextColumn::make('code')->label('Code'),
            Columns\TextColumn::make('status')->label('Status')
                ->transformValueUsing(fn(PollingStation $pollingStation) => 'active'),
            Columns\TextColumn::make('agent')->label('Agent')
                ->transformValueUsing(fn(PollingStation $pollingStation) => $pollingStation->agent?->name)
                ->extra((fn(PollingStation $pollingStation) => [
                    'id' => $pollingStation->agent?->id,
                    'email' => $pollingStation->agent?->email,
                    'avatar' => $pollingStation->agent?->avatar,
                ])),
            Columns\TextColumn::make('votes')->label('Votes')
                ->transformValueUsing(fn(PollingStation $pollingStation) => 0),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'name',
                        'code',
                    ], 'ilike', "%{$value}%");
                }
            ),
        ];
    }

    protected function defineActions(): array
    {
        return [];
    }

    protected function defineQuery(): Builder
    {
        return $this->getModel()
            ->query()
            ->with(['election:id,name', 'agent'])
            ->where('election_id', $this->electionId);
    }
}
