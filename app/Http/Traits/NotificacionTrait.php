<?php

namespace App\Http\Traits;
use Exception;
use Illuminate\Http\Request;
use App\Models\NotificacionesUsuario;

trait NotificacionTrait {
    public function crearNotificacion($userID, $tipo=null) 
    {   
        $info = $this->tipoNotificacion($tipo);

        NotificacionesUsuario::create([
            'usuario_id' => $userID,
            'titulo' => $info['titulo'],
            'texto' => $info['texto'],
            'tipo' => $info['tipo_notificacion']

        ]);

        return ['message' => 'Listo'];
    }

    private function tipoNotificacion($tipo)
    {
        switch ($tipo) {

          case "trabajo_registrado":
            $array_info = [
            'titulo' => 'Trabajo registrado',
            'texto' => 'Su trabajo ha sido registrado exitosamente',
            'tipo_notificacion' => 'info',
        ];
            break;
          case "trabajo_aprobado":
            $array_info = [
            'titulo' => 'Trabajo aprobado',
            'texto' => 'Su trabajo ha sido aprobado y ya puede visualizarse',
            'tipo_notificacion' => 'success',
        ];
            break;
          case "trabajo_rechazado":
            $array_info = [
            'titulo' => 'Trabajo rechazado',
            'texto' => 'Su trabajo ha sido rechazado, por favor contacte a su tutor',
            'tipo_notificacion' => 'danger',
        ];
            break;

          default:
            return dd("Error");
        }

        return $array_info;
    }
}