@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>
  <form class="form" action="/thanks" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="" value="{{ $contact['last_name'] }} {{ $contact['first_name'] }}" readonly />
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            @if ($contact['gender'] == 1)
            <input type="text" name="" value="男性" readonly />
            @elseif($contact['gender'] == 2)
            <input type="text" name="" value="女性" readonly />
            @else
            <input type="text" name="" value="その他" readonly />
            @endif
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tell" value="{{ $contact['tell1'] }}{{ $contact['tell2'] }}{{ $contact['tell3'] }}" readonly />
            <input type="hidden" name="tell1" value="{{ $contact['tell1'] }}" />
            <input type="hidden" name="tell2" value="{{ $contact['tell2'] }}" />
            <input type="hidden" name="tell3" value="{{ $contact['tell3'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="text" name="" value="{{ $category['content'] }}" readonly />
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <button class="form__button-submit-modify" type="submit" name="back" value="back">修正</button>
    </div>
  </form>
</div>
@endsection