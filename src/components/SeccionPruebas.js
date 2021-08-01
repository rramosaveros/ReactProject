import React, { Component } from "react";
import MiComponente from './MiComponente'; 

class SeccionPruebas extends Component {

    contador = 0; 

    // constructor(props){ //opción 1
    //     super(props); 
    //     this.state = {
    //         contador: 0
    //     }; 
    // }

    state = { //opción 2 
        contador: 0
    }; 

    // var HolaMundo = () => { }
    HolaMundo(nombre, edad){
        var presentacion = (
                <div>
                <h2>Hola, soy {nombre}</h2> 
                <h3>Tengo {edad} años</h3> 
                </div>
            ); 
        return presentacion; 
    }

    sumar(){
        // this.contador = this.contador + 1;
        // this.state.contador = this.state.contador + 1; 
        this.setState({
            contador: (this.state.contador + 1)
        });
    }

    restar = (e) => {
        // this.contador = this.contador - 1; 
        // this.state.contador = this.state.contador - 1;
        this.setState({
            contador: (this.state.contador - 1)
        }); 
    }

    render() {
        var nombre = "Lenin Ramos"; 

        return (
            <section id="content">
                <h2 className="subheader">Últimos artículos</h2>
                <p>
                    Hola! bienvenido.
                </p>

                <h2 className="subheader">Funciones y JXS básico</h2>
                {this.HolaMundo(nombre, 12)}

                <h2 className="subheader">Componentes</h2>
                <section className="componentes">
                    <MiComponente /> 
                    <MiComponente /> 
                </section>

                <h2 className="subheader">Estado</h2>
                <p>
                    Contado: {this.state.contador}
                </p>
                <p>
                    <input type="button" value="Sumar" onClick={this.sumar.bind(this)}/>
                    <input type="button" value="Restar" onClick={this.restar}/>
                </p>

            </section>
        );
    }
}

export default SeccionPruebas; 