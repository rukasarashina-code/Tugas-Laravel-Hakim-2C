@csrf
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"
           class="form-control @error('username') is-invalid @enderror"
           value="{{ old('username', $admin->username ?? '') }}">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password"
           class="form-control @error('password') is-invalid @enderror">
    @if (isset($admin))
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
    @endif
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="/admin" class="btn btn-secondary">Batal</a>
