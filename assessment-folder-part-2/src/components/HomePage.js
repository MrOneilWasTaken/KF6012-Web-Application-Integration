import React from "react";
import reading from "../img/reading.jpg";
import Papers from "./Papers";
import Footer from './Footer.js';

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