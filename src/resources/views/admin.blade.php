@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('header')
<form class="form" action="/logout" method="post">
  @csrf
  <button class="logout__button">logout</button>
</form>
<style>
.header__inner {
  display:flex;
  justify-content: center;
  position: relative;
}
</style>
@endsection

@section('content')
<div class="admin__content">
  <div class="section__title">
    <h2>Admin</h2>
  </div>
  <form class="search-form" action="/search" method="get">
    @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="keyword"
        value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください"/>
      <select class="search-form__item-select" name="gender">
        <option value="">性別</option>
        <option value=0>全て</option>
        <option value=1>男性</option>
        <option value=2>女性</option>
        <option value=3>その他</option>
      </select>
      <select class="search-form__item-select" name="category_id">
        <option value="">お問い合わせの種類</option>
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
        @endforeach
      </select>
      <input class="search-form__item-input" type="date" name="date"
        value="{{ old('date') }}" placeholder="年/月/日"/>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
      <button class="search-form__button-submit" type="submit" name="reset" value="reset">リセット</button>
    </div>
  </form>
  <div class="export">
    <button class="export__button">エクスポート</button>
  </div>
    <div class="admin-table">
    {{ $contacts->links('vendor.pagination.contacts') }}
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header">
          <span class="admin-table__header-span">お名前</span>
          <span class="admin-table__header-span">性別</span>
          <span class="admin-table__header-span">メールアドレス</span>
          <span class="admin-table__header-span">お問い合わせの種類</span>
        </th>
      </tr>
      @php
        $count = 0;
      @endphp

      @foreach ($contacts as $contact)
      @php
        $gender = '';
        if ($contact['gender'] == 1) {
          $gender = '男性';
        } elseif ($contact['gender'] == 2) {
          $gender = '女性';
        } else {
          $gender = 'その他';
        };

        $content = '';
        if ($contact->category != null) {
          $content = $contact->category->getContent();
        };
      @endphp

      <tr class="admin-table__row">
        <td class="admin-table__item">
          <div class="update-form">
            <div class="update-form__item">
              <p class="update-form__itme-p">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</p>
              <input type="hidden" name="id" value="{{ $contact['id'] }}">
            </div>
            <div class="update-form__item">
              <p class="update-form__itme-p">{{ $gender }}</p>
            </div>
            <div class="update-form__item">
              <p class="update-form__itme-p">{{ $contact['email'] }}</p>
            </div>
            <div class="update-form__item">
              @if ($content != '')
                <p class="update-form__itme-p">{{ $content }}</p>
              @endif
            </div>
            <div class="detail-form__button">
              <button class="detail-form__button-submit" onclick="modalOpen({{ $count }})">詳細</button>
            </div>
          </div>
          <!-- 詳細モーダル -->
          @include('modal_detail')
        </td>
      </tr>
      @php
        $count++;
      @endphp

      @endforeach
    </table>
  </div>
</div>

@yield('modal_script')
@yield('modal_style')

@endsection