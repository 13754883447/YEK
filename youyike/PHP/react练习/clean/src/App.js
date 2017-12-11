import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class App extends Component {
    constructor(){
        super();
        this.state={
            Text:1
        }
    }
    componentDidMount(){
        console.log(1)
    }
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React</h1>
        </header>
        <p className="App-intro">
            {this.state.Text+2}d ahjdh jkj
        </p>
      </div>
    );
  }
}

export default App;
