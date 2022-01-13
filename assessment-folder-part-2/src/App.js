import React from 'react';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import HomePage from './components/HomePage';
import './App.css';
import FilmPage from './components/FilmPage';
import ActorPage from './components/ActorPage';
import NotFoundPage from './components/NotFoundPage';
import ViewingListPage from './components/ViewingListPage';
import PapersPage from './components/PapersPage';
import AuthorsPage from './components/AuthorsPage';
import ReadingListPage from './components/ReadingListPage';


function App() {
  return (
    <BrowserRouter>
      < div className="App" >
        <nav>
          <ul>
            <li><Link to="/">Home</Link></li>
            <li><Link to="films">Films</Link></li>
            <li><Link to="actors">Actors</Link></li>
            <li><Link to="papers">Papers</Link></li>
            <li><Link to="authors">Authors</Link></li>
            <li><Link to="viewinglist">Viewing List</Link></li>
            <li><Link to="readinglist">Reading List</Link></li>

          </ul>
        </nav>

        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="films" element={<FilmPage />} />
          <Route path="actors" element={<ActorPage />} />
          <Route path="papers" element={<PapersPage />} />
          <Route path="authors" element={<AuthorsPage />} />
          <Route path="viewinglist" element={<ViewingListPage />} />
          <Route path="readinglist" element={<ReadingListPage />} />
          <Route path="*" element={<NotFoundPage />} />
        </Routes>
      </div >
    </BrowserRouter >
  );
}

export default App;
