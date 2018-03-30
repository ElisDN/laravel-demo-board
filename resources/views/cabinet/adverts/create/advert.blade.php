@extends('layouts.app')

@section('content')
    @include('cabinet.adverts._nav')

    <form method="POST" action="{{ route('cabinet.adverts.create.advert.store', [$category, $region]) }}">
        @csrf

        <div class="card mb-3">
            <div class="card-header">
                Common
            </div>
            <div class="card-body pb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title</label>
                            <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>
                            @if ($errors->has('price'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-form-label">Address</label>
                    <div class="row">
                        <div class="col-md-11">
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address', $region->getAddress()) }}" required>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                            @endif
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-primary btn-block location-button" data-target="#address"><span class="fa fa-location-arrow"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content" class="col-form-label">Content</label>
                    <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="10" required>{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('content') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                Characteristics
            </div>
            <div class="card-body pb-2">
                @foreach ($category->allAttributes() as $attribute)

                    <div class="form-group">
                        <label for=attribute_{{ $attribute->id }}" class="col-form-label">{{ $attribute->name }}</label>

                        @if ($attribute->isSelect())

                            <select id="attribute_{{ $attribute->id }}" class="form-control{{ $errors->has('attributes.' . $attribute->id) ? ' is-invalid' : '' }}" name="attributes[{{ $attribute->id }}]">
                                <option value=""></option>
                                @foreach ($attribute->variants as $variant)
                                    <option value="{{ $variant }}"{{ $variant == old('attributes.' . $attribute->id) ? ' selected' : '' }}>
                                        {{ $variant }}
                                    </option>
                                @endforeach
                            </select>

                        @elseif ($attribute->isNumber())

                            <input id="attribute_{{ $attribute->id }}" type="number" class="form-control{{ $errors->has('attributes.' . $attribute->id) ? ' is-invalid' : '' }}" name="attributes[{{ $attribute->id }}]" value="{{ old('attributes.' . $attribute->id) }}">

                        @else

                            <input id="attribute_{{ $attribute->id }}" type="text" class="form-control{{ $errors->has('attributes.' . $attribute->id) ? ' is-invalid' : '' }}" name="attributes[{{ $attribute->id }}]" value="{{ old('attributes.' . $attribute->id) }}">

                        @endif

                        @if ($errors->has('parent'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('attributes.' . $attribute->id) }}</strong></span>
                        @endif
                    </div>

                @endforeach
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection