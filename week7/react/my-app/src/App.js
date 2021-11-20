import './App.css';
import React from 'react';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import Greetings from './components/Greetings.js';
import Farewell from './components/Farewell.js';
import movieImg from './images/MykeSimonMovie.jpg';
import Films from './components/Films.js';
import Actors from './components/Actors.js';



function App() {
  const listNames = ["John", "Casey"];
  return (
    <BrowserRouter>
      <nav className="navbar">
        <ul>
          <li><Link to="/">Home</Link></li>
          <li><Link to="films">Films</Link></li>
          <li><Link to="actors">Actors</Link></li>
          <li><Link to="greetings">Greetings</Link></li>
          <li><Link to="farewell">Farewell</Link></li>

        </ul>
      </nav>
      <div className="App">
        <Routes>
          <Route path="/" element={
            <div>
              <img src={movieImg} className="movieImg" alt="Movies" />
              <p>Image by Myke Simon on <a href="https://unsplash.com/photos/atsUqIm3wxo">Unsplash</a></p>
            </div>
          } />
          <Route path="films" element={<Films />} />
          <Route path="actors" element={<Actors />} />
          <Route path="greetings" element={<Greetings array={listNames} />} />
          <Route path="farewell" element={<Farewell array={listNames} />} />
          <Route path="*" element={<p>Not found</p>} />
        </Routes>
      </div>
    </BrowserRouter>


  );
}

export default App;
