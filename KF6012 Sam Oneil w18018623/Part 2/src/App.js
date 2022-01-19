import React from 'react';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import HomePage from './components/HomePage';
import NotFoundPage from './components/NotFoundPage';
import PapersPage from './components/PapersPage';
import AuthorsPage from './components/AuthorsPage';
import ReadingListPage from './components/ReadingListPage';
import './App.css';


function App() {
  return (
    <BrowserRouter basename={"/kf6012/coursework/part2"}>
      < div className="App" >
        <div >
          <nav>
            <ul>
              <li><Link to="/">Home</Link></li>
              <li><Link to="papers">Papers</Link></li>
              <li><Link to="authors">Authors</Link></li>
              <li><Link to="readinglist">Reading List</Link></li>

            </ul>
          </nav>

          <Routes>
            <Route path="/" element={<HomePage />} />
            <Route path="papers" element={<PapersPage />} />
            <Route path="authors" element={<AuthorsPage />} />
            <Route path="readinglist" element={<ReadingListPage />} />
            <Route path="*" element={<NotFoundPage />} />
          </Routes>
        </div>
      </div >
    </BrowserRouter >
  );
}

export default App;
