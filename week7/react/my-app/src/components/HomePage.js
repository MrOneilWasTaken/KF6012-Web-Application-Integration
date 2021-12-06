import React from "react";
import Films from "./Films.js";

class HomePage extends React.Component {
    render() {
        const randomFilmId = Math.floor(Math.random() * 1000) + 1
        return (
            <div>
                <Films randomFilmId={randomFilmId} />
                <Films />
            </div>
        )
    }
}

export default HomePage;