import React from 'react';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import HomePage from './components/HomePage';
import './App.css';
import FilmPage from './components/FilmPage';
import ActorPage from './components/ActorPage';
import NotFoundPage from './components/NotFoundPage';
import ViewingListPage from './components/ViewingListPage';


function App() {
  return (
    <BrowserRouter>
      < div className="App" >
        <nav>
          <ul>
            <li><Link to="/">Home</Link></li>
            <li><Link to="films">Films</Link></li>
            <li><Link to="actors">Actors</Link></li>
            <li><Link to="viewinglist">Viewing List</Link></li>
          </ul>
        </nav>

        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="films" element={<FilmPage />} />
          <Route path="actors" element={<ActorPage />} />
          <Route path="viewinglist" element={<ViewingListPage />} />
          <Route path="*" element={<NotFoundPage />} />
        </Routes>
      </div >
    </BrowserRouter >
  );
}

export default App;
