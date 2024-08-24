<?php
class Data_hora
{
    static function agora()
    {
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $data_hora_atual = new DateTime('now', $timezone);

        return $data_hora_atual->format('d/m/Y H:i');
    }
}