<?php

namespace App\Tables\Audiences;

use App\Models\Contact;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class ContactsTable extends Table
{
    protected string $model = Contact::class;

    public function __construct(public readonly int $audienceId) {}

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')->label('Name')
                ->transformValueUsing(fn (Contact $contact) => $contact->name)
                ->extra((fn (Contact $contact) => ['id' => $contact->id])),
            Columns\TextColumn::make('phone')->label('Phone'),
            Columns\TextColumn::make('email')->label('Email Address'),
            Columns\TextColumn::make('date_of_birth')->label('Date of Birth'),
            Columns\TextColumn::make('address')->label('Address'),
            Columns\TextColumn::make('city')->label('City'),
            Columns\TextColumn::make('created_at')->label('Created')
                ->transformValueUsing(fn (Contact $contact) => $contact->created_at->diffForHumans()),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('created_at'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny(['first_name', 'last_name', 'other_names', 'phone', 'email', 'date_of_birth', 'address', 'city'], 'ilike', "%{$value}%");
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
            ->select(['id', 'audience_id', 'first_name', 'last_name', 'other_names', 'phone', 'email', 'date_of_birth', 'address', 'city', 'created_at'])
            ->where('audience_id', $this->audienceId);
    }
}
