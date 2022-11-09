<?php

use Illuminate\Http\JsonResponse;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Admin\Controller\Controller;
use App\Models\Producto;

class Producto extends Controller
{
    public $successStatus = 200;
    
    
    
//método para obtener todos los datos registrados de productos.
        public function productoAll(){

            
            $pro = Producto::all();
            $datos =[];
            
            if($pro->isEmpty()){//verificar si en la bd hay registros
                $datos =["estado"=>"error","mensaje"=>"No hay datos guardados"]; 
            return response($data,404);        
            }else{
            foreach($pro as $fila) { 
                $datos1 = array("id_producto"=>$fila->id_producto,"nombre"=>$fila->nombre);   
                array_push($datos, $datos1);                            
            }
            return response($datos, 200); 
            
            return view( 'listar' )->with( 'Datos', $datos );
        }}

  //método para elimiar producto registrado
        public function deleteProducto(Request $req){      
            $validator = Validator::make($req->all(), [
                'id_producto' => 'required|numeric',        
            ]);

            if ($validator->fails()) {
                $data =["estado"=>"error","mensaje"=>"id esta  vacío o no es numerico"];            
                return response($data,404);                  
            }

                $id =  $req->input('id_producto');      
                $user = Producto::find($id);        
                if(!$user){
                $data =["estado"=>"error","mensaje"=>"Producto  no se encuentra registrado en base de datos"];            
                return response($data,404);
                }else{         
                $user->delete();      
            
                //Elimnar producto
                $data =["estado"=>"ok","mensaje"=>"Producto eliminado exitosamente"];            
                return response($data,200);
                }     

        }

     //método para registrar Producto
    public function registerProducto(ControladorProductoRequest $req){
        $producto =  new Producto; //instancia del modelo       
        $producto->nombre = $req->input('nombre');  

        $validator = Validator::make($req->all(), [
            'id_producto' => 'required|numeric',        
        ]);

        if ($validator->fails()) {
            $data =["estado"=>"error","mensaje"=>"id esta  vacío o no es numerico"];            
            return response($data,404);                  
        } 
         $producto->save();//guardar producto 
         $data =["estado"=>"ok","mensaje"=>"Los productos se registraron exitosamente"];    
        return response($data, 200);  
}


   //método para editar producto registrado
   public function editProducto(ControladorProductoRequest $req){
    $validator = Validator::make($req->all(), [
      'id_producto' => 'required|numeric',        
     ]);

    if ($validator->fails()) {
        $data =["estado"=>"error","mensaje"=>"id esta  vacío o no es numerico"];            
        return response($data,404);                  
     }
    $id =  $req->input('id_producto');               
    
    if(!Producto::find($id)){//verificar si en la bd hay registros
          $data =["estado"=>"error","mensaje"=>"No se encontró dato de producto a modificar"]; 
          return response($data,404);        
    }else{             
        $producto = Producto::find($id);//buscar producto a modificar
        $producto->nombre = $req->input('nombre');//captura todos los datos del reques   
        $producto->save();//guardar producto 
        $data =["estado"=>"ok","mensaje"=>"Producto modificado con exito"];    
        return response($data, 200);
        }
        

         
     } 
   }  
 
        
     
