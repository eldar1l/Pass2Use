// script.js
const longitudInput = document.getElementById('longitud');
const mayusculasInput = document.getElementById('mayusculas');
const numerosInput = document.getElementById('numeros');
const simbolosInput = document.getElementById('simbolos');
const generarButton = document.getElementById('generar');
const contraseñaOutput = document.getElementById('contraseña');

let passwordHistory = JSON.parse(localStorage.getItem('passwordHistory')) || [];

generarButton.addEventListener('click', generarContraseña);

function generarContraseña() {
  const longitud = parseInt(longitudInput.value);
  const mayusculas = mayusculasInput.checked;
  const numeros = numerosInput.checked;
  const simbolos = simbolosInput.checked;

  let caracteres = 'abcdefghijklmnopqrstuvwxyz';
  if (mayusculas) caracteres += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  if (numeros) caracteres += '0123456789';
  if (simbolos) caracteres += '!@#$%^&*()_+-={}:<>?';

  let contraseña = '';
  for (let i = 0; i < longitud; i++) {
    contraseña += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
  }

  contraseñaOutput.textContent = contraseña;
  passwordHistory.push(contraseña);
  localStorage.setItem('passwordHistory', JSON.stringify(passwordHistory));
}