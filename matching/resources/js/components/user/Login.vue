<template>
  <div class="container">
    <div class="form-box">
      <form>
        <div class="">
          <label for="email">メールアドレス</label>
          <input type="email" class="form-parts" id="email" name="email" maxlength="255">
        </div>
        <div class="">
          <label for="password">パスワード</label>
          <input type="password" class="form-parts" id="password" name="password" minlength="8">
        </div>
        <button type="submit" class="btn btn-primary">ログイン</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  
}
</script>