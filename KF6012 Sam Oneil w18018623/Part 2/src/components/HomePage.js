import React from "react";
import reading from "../img/reading.jpg";
import Papers from "./Papers";
import Footer from './Footer.js';

/**
 * HomePage Component
 * 
 * This component determines how the home page looks and what gets displayed
 * 
 * @author Sam Oneil w18018623
 *  
 */

class HomePage extends React.Component {
    render() {
        return (
            <div>
                <img src={reading} className="gyro" alt="Reading" />
                <p>
                    Photo by Christin Hume
                </p>
                <Papers randomPaper={true} />
                <Footer />
            </div>
        )
    }
}
export default HomePage;