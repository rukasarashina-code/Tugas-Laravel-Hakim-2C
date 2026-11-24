@csrf
<table class="form">
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" value="{{ old('username', $admin->username ?? '') }}"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
            <input type="password" name="password">
            @if (isset($admin))
                <br><small>Kosongkan jika tidak ingin mengubah password</small>
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button class="btn" type="submit">SIMPAN</button>
            <a href="/admin">Batal</a>
        </td>
    </tr>
</table>
