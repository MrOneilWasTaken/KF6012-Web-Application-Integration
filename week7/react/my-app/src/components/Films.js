import React from "react";
import Film from './Film.js';


class Films extends React.Component {
    constructor(props) {
        super(props)
        this.state = { results: [] }

        console.log("constructor")
    }

    componentDidMount() {
        const url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week6/api/films"

        fetch(url)
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                this.setState({ results: data.results })
            })
            .catch((err) => {
                console.log("Something went wrong ", err)
            });
    }

    render() {
        console.log("render")

        console.log(this.state.results)
        return (
            <div>
                {this.state.results.map((film, i) => (<Film key={i} film={film} />))}

            </div>

        )
    }
}

export default Films;