import React from "react";
import Actor from './Actor.js';

class Actors extends React.Component {
    constructor(props) {
        super(props)
        this.state = { results: [] }
    }

    componentDidMount() {
        const url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week6/api/actors"

        fetch(url)
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                this.setState({ results: data.results })
            })
            .catch((err) => {
                console.log("Something went wrong", err)
            });
    }

    render() {
        console.log(this.state.results)
        return (
            <div>
                {this.state.results.map((actor, i) => (<Actor key={i} actor={actor} />))}
            </div>
        )
    }
}

export default Actors;