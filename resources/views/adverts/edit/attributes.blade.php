@extends('layouts.app')

@section('content')
    <form method="POST" action="?">
        @csrf

        @foreach ($advert->category->allAttributes() as $attribute)

            <div class="form-group">
                <label for=attribute_{{ $attribute->id }}" class="col-form-label">{{ $attribute->name }}</label>

                @if ($attribute->isSelect())

                    <select id="attribute_{{ $attribute->id }}" class="form-control{{ $errors->has('attributes.' . $attribute->id) ? ' is-invalid' : '' }}" name="attributes[{{ $attribute->id }}]">
                        <option value=""></option>
                        @foreach ($attribute->variants as $variant)
                            <option value="{{ $variant }}"{{ $variant == old('attributes.' . $attribute->id, $advert->getValue($attribute->id)) ? ' selected' : '' }}>
                                {{ $variant }}
                            </option>
                        @endforeach
                    </select>

                @elseif ($attribute->isNumber())

                    <input id="attribute_{{ $attribute->id }}" type="number" class="form-control{{ $errors->has('attributes.' . $attribute->id) ? ' is-invalid' : '' }}" name="attributes[{{ $attribute->id }}]" value="{{ old('attributes.' . $attribute->id, $advert->getValue($attribute->id)) }}">

                @else

                    <input id="attribute_{{ $attribute->id }}" type="text" class="form-control{{ $errors->has('attributes.' . $attribute->id) ? ' is-invalid' : '' }}" name="attributes[{{ $attribute->id }}]" value="{{ old('attributes.' . $attribute->id, $advert->getValue($attribute->id)) }}">

                @endif

                @if ($errors->has('parent'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('attributes.' . $attribute->id) }}</strong></span>
                @endif
            </div>

        @endforeach

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection