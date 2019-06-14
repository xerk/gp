<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphToMany;
use LaravelNovaFields\Gender\Gender;
use Laravel\Nova\Fields\BelongsToMany;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use Manmohanjit\BelongsToDependency\BelongsToDependency;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public function subtitle()
    {
        return "email: {$this->email}". "<br>" . "Phone: {$this->phone}";
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email', 'phone'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Gravatar::make(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6'),

            Text::make('Phone')
                ->sortable()
                ->rules('required', 'max:254')
                ->creationRules('unique:users,phone')
                ->updateRules('unique:users,phone,{{resourceId}}'),

            Select::make('Gender')->options([
                '1' => 'Male',
                '0' => 'Female',
            ])->displayUsingLabels(),

            Boolean::make('Worker', 'job')
                ->sortable()
                ->rules('required', 'max:254'),

            BelongsTo::make('City', 'city', 'App\Nova\City'),

            BelongsToDependency::make('Region')->dependsOn('city', 'city_id'),

            // NovaBelongsToDepend::make('City')
            //     ->options(\App\City::all())->rules('required'),
            // NovaBelongsToDepend::make('Region')
            //     ->optionsResolve(function ($city) {
            //         // Reduce the amount of unnecessary data sent
            //         return $city->regions()->get(['id','region']);
            //     })
            //     ->dependsOn('City'),

            Place::make('Address', 'address_line_1')->hideFromIndex()->countries(['EG']),

            Place::make('Address Line 2', 'address_line_2')->hideFromIndex(),

            HasMany::make('Workers'),

            MorphToMany::make('Roles', 'roles', \Eminiarts\NovaPermissions\Nova\Role::class),

            MorphToMany::make('Permissions', 'permissions', \Eminiarts\NovaPermissions\Nova\Permission::class),

            BelongsToMany::make('Categories'),

            Avatar::make('Avatar')->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
