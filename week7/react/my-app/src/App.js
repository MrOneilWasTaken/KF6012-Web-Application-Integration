//import logo from './logo.svg';
import './App.css';
import React from 'react';

class Hello extends React.Component {
  render() {

    const name = this.props.name;
    return (
      <p>Hello, {name}</p>
    )
  }
}

class Goodbye extends React.Component {
  render() {
    return (
      <p>Goodbye!</p>
    )
  }
}

function App() {
  return (
    <div className="App">
      <Hello name="Sam" />
      <Goodbye />
      <Hello name="Battyboi" />
      <p className="normaltext" >Hello world once again markiplier here</p>
    </div>
  );
}

export default App;
