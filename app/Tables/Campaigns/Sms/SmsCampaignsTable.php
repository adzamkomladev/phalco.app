<?php

namespace App\Tables\Campaigns\Sms;

use App\Models\Campaign;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class SmsCampaignsTable extends Table
{
    protected string $model = Campaign::class;

    public function __construct(public readonly int $organizationId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('code')->label('Code')
                ->extra((fn(Campaign $campaign) => ['id' => $campaign->id])),
            Columns\TextColumn::make('created_by')
                ->label('Created By')
                ->transformValueUsing(fn(Campaign $campaign) => $campaign->createdBy->name)
                ->extra((fn(Campaign $campaign) => [
                    'avatar' => $campaign->createdBy->avatar,
                ])),
            Columns\TextColumn::make('status')->label('Status'),
            Columns\TextColumn::make('audience')->label('Audience')
                ->transformValueUsing(fn(Campaign $campaign) => $campaign->audience->name),
            Columns\TextColumn::make('sender')->label('Sender')
                ->transformValueUsing(fn(Campaign $campaign) => $campaign->data['sender']),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn(Campaign $campaign) => $campaign->created_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny(['code', 'status'], 'ilike', "%{$value}%");
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
            ->select(['id', 'user_id', 'organization_id', 'audience_id', 'code', 'type', 'status', 'description', 'created_at'])
            ->with([
                'createdBy:id,first_name,last_name,avatar,selected_organization_id',
                'audience:id,name',
            ])
            ->where('organization_id', $this->organizationId)
            ->where('type', 'sms');
    }
}
