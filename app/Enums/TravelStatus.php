<?php

namespace App\Enums;

enum TravelStatus: string
{
    case EM_ANDAMENTO = 'Em andamento';
    case CANCELADA = 'Cancelada';
    case CONCLUIDA = 'Concluida';
    case NAO_INICIADA = 'Não iniciada';
}
