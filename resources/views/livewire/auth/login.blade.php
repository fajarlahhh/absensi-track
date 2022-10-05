<div>
  <form wire:submit.prevent="submit">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="UID" wire:model="uid">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control" placeholder="Kata Sandi" wire:model="kataSandi">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
    </div>
  </form>
  <br>
  <x-notif />
  <x-alert />
</div>
