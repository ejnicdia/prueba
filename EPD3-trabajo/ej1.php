<html>
    <head>
        <link rel="stylesheet" href="styleEj1.css" >
    </head>
    <body>
        <?php
        $empleados = array(
            'Ana López' => 'Entrenadora Personal',
            'Miguel Torres' => 'Socorrista',
            'Carmen Ruiz' => 'Recepcionista',
            'David García' => 'Monitor de Piscina',
            'Laura Martín' => 'Instructora de Spinning',
            'Javier Moreno' => 'Mantenimiento'
        );

        $turnos = array(
            'Mañana' => '07:00-15:00',
            'Tarde' => '15:00-23:00',
            'Noche' => '23:00-07:00'
        );
        
        // Conseguimos las claves de empleados y turnos
        $nombresEmpleados = array_keys($empleados);
        $clavesTurnos = array_keys($turnos);
        
        // Array auxiliar de turnos en el que pondremos que empleado pertenece a que turno
        $turnosAux = $turnos;
        foreach ($clavesTurnos as $clave) {
            $turnosAux[$clave] = "";
        }
        
        // Array auxiliar de empleados que usaremos para comprobar que empleados hemos utilizado
        $empleadosSalidos = $empleados;
        foreach($nombresEmpleados as $clave) {
            $empleadosSalidos[$clave] = 0;
        }
        
        // Random para saber cuantos empleados vamos a tener
        $cuantosEmpleados = rand(3, count($empleados));
        
        // Se sigue mientras queden empleados por poner en un horario
        for ($i = 0; $i < $cuantosEmpleados; $i++) {
            
            // Random para ver que empleado colocamos
            $indiceEmpleado = rand(0, count($empleados)-1);
            $nombreEmpleado = $nombresEmpleados[$indiceEmpleado];
            
            // Si no ha salido ya, entonces lo ponemos
            if ($empleadosSalidos[$nombreEmpleado] != 1) {
                
                // Random para ver en que turno lo colocamos y conseguimos su clave
                $indiceTurno = rand(0, count($turnos)-1);
                $claveTurno = $clavesTurnos[$indiceTurno];
                
                // Colocamos con el formato adecuado el empleado en su turno
                $turnosAux[$claveTurno] .= $nombresEmpleados[$indiceEmpleado] . " (" . $empleados[$nombreEmpleado] . ")<br>";
                
                // Lo guardamos por si vuelve a salir, evitarlo
                $empleadosSalidos[$nombreEmpleado] = 1;
            }
        }
        
        $salida = "<table>"
                . "<tr>"
                . "<th>Turno</th>"
                . "<th>Horario</th>"
                . "<th>Empleados Asignados</th>"
                . "</tr>";
        $claves = array_keys($turnos);
        foreach ($claves as $clave) {
            $salida .= "<tr>"
                    . "<td>" . $clave . "</td>"
                    . "<td>" . $turnos[$clave] . "</td>"
                    . "<td>" . $turnosAux[$clave] . "</td>"
                    . "</tr>";
        }

        $salida .= "</table>";

        echo $salida;
        ?>
    </body>
</html>
