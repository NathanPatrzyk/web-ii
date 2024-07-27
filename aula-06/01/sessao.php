<?php


session_start();

$_SESSION['nome'] = 'Marcos de Melo';
$_SESSION['email'] = 'contato@marcosdemelo.com.br';
$_SESSION['textogrande'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin odio nisi, vehicula tempor diam non, ultrices iaculis ligula. Phasellus interdum ullamcorper velit, eu vulputate tellus facilisis quis. Morbi eros justo, iaculis non odio et, faucibus semper purus. Maecenas ullamcorper quam urna, a egestas mi dapibus et. Nam ac suscipit ex. Nulla ut nunc scelerisque, vestibulum nulla sed, viverra ante. Fusce eget posuere purus. Nam ornare enim quis dui fringilla mollis. Fusce risus est, iaculis eget lacinia sit amet, vehicula id arcu. Pellentesque quis metus pellentesque, ultrices massa sit amet, vulputate risus. Suspendisse vitae tincidunt felis. Praesent fermentum nunc sed tempor lacinia. Nam euismod velit tortor, in feugiat libero facilisis et. Mauris auctor dignissim lorem, ut ornare justo iaculis id. Donec scelerisque accumsan mauris, vitae dapibus orci molestie eget.

Suspendisse ac lobortis ante. Praesent vitae facilisis augue, ac tristique magna. Ut euismod tellus vitae quam varius, eu porttitor lectus sagittis. Vivamus quis suscipit eros. Mauris mollis, felis eu pharetra scelerisque, justo arcu convallis mauris, quis tempor mauris lectus sed nulla. Cras ut arcu eget est aliquet condimentum. Quisque consequat enim eget eros interdum pulvinar. Sed quis gravida sapien. Ut a varius augue, sed faucibus risus. In felis quam, ultricies sed dignissim vestibulum, elementum vel diam. Sed ornare orci at purus consectetur, id mollis nulla sagittis.

Praesent eget gravida nibh, a euismod enim. Vestibulum sit amet velit nibh. Pellentesque pharetra nisi non fringilla luctus. Nullam in tellus nibh. Curabitur molestie suscipit magna auctor fringilla. Etiam congue nulla libero, eu volutpat libero sagittis ac. Nullam enim sapien, viverra vel ex nec, mattis tristique augue.';


echo "<h1>Sessão inicializada aqui</h1>";

echo "<br> <a href='pagina-recupera-session.php'> Clique aqui para ir para a página que 
    recupera as variáveis de sessão</a>";
