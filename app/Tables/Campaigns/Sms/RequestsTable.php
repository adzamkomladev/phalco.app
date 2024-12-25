<?php

namespace App\Tables\Campaigns\Sms;

use App\Models\CampaignRequest;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class RequestsTable extends Table
{
    protected string $model = CampaignRequest::class;

    public function __construct(public readonly int $campaignId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('contact')->label('Contact')
                ->transformValueUsing(fn(CampaignRequest $request) => $request->contact?->name)
                ->extra((fn(CampaignRequest $request) => [
                    'id' => $request->id,
                    'avatar' => $request->contact?->avatar,
                    'contactId' => $request->contact?->id,
                ])),
            Columns\TextColumn::make('recipient')->label('Recipient'),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('cost')->label('Cost')
                ->transformValueUsing(fn(CampaignRequest $request) => 'GHS ' . ($request->cost / 100)),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn(CampaignRequest $request) => $request->created_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny(['recipient', 'status'], 'ilike', "%{$value}%");
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
            ->select(['id', 'campaign_id', 'contact_id', 'recipient', 'cost', 'status', 'created_at'])
            ->with(['contact:id,first_name,last_name'])
            ->where('campaign_id', $this->campaignId);
    }
}
