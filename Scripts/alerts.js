function alertDeletePass(id){
    vex.dialog.confirm({
        message: '¿Estás seguro de que quieres eliminar esta contraseña? Esta acción es irreversible.',
        className: 'vex-theme-default',
        input: [
            `<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first" onclick="window.location.href='web/php/passwordsActions.php?idCampo__Delete=${id}'">Confirmar</button>`,
            '<button type="button" class="vex-dialog-button-secondary vex-dialog-button vex-last" onclick="vex.closeAll()">Cancelar</button>'
        ].join(''),
        buttons: [],
        callback: function (value) {
            if(value == true){
                window.location.href = `web/php/passwordsActions.php?idCampo__Delete=${id}`;
            }
        }
    })
}

function alertDeleteAccount(id){
    vex.dialog.confirm({
        message: '¿Estás seguro de que quieres eliminar esta cuenta? Esta acción es irreversible.',
        className: 'vex-theme-default',
        input: [
            `<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first" onclick="window.location.href='web/php/pswrds.php?idCuenta__Delete=${id}'">Confirmar</button>`,
            '<button type="button" class="vex-dialog-button-secondary vex-dialog-button vex-last" onclick="vex.closeAll()">Cancelar</button>'
        ].join(''),
        buttons: [],
        callback: function (value) {
            if(value == true){
                window.location.href = `web/php/passwordsActions.php?idCuenta__Delete=${id}`;
            }
        }
    })
}

function alertDeletePasswords(id){
    vex.dialog.confirm({
        message: '¿Estás seguro de que quieres resetear las contraseñas? Esta acción es irreversible.',
        className: 'vex-theme-default',
        input: [
            `<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first" onclick="window.location.href='web/php/passwordsActions.php?idContraseñas__Reset=${id}'">Confirmar</button>`,
            '<button type="button" class="vex-dialog-button-secondary vex-dialog-button vex-last" onclick="vex.closeAll()">Cancelar</button>'
        ].join(''),
        buttons: [],
        callback: function (value) {
            if(value == true){
                window.location.href = `web/php/passwordsActions.php?idCuenta__Delete=${id}`;
            }
        }
    })
}

function alertAddPass(){
    vex.dialog.open({
        message: 'Completa los campos para agregar una contraseña:',
        className: 'vex-theme-default',
        input: [
            '<form action="web/php/passwordsActions.php" method="post">',
            '<input type="text" name="webADD" placeholder="Sitio web..." required />',
            '<input name="userADD" type="text" placeholder="Nombre de usuario/email..." required />',
            '<div>',
                '<input name="passADD" id="input-passGenerada" type="password" placeholder="Contraseña..." required />',
                '<button type="button" onclick="showPasswordInput()" class="vex-dialog-button vex-first btn-verPassInput" title="Mostrar"></button>',
                '<button type="button" onclick="createPassword()" class="vex-dialog-button vex-first btn-generarPass" title="Generar contraseña"></button>',
            '</div>',
            '<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first">Aceptar</button>',
            '<button type="button" onclick="vex.closeAll()" class="vex-dialog-button-secondary vex-dialog-button vex-last">Cancelar</button>',
            '</form>'
        ].join(''),
        buttons: [],
        showCloseButton: false,
        callback: function (data) {}
    })
}

function changeUserPic(){
    vex.dialog.open({
        className: 'vex-theme-default',
        input: [
            '<form action="Perfil.php" method="post">',
            '<label><a href="https://postimages.org/" target="_blank">Sube tu imagen primero aqui (Direct link)</a></label>',
            '<input type="url" name="webIMG" placeholder="Inserte la url aqui" required />',
            '<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first">Guardar</button>','<button type="button" onclick="vex.closeAll()" class="vex-dialog-button-secondary vex-dialog-button vex-last">Cancelar</button>',
            '</form>'
        ].join(''),
        buttons: [],
        showCloseButton: false,
        callback: function (data) {}
    })
}

function alertChangePassword(id){
    vex.dialog.open({
        message: 'Completa los campos para cambiar la contraseña',
        className: 'vex-theme-default',
        input: [
            '<form action="Perfil.php" method="post">',
            '<div>',
                '<input name="actu" id="input-passGenerada" type="password" placeholder="Contraseña actual" required />',
                '<button type="button" onclick="showPasswordInput()" class="vex-dialog-button vex-first btn-verPassInput" title="Mostrar"></button>',
            '</div>',
            '<div>',
                '<input name="nue1" id="input-passGenerada" type="password" placeholder="Contraseña nueva" required />',
                '<button type="button" onclick="showPasswordInput()" class="vex-dialog-button vex-first btn-verPassInput" title="Mostrar"></button>',
            '</div>',
            '<div>',
                '<input name="nue2" id="input-passGenerada" type="password" placeholder="Verifica contraseña nueva" required />',
                '<button type="button" onclick="showPasswordInput()" class="vex-dialog-button vex-first btn-verPassInput" title="Mostrar"></button>',
            '</div>', 
            '<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first">Aceptar</button>','<button type="button" onclick="vex.closeAll()" class="vex-dialog-button-secondary vex-dialog-button vex-last">Cancelar</button>',
            '</form>'
        ].join(''),
        buttons: [],
        showCloseButton: false,
        callback: function (data) {}
    })
}

function alertEditPass(id, web, username, password){
    vex.dialog.open({
        message: 'Edita los campos para actualizar la información:',
        className: 'vex-theme-default',
        input: [
            '<form action="web/php/passwordsActions.php" method="post">',
            `<input type="hidden" name="id" id="idCampo" value=${id}>`,
            `<input type="text" name="webEDIT" placeholder="Sitio web..." value=${web} required>`,
            `<input type="text" name="userEDIT" placeholder="Nombre de usuario/email..." value=${username} required>`,
            '<div>',
            `<input name="passEDIT" id="input-passGenerada" type="password" placeholder="Contraseña..." value=${password} required />`,
                '<button type="button" onclick="showPasswordInput()" class="vex-dialog-button vex-first btn-verPassInput" title="Mostrar"></button>',
                '<button type="button" onclick="createPassword()" class="vex-dialog-button vex-first btn-generarPass" title="Generar contraseña"></button>',
            '</div>',
            '<button type="submit" class="vex-dialog-button-primary vex-dialog-button vex-first">Guardar</button>','<button type="button" onclick="vex.closeAll()" class="vex-dialog-button-secondary vex-dialog-button vex-last">Cancelar</button>',
            '</form>'
        ].join(''),
        buttons: [],
        callback: function (data) {}
    })
}

