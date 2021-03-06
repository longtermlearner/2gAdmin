@extends('layouts.master')

@section('content')
    <div class="left main_content">
        <div class="inner">
            <div class="breadcrumbs">
                <div class="inner">
                    <h2 class="uk-h2">Food Category Edit</h2>

                </div>
            </div> <!--breadcrumbs-->

            <div class="content_wrap">

                <div class="uk-width-1">
                    <a href="{{route('foodCategory.index')}}" class="uk-button"><i class="fa fa-list"></i> List</a>
                </div>
                <div class="spacer"></div>

                {{ Form::model($foodCat, ['method' => 'PATCH','class'=>"uk-form uk-form-horizontal forms",
                'route' => ['foodCategory.update', $foodCat->id]]) }}
                {{ csrf_field() }}
                @include('errors.errors')

                <div class="form-group">
                    <label>Food Category Name</label>
                    {!! Form::text('foodCatName', null,array('placeholder' => 'food category name','class' => 'uk-form-width-large')) !!}
                </div>

                <div class="form-group">
                    <label>Description</label>
                    {!! Form::text('foodCatDescription', null,array('placeholder' => 'food category description','class' => 'uk-form-width-large')) !!}
                </div>

                <div class="form-group">
                    <label class="uk-form-label uk-h3">Dish</label>
                    <div class="clear"></div>
                    @if ($dishes->count())
                        <ul class="uk-list uk-list-striped">
                            @foreach($dishes as $dish)
                                <?php $value = null ?>
                                @foreach($foodCat->dishes as $foodCatDish)
                                    @if($dish->id == $foodCatDish->id)
                                        <?php $value = "checked" ?>
                                        @break
                                    @endif
                                @endforeach
                                <li><input class="icheck" name="foodCatDish[]" type="checkbox"
                                           value="{{$dish->id}}" {{$value}}>
                                    {{$dish->dishName}}
                                </li>

                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select class="form-control" name="foodCatStatus">
                        @if($foodCat->foodCatStatus=="Active")
                            <option value="Active" selected="selected">Active</option>
                            <option value="InActive">InActive</option>
                        @else
                            <option value="InActive" selected="selected">InActive</option>
                            <option value="Active">Active</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="submit" value="Update Food Category"
                           class="btn btn-success">
                </div>
                {!! Form::close() !!}

            </div>

        </div> <!--INNER-->
    </div>
@endsection