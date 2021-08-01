import React from 'react'; 
import './assets/css/App.css';
import Router from  './Router'; 

function App() {
  return (
    <div className="App">
          {/* <SeccionPruebas /> */}
          {/* <Peliculas /> */}
          <Router /> 
    </div>
  );

}

// Ejemplo utilización de react 
// function HolaMundo(nombre, edad){
//   var presentacion = (
//         <div>
//           <h2>Hola, soy {nombre}</h2> 
//           <h3>Tengo {edad} años</h3> 
//         </div>
//       ); 
//   return presentacion; 
// }

// function App() { 
//   var nombre = "Lenin Ramos"; 

//   return (
//     <div className="App">
//       <header className="App-header">
//         <img src={logo} className="App-logo" alt="logo" />
//         <p>
//           Hola! bienvenido.
//         </p>
//         {HolaMundo(nombre, 12)}
//         {/* {presentacion} */}
//         {/* { */}
//           {/* alert("hola mundo con react") */}
//         {/* } */}
//         <section className="componentes">
//           <MiComponente /> { /*se los puede repetir tanto como se desee y hacerlos comportar de distitna manera según los datos que se envien */}
//           <Peliculas />
//         </section>
//       </header>
      
//     </div>
//   );
// }

export default App;
