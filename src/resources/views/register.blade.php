@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
<button class="login__button">login</button>
<style>
.header__inner {
  display:flex;
  justify-content: center;
  position: relative;
}
</style>
@endsection

@section('content')
<div class="user__content">
  <div class="section__title">
    <h2>Register</h2>
  </div>
  <form class="create-form" action="/register" method="post">
    @csrf
    <div class="create-form__item">
      <p>お名前</p>
      <input
        class="create-form__item-input"
        type="text"
        name="name"
        value="{{ old('name') }}"
      >
      <p>メールアドレス</p>
      <input
        class="create-form__item-input"
        type="text"
        name="email"
        value="{{ old('email') }}"
      >
      <p>パスワード</p>
      <input
        class="create-form__item-input"
        type="text"
        name="password"
        value="{{ old('password') }}"
      >
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit" type="submit">登録</button>
    </div>
  </form>
</div>
@endsection