<?php

namespace App\Tables\Voting\PollingStations;

use App\Models\Voter;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class VotersTable extends Table
{
    protected string $model = Voter::class;

    public function __construct(public readonly ?int $pollingStationId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')->label('Name')
                ->extra((fn (Voter $voter) => ['id' => $voter->id])),
            Columns\TextColumn::make('username')->label('Username'),
            Columns\TextColumn::make('email')->label('Contact')
                ->extra((fn (Voter $voter) => ['phone' => $voter->phone])),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('voted_at')->label('Date Voted')
                ->transformValueUsing(fn (Voter $voter) => $voter->created_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('voted_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'name',
                        'username',
                        'email',
                        'phone',
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
            ->select(['id', 'polling_station_id', 'name', 'username', 'email', 'phone', 'created_at'])
            ->where('polling_station_id', $this->pollingStationId);
    }
}
