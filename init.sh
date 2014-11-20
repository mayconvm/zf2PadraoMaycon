#!/bin/bash
### INICIALIZANDO O PROJETO##

#BAIXA O COMPOSER
echo "Realizando o download do composer.phar"
curl -sS https://getcomposer.org/installer | php

#RODANDO O COMPOSER
echo "Instalando as dependencias do projeto"
php composer.phar install