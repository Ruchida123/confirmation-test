@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
<button class="login__button" onclick="location.href='/login'">login</button>
<style>
.header__inner {
  display:flex;
  justify-content: center;
  position: relative;
}
</style>
@endsection

@section('content')
<div class="register-form">
  <div class="register-form__heading">
    <h2>Register</h2>
  </div>
  <div class="register-form__content">
    <form class="form" action="/register" method="post">
      @csrf
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お名前</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田 太郎" />
          </div>
          <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" />
          </div>
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">パスワード</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="password" name="password" placeholder="例: coachtech1106" />
          </div>
          <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__button">
        <button class="form__button-submit" type="submit">登録</button>
      </div>
    </form>
  </div>
</div>
@endsection