@extends('layouts.app')

@section('content')
    <div class="content-top">
        @if (isset($category))
            <div class="content-top__text">{{ $category->description }}</div>
        @else
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
        @endif
        <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
    </div>
    <div class="content-middle">
            <div class="content-head__container">
              <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
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
            <div class="cart-product-list">
				<?php $total = 0 ?>
				@if(session('cart'))
					@foreach(session('cart') as $id => $product)
					<?php $total += $product['price']; ?>
              <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="{{ $product['image'] }}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                  <div class="cart-product__item__product-name__content"><a href="{{ route('product', $product['id']) }}">{{ $product['title'] }}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                  <div class="cart-product__item__cart-date__content">{{ $product['date'] }}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{ $product['price'] }} рублей</span></div>
              </div>
					@endforeach
					
				@else
					Корзина пуста
				@endif
              <div class="cart-product-list__result-item">
                <div class="cart-product-list__result-item__text">Итого</div>
                <div class="cart-product-list__result-item__value">{{ $total }} рублей</div>
              </div>
            </div>
            <div class="content-footer__container">
              <div class="btn-buy-wrap"><a href="{{ route('cart.order') }}" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div>
            </div>
          </div>
    <div class="content-bottom"></div>
@endsection
