// import { Component } from "react"; //Primera forma 
import React, {Component} from 'react'; 

//class MiComponente extends React.Component{ //Forma uno sin {Component}
class MiComponente extends Component{ //Forma dos más limpia 

    render(){
        let receta = {
            nombre: 'Pizza', 
            ingredientes: ['Tomante', 'Queso', 'Jamón cocido'], 
            calorias: 400
        }
        return ( //Solo puede devolver una etiqueta 
            //Solución con React.Fragment
            // <React.Fragment>
            //     <h1>Hola, soy el componente llamado: MiComponente</h1>
            //     <h2>Estoy probando el componente</h2> 
            //     <hr/>
            // </React.Fragment>
            <div>
                <h1>{'Receta: ' + receta.nombre}</h1>
                <h2>{'Calorias: ' + receta.calorias}</h2> 
                
               
                <ol>
                    {
                        receta.ingredientes.map((ingrediente,i) => {
                            console.log(ingrediente); 
                            return (
                                <li key={i}>
                                    {ingrediente}
                                </li>
                            );
                        })
                    }
                </ol>
                <hr/>

                {this.props.saludo &&
                    <React.Fragment>
                        <h1>DESDE UNA PROP: </h1>
                        <h3>{this.props.saludo}</h3>
                    </React.Fragment>
                }
            </div>
        ); 
    }
}

export default MiComponente; 