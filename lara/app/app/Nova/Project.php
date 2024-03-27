<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\BelongsToMany;
use Nikans\TextLinked\TextLinked;
use phpDocumentor\Reflection\Types\Nullable;

class Project extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Project::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {

        $id=5;

        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('name'),
            Text::make('content'),
            //File::make('image')->disk('public')->path("img/projects/$id"),
            //Trix::make('image')->withFiles('public')->path("img/projects/4"),
            Image::make('image')->disk('public')->path("img/projects/$id"),
            new Panel('Deutsch', $this->germanFields()),
            new Panel('Italian', $this->italianFields()),
            //BelongsToMany::make('Artists'),

            //HasMany::make('Presses'),

        ];
    }

    protected function italianFields()
    {
        return [
            Markdown::make('Texto - italiano', 'text_it')
                ->sortable()
        ];
    }

    protected function germanFields()
    {
        return [
            Markdown::make('Texto - deutsch', 'text_de')
                ->sortable()
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
