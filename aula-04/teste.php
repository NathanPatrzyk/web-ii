<?php
Livros BPHPS
Autor: Walace Soares
Classe: sessao
Esta classe realiza a manipulação de sessões no PHP
Atributos:
- id : Contém o session id
- nvars: Contém o tamanho do Array SESSION
Métodos Privativos:
- setNVars: Ajusta Sthis-> vars
- setVar: Cria/Altera uma variável de sessão
Parametros: var: Variável de sessão
valor: valor à ser armazenado
— unsetVar: Elimina uma variável de sessão

Parâmetro: Var: Variável a ser eliminada
— getVar: Retorna o valor de uma variável de sessão

Parâmetro: var: Variavel

Métodos públicos:
—- — construct: Construtor da classe
Parâmetros: inicia (TRUE ou FALSE)
vars (Array com as variáveis e valores)
- start: Inicia uma sessão
- setVars: Cria/altera uma ou mais variáveis de sessão
Parâmetros: var (nome da variável ou array)
valor (valor da variável, "" se ve for um array)
— unSetVars: Elimina uma ou muitas variáveis de sessão
Parâmetros: var (nome da variável ou array)
- getvars: Retorna o valor de uma ou mais variáveis de sessão
Parâmetro> var (nome da variável ou array)

- getNvars: Retorna o tamanho de SESSION
- getId: Retorna o Id da sessão atual
- printAll: Imprime a relação de variáveis da sessão...
- destroy: Exclui a sessão (session unset,session destroy)

podendo iniciar uma nova
Parâmetros: inicia (TRUE ou FALSE)

class sessao |
private $ id;
private $ nvars;
function — construct($ inicia=FALSE,S vars=NULL) (
if(S inicia==TRUE) í
Sthis->start();
if($S vars!==NULL) (|
$this->setVars(S vars);
)
)
// Métodos privativos da classe
private function setNvars() (

Trabalho com Sessões 331

Sthis-> nvars

= sSizeof(S SESSION);

)
private function sebVor (+ var,$ valor) | $ SESSION[S var] = 8 valor;
Sthis->setNVars();
1
private function unSetvar(S var) |
unset(S SESSION[S var]);
Sthis->setNVars();
:
private function getVar($S var)
(
if(isset(S SESSION[S var]))
(

return
$ SESSTONIS var];
]) else
(
return NULL;
W
)
// Métodos públicos
Public function start() |
session start();
Sthis-> id= session "id();
Sthis=- ->setNvars();
F
public function setvars(S$ var,$ valor="") |
TE (ds array(S var))
(
foreach($ var as

$ k=>$ —yv)
Sthis->setVar (S k,$S v);
)
|) else |
Sthis->setVar($ var,$ valor);
)
)
Puúblie function unSetVars($S var) (| ifí(is array($S var)) |
foreach($ var as
$ v) (|
Sthis->unsetVar(S v);
)
]) else
(
Sthis->unsetVar(S$S var);
:
)
public function getVars(S var) if(is array($ var))
foreach($ var as
$v)
(

$ res[]
= Sthis- —->getVar ($Sv)
;

)
|) else
(
S res
= Sthis->getVar($ var);
)
return
$ res;
)
Public function getNVars()
í
return Sthis-> nvars;
:
Public function getId()
return Sthis-> id;
)
PHP
5
- Conceitos, Programação

e Integração com Banco de Dados e.

public function printAll() |
foreach($S SESSION as $ k=>S$ v) (
printf("%s = &%s<br/>",S k,$S v);
)
)
public function destroy(S inicia=FALSE) (
session unset();
session destroy();
Sthis->setNVars();
Sthis-> id = NULL;
if(S inicia===TRUE) |