
<div id="easyModal{{ $count }}" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="modalClose">×</span>
    </div>
    <div class="modal-body">
      <div class="modal-item">
        <span class="modal-item-header">お名前</span>
        <span class="modal-item-value">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">性別</span>
        <span class="modal-item-value">{{ $gender }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">メールアドレス</span>
        <span class="modal-item-value">{{ $contact['email'] }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">電話番号</span>
        <span class="modal-item-value">{{ $contact['tell'] }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">住所</span>
        <span class="modal-item-value">{{ $contact['address'] }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">建物名</span>
        <span class="modal-item-value">{{ $contact['building'] }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">お問い合わせの種類</span>
        <span class="modal-item-value">{{ $content }}</span>
      </div>
      <div class="modal-item">
        <span class="modal-item-header">お問い合わせ内容</span>
        <span class="modal-item-value">{{ $contact['detail'] }}</span>
      </div>
    </div>
    <form class="delete-form" action="/todos/delete" method="post">
        @method('DELETE')
        @csrf
        <div class="delete-form__button">
            <button class="delete-form__button-submit" type="submit">削除</button>
            <input type="hidden" name="id" value="{{ $contact['id'] }}">
        </div>
    </form>
    <div class="blank"></div>
  </div>
</div>

@section('modal_script')
<script>
let modal = {};
var buttonClose = document.getElementsByClassName('modalClose')[0];

// 詳細ボタンがクリックされた時
function modalOpen(count) {
  modal = document.getElementById('easyModal'+count);
  var buttonClose = document.getElementsByClassName('modalClose')[count]
  modal.style.display = 'block';
}

// TODO: ２行目以降のモーダルが閉じれねい
// バツ印がクリックされた時
buttonClose.addEventListener('click', modalClose);
function modalClose() {
  modal.style.display = 'none';
}

// モーダルコンテンツ以外がクリックされた時
addEventListener('click', outsideClose);
function outsideClose(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}
</script>
@endsection

@section('modal_style')
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.5);
}

.modal-content {
  background-color: #f4f4f4;
  margin: 20% auto;
  width: 50%;
  box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2),0 7px 20px 0 rgba(0,0,0,0.17);
  animation-name: modalopen;
  animation-duration: 1s;
}

@keyframes modalopen {
  from {opacity: 0}
  to {opacity: 1}
}

.modal-header h1 {
  margin: 1rem 0;
}

.modal-header {
  padding: 3px 15px;
  display: flex;
  justify-content: end;
}

.modalClose {
  font-size: 2rem;
}

.modalClose:hover {
  cursor: pointer;
}

.modal-body {
  padding: 10px 20px;
  color: #8B7969;
}

.modal-item {
    display: flex;
    justify-content: space-around;
    margin-bottom: 15px;
}

.modal-item-header {
  font-weight: bold;
  width: 50%;
  margin-left: 50px;
}

.modal-item-value {
  width: 50%;
}

.delete-form {
    display: flex;
    justify-content: center;
}

.delete-form__button {
    width: 50px;
    margin: 10px auto;
}

.delete-form__button-submit {
    padding: 5px;
    width: 100%;
    border: none;
    border-radius: 3px;
    background: #ff0000;
    color: #fff;
    cursor: pointer;
}

.blank {
  height: 20px;
}
</style>
@endsection