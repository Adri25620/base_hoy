import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import { validarFormulario } from "../funciones";



const FormUsuarios = document.getElementById('FormUsuarios');
const BtnGuardar = document.getElementById('BtnGuardar');
const BtnModificar = document.getElementById('BtnModificar');
const InputUsTelefono = document.getElementById('us_telefono');
const UsNit = document.getElementById('us_nit')


//VALIDAR TELEFONO
const ValidarTelefono = () => {

    const CantidadDigitos = InputUsTelefono.value

    if (CantidadDigitos.length < 1) {
        InputUsTelefono.classList.remove('is-valid', 'is-invalid');
    } else {

        if (CantidadDigitos.length != 8) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Revise el numero de telefono",
                text: "La cantidad de digitos debe ser menor a 8, ¡Por favor, corrija!",
                showConfirmButton: true,
            });
            InputUsTelefono.classList.remove('is-valid');
            InputUsTelefono.classList.add('is-invalid');

        } else {
            InputUsTelefono.classList.remove('is-invalid');
            InputUsTelefono.classList.add('is-valid');
        }
    }
}


//VALIDAR NIT 
function ValidarNit() {

    const nit = UsNit.value.trim();

    let nd, add = 0;
    if (nd = /^(\d+)\-?([\dkK])$/.exec(nit)) {
        nd[2] = (nd[2].toLowerCase() === 'k') ? 10 : parseInt(nd[2]);
        for (let i = 0; i < nd[1].length; i++) {
            add += ((((i - nd[1].length) * -1) + 1) * nd[1][i]);
        }
        return ((11 - (add % 11)) % 11) === nd[2];
    } else {
        return false;
    }
}

const esValidoNit = () =>{
    ValidarNit();

    if(ValidarNit()) {
        UsNit.classList.add('is-valid');
        UsNit.classList.remove('is-invalid');
    } else {
        UsNit.classList.remove('is-valid');
        UsNit.classList.add('is-invalid');

        Swal.fire({
                position: "center",
                icon: "error",
                title: "NIT INVALIDO",
                text: "El numero de nit es invalido, ¡Por favor, corrija!",
                showConfirmButton: true,
        });
}
}



//GUARDAR
const guardar = async (e) =>{

    e.preventDefault();
    BtnGuardar.disabled = true;
    if(!validarFormulario(FormUsuarios, ['us_id'])){
        Swal.fire({
                position: "center",
                icon: "error",
                title: "FORMULARIO COMPLETO",
                text: "LLene todos los campos, ¡Por favor, corrija!",
                showConfirmButton: true,
        });
        BtnGuardar.disabled = false;
    }
    
    const body = new FormData(FormUsuarios)

    const url = '/base_hoy/usuarios/index/guardarAPI';
    const config = {
        method : 'POST',
        body 
    }

    try{
        const respuesta = await fetch(url, config);
        const datos = await respuesta.json();

        console.log

    } catch (error) {
        console.log(error)
    }
}



InputUsTelefono.addEventListener('change', ValidarTelefono);
UsNit.addEventListener('change', esValidoNit);
FormUsuarios.addEventListener('submit', guardar)