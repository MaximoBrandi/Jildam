<tr>
    <td> <a target="_blank" href="https://{{$PasswordData["web"]}}">{{$PasswordData["web"]}}</a></td>
    <td align="center">{{$PasswordData["username"]}}</td>
    <td align="center">
        <input type="password" class="td-password" id="pass{{$PasswordData['id']}}" value="{{$PasswordData['password']}}" readonly>
        <button id="ver" class="btn-showPass" class="btn-opcion" onclick="clickedView('pass{{$PasswordData['id']}}')" title="Mostrar"></button>
    </td>
    <td class="opciones desktopButtons" align="center">
        <button type="button" onclick="alertDeletePass({{$PasswordData['id']}})" class="btn-opcion btn-delPass" title="Eliminar"></button>
    </td>
    <td class="opciones desktopButtons" align="center">
        <button class="btn-opcion btn-editPass" onclick="alertEditPass('{{$PasswordData['id']}}', '{{$PasswordData['web']}}', '{{$PasswordData['username']}}', '{{$PasswordData['password']}}')" title="Editar"></button>
    </td>
    <td class="opciones desktopButtons" align="center">
            <button class="btn-opcion btn-copyPass" onclick="copyPassword('pass{{$PasswordData['id']}}')"></button>
    </td>
    <td id="mobileButton">
        <div class="btn-group mt-3">
            <button type="button" class="btn btn-primary dropdown-toggle" PasswordData-bs-toggle="dropdown" aria-expanded="false">
                Opciones
            </button>
            <ul class="dropdown-menu">
                <li><div class="dropdown-item" onclick="clickedView('pass{{$PasswordData['id']}}')">Ver</div></li>
                <li><hr class="dropdown-divider"></li>
                <li><div class="dropdown-item" onclick="alertDeletePass({{$PasswordData['id']}})">Eliminar</div></li>
                <li><div class="dropdown-item" onclick="alertEditPass('{{$PasswordData['id']}}', '{{$PasswordData['web']}}', '{{$PasswordData['username']}}', '{{$PasswordData['password']}}')">Editar</div></li>
                <li><div class="dropdown-item" onclick="copyPassword('pass{{$PasswordData['id']}}')">Copiar</div></li>
            </ul>
        </div>
    </td>
</tr>
