<?php
	namespace fw_PHP {
		class teste {
			public static function nome() {
				echo __NAMESPACE__;
			}
		}
	}

	namespace {
		//use fw_PHP\teste;
        use fw_PHP\teste as teste_fw;
		class teste {
			public static function nome() {
				echo "PHP 5.3";
			}
		}
		//teste::nome();

        // teste::nome(); // Isto imprimirá "PHP 5.3"
        // teste_fw::nome(); // Isto imprimirá "fw_PHP"

        function separar_linhas(){
            echo "<br><br>";
        }
	}

   
    
    
    teste::nome(); // Isto imprimirá "PHP 5.3"
    teste_fw::nome(); // Isto imprimirá "fw_PHP"
?>