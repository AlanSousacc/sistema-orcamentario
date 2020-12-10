const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/contato/contato.js', 'public/js/contato')
    .js('resources/js/material/material.js', 'public/js/material')
    .js('resources/js/usuarios/usuarios.js', 'public/js/usuarios')
    .js('resources/js/orcamento/orcamento.js', 'public/js/orcamento')
