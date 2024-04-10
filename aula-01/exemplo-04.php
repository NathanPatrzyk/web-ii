<?php

    function imprime(&$texto) {
        $texto += 5;
				echo "Dentro da funcao: " . $texto . "<br>";
    }

		$teste = 1;
		echo "Antes da funcao: " . $teste . "<br>";
    imprime($a);
		echo "Depois da funcao: " . $teste . "<br>";