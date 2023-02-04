<div id="gestionarPass">
    <h2>Gestionar contraseñas</h2>
    <hr><br><br>
    <h3 class="text-start">Buscar contraseñas</h3>
    <form action="{{}}"  method="post">
        <div class="buscador-container text-center">
            <div class="inputSearch-container">
                <input type="text" class="inputSearch" value="<{{$PostData['webSEARCH']}}" name="webSEARCH" placeholder="Sitio web..." autocomplete="off">
            </div>
            <div class="inputSearch-container">
                <input type="text" class="inputSearch" value="{{$PostData['userSEARCH']}}" name="userSEARCH" placeholder="Nombre/email..." autocomplete="off">
            </div>
            <div class="searchButton-container">
                <button type="submit" class="btn btn-primary searchButton">Buscar</button>
            </div>
        </div>
    </form>
    <table class="table-accounts mx-auto" id="table-accounts">
        <thead id="table-head">
            <tr style="border-top: none;">
                <th align="center" style="border-top-left-radius: inherit;">Sitio</th>
                <th align="center">Nombre</th>
                <th align="center">Contraseña</th>
                <th align="center" colspan="3" style="border-top-right-radius: inherit;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @isset($passwords)
                @foreach ($Passwords as $PasswordData)
                    <x-password :PasswordData/>
                @endforeach
            @endisset
            <tr id="filaAddPass" style="border-bottom-left-radius: inherit;border-bottom-right-radius: inherit;">
                <td align="center" colspan="6" id="Agregar"><button onclick="alertAddPass()" class="btn-addPass">+ Añadir</button></td>
            </tr>
        </tbody>
    </table>
</div>
