<?php

namespace App\Tables\Voting\PollingStations;

use App\Models\VoteEntryRequest;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;

final class RequestsTable extends Table
{
    protected string $model = VoteEntryRequest::class;

    public function __construct(public readonly ?int $pollingStationId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('position')->label('Position')
                ->transformValueUsing(fn (VoteEntryRequest $voteEntryRequest) => $voteEntryRequest->ballot?->position)
                ->extra((fn (VoteEntryRequest $voteEntryRequest) => ['id' => $voteEntryRequest->id])),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('updated_at')->label('Recent Changes')
                ->transformValueUsing(fn (VoteEntryRequest $voteEntryRequest) => $voteEntryRequest->updated_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('updated_at'),
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
            ->select(['id', 'ballot_id', 'polling_station_id', 'updated_at', 'status'])
            ->with(['ballot:id,position'])
            ->where('polling_station_id', $this->pollingStationId);
    }
}
