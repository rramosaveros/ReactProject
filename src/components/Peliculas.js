import React, { Component } from 'react';
import Pelicula from './Pelicula';
import Slider from './Slider';
import Sidebar from './Sidebar';

class Peliculas extends Component {
    state = {};

    cambiarTitulo = () => {
        var { peliculas } = this.state;
        var random = Math.floor(Math.random() * 3)
        peliculas[random].titulo = "Batman begins";

        this.setState({
            peliculas: peliculas
        })
    }

    favorita = (pelicula, indice) => {
        console.log("Favorita marcada");
        console.log(pelicula, indice);
        this.setState({
            favorita: pelicula
        });
    }

    componentWillMount() {
        // alert("Se va a montar el componente"); 
        this.setState({
            peliculas: [
                { titulo: 'Batman vs Superman', image: 'https://occ-0-92-1723.1.nflxso.net/dnm/api/v6/E8vDc_W8CLv7-yMQu8KMEC7Rrr8/AAAABVixGzDct56-tsHGWLZwtml5CejHjH2jjmxSag8NKtgyx7MNfqzhcC5192uzJoo-dpVg0SvdMiLqD37Sx4-MPCRgK0od.jpg?r=2a9' },
                { titulo: 'Gran torino', image: 'https://i.blogs.es/2646f8/gran_torino_-_h_-_2008/840_560.jpg' },
                { titulo: 'Looper', image: 'https://images-na.ssl-images-amazon.com/images/I/719PHksoVaL._SL1500_.jpg' }
            ],
            nombre: 'Lenin Ramos',
            favorita: {}
        });
    }

    componentDidMount() {
        // alert("Ya se ha montado el componente PELICULAS")
    }

    componentWillUnmount() {
        // alert("Me voy a desmontar"); 
    }

    render() {
        var pStyle = {
            background: 'green',
            color: 'white',
            padding: '10px'
        };

        var favorita;
        if (this.state.favorita.titulo) {
            favorita = (
                <p className="favorita" style={pStyle}>
                    <strong>La película favortia es: </strong>
                    <span>{this.state.favorita.titulo}</span>
                </p>
            );
        } else {
            favorita = (
                <p>No hay película favorita</p>
            );
        }

        return (
            <React.Fragment>
                <Slider
                    title="Películas"
                    size="slider-small"
                />
                <div className="center">
                    <div id="content" className="peliculas">
                        <h2 className="subheader">Listado de Películas</h2>
                        <p>Selección de las películas favoritas de {this.state.nombre}</p>
                        <div>
                            <button onClick={this.cambiarTitulo}>
                                Cambiar Título de Batman
                    </button>
                        </div>

                        {//condición if 
                            this.state.favorita.titulo &&
                            <p className="favorita" style={pStyle}>
                                <strong>La película favortia es: </strong>
                                <span>{this.state.favorita.titulo}</span>
                            </p>
                        }

                        {//condición if else
                            this.state.favorita.titulo ? (
                                <p className="favorita" style={pStyle}>
                                    <strong>La película favortia es: </strong>
                                    <span>{this.state.favorita.titulo}</span>
                                </p>
                            ) : (
                                    <p>No hay película favorita</p>
                                )
                        }

                        {/* opción con if else fuera de jsx realizada con javascript */}
                        {favorita}

                        {/* Crear componente de películas */}
                        <div id="articles" className="peliculas">
                            {
                                this.state.peliculas.map((pelicula, i) => {
                                    return (
                                        <Pelicula
                                            key={i}
                                            pelicula={pelicula}
                                            indice={i}
                                            marcarFavorita={this.favorita}
                                        />
                                    )
                                })
                            }
                        </div>
                    </div>
                    <Sidebar
                        blog="false"
                    />
                </div>
            </React.Fragment>
        )
    }
}

export default Peliculas; 