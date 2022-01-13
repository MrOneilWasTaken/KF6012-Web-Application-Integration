import React from "react";
import gyro from "../img/gyro.jpg";
import Films from "./Films.js";
import Papers from "./Papers";
import Footer from './Footer.js';

class HomePage extends React.Component {
    render() {
        return (
            <div>
                <img src={gyro} className="gyro" alt="Gyro Zeppeli" />
                <p>
                    Photo by Hirohiko Araki
                </p>
                <Films randomFilm={true} />
                <Papers randomPaper={true} />
                <Footer />
            </div>
        )
    }
}
export default HomePage;