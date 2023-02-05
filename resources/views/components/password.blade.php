

{{$Password_Data}}
{{-- <tr>
    <td> <a target="_blank" href="@if(isset($Password_Data["web"])){{$Password_Data["web"]}}@endif">@if(isset($Password_Data["web"])){{$Password_Data["web"]}}@endif</a></td>
    <td align="center">{{$Password_Data->name}}</td>
    <td align="center">
        <input type="password" class="td-password" id="pass{{$Password_Data['id']}}" value="{{$Password_Data['password']}}" readonly>
        <button id="ver" class="btn-showPass" class="btn-opcion" onclick="clickedView('pass{{$Password_Data['id']}}')" title="Mostrar"></button>
    </td>
    <td class="opciones desktopButtons" align="center">
        <button type="button" onclick="alertDeletePass({{$Password_Data['id']}})" class="btn-opcion btn-delPass" title="Eliminar"></button>
    </td>
    <td class="opciones desktopButtons" align="center">
        <button class="btn-opcion btn-editPass" onclick="alertEditPass('{{$Password_Data['id']}}', '{{$Password_Data['web']}}', '{{$Password_Data['username']}}', '{{$Password_Data['password']}}')" title="Editar"></button>
    </td>
    <td class="opciones desktopButtons" align="center">
            <button class="btn-opcion btn-copyPass" onclick="copyPassword('pass{{$Password_Data['id']}}')"></button>
    </td>
    <td id="mobileButton">
        <div class="btn-group mt-3">
            <button type="button" class="btn btn-primary dropdown-toggle" Password_Data-bs-toggle="dropdown" aria-expanded="false">
                Opciones
            </button>
            <ul class="dropdown-menu">
                <li><div class="dropdown-item" onclick="clickedView('pass{{$Password_Data['id']}}')">Ver</div></li>
                <li><hr class="dropdown-divider"></li>
                <li><div class="dropdown-item" onclick="alertDeletePass({{$Password_Data['id']}})">Eliminar</div></li>
                <li><div class="dropdown-item" onclick="alertEditPass('{{$Password_Data['id']}}', '{{$Password_Data['web']}}', '{{$Password_Data['username']}}', '{{$Password_Data['password']}}')">Editar</div></li>
                <li><div class="dropdown-item" onclick="copyPassword('pass{{$Password_Data['id']}}')">Copiar</div></li>
            </ul>
        </div>
    </td>
</tr> --}}
