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

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')
                ->label('Name')
                ->transformValueUsing(fn (PollingStation $pollingStation) => $pollingStation->name)
                ->extra((fn (PollingStation $pollingStation) => [
                    'id' => $pollingStation->id,
                ])),
            Columns\TextColumn::make('code')->label('Code')
                ->transformValueUsing(fn (PollingStation $pollingStation) => $pollingStation->code),
            Columns\TextColumn::make('agent')->label('Agent')
                ->transformValueUsing(fn (PollingStation $pollingStation) => $pollingStation->agent?->name)
                ->extra((fn (PollingStation $pollingStation) => [
                    'id' => $pollingStation->agent?->id,
                    'email' => $pollingStation->agent?->email,
                    'avatar' => $pollingStation->agent?->avatar,
                ])),
            Columns\TextColumn::make('election')->label('Election')
                ->transformValueUsing(fn (PollingStation $pollingStation) => $pollingStation->election?->name),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn (PollingStation $pollingStation) => $pollingStation->created_at->diffForHumans()),

        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('id'),
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
        $userId = auth()->id();
        $election = cache()->get("elections.selected.{$userId}");
        $selectedElectionId = $election['id'] ?? null;

        return $this->getModel()
            ->query()
            ->with(['election:id,name', 'agent'])
            ->where('election_id', $selectedElectionId);
    }
}
