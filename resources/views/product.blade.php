@extends('layouts.app')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">{{ $product->title }} из категории {{ $product->category->title }}</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="product-container">
                <div class="product-container__image-wrap"><img src="{{ $product->image }}" class="image-wrap__image-product"></div>
                <div class="product-container__content-text">
                    <div class="product-container__content-text__title">{{ $product->title }}</div>
                    <div class="product-container__content-text__price">
                        <div class="product-container__content-text__price__value">
                            Цена: <b>{{ $product->price }}</b>
                            руб
                        </div><a href="{{ route('add', $product->id) }}" class="btn btn-blue">Купить</a>
                    </div>
                    <div class="product-container__content-text__description">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection